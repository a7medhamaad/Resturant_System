<?php require "../includes/header.php";?>
<?php require "../libs/App.php";?>
<?php require "../config/config.php";?>
<?php 

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query="SELECT * FROM foods WHERE Id='$id'";
        $app=new App;
        $one = $app->selectone($query);
        if(isset($_SESSION['user_id'])){
        $q= "SELECT * FROM cart WHERE Item_id='$id' AND User_id='$_SESSION[user_id]' ";
        $count=$app->validatacart($q);
        }

        if(isset($_POST['submit'])){
            $item_id=$_POST['item_id'];
            $name=$_POST['name'];
            $price=$_POST['price'];
            $image=$_POST['image'];
            $user_id=$_SESSION['user_id'];
    
            $query="INSERT INTO cart(Item_id,Name,Price,Image,User_id) VALUES (:item_id,:name,:price,:image,:user_id) ";
            $arr=[
               ":item_id"=>$item_id,
               ":name"=>$name,
               ":price"=>$price, 
               ":image"=>$image, 
               ":user_id"=>$user_id
            ];
    
            $path="cart.php";
    
            $app->insert($query,$arr,$path);
        }
     
       
    }else{
        echo "<script>window.location.href='".APPURL."/404.php'</script>";
    }
  
?>


            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $one->Name; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo APPURL; ?>/img/<?php echo $one->Image; ?>">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4"><?php echo $one->Name; ?></h1>
                        <p class="mb-4"><?php echo $one->Description; ?></p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h3>$<?php echo $one->Price; ?></h3>                                   
                                </div>
                            </div>
                           
                        </div>
                        <form method="POST" action="add-cart.php?id=<?php echo $id; ?>">
                            <input type="hidden"  name="item_id" value="<?php echo $one->Id; ?>">
                            <input type="hidden"  name="name" value="<?php echo $one->Name; ?>">
                            <input type="hidden"  name="price" value="<?php echo $one->Price; ?>">
                            <input type="hidden"  name="image" value="<?php echo $one->Image; ?>">

                            <?php if(isset($_SESSION['user_id'])) : ?>
                                <?php if($count > 0) : ?>
                                    <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2" disabled>Added to Cart</button>
                                    
                                    <?php
                                    echo "<br>";
                                    echo '<div class="alert alert-danger text-center">You add this item befor ..............!!!!!!!!!!!!!!!!!!!</div>';
                                    ?>
                                <?php else : ?>
                                    <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2">Add to Cart</button>
                                <?php endif; ?>   
                            <?php else :?>
                                <?php  echo '<div class="alert alert-danger text-center">You need to login or register</div>'; 
                                ?>
                            <?php endif; ?>  
                    </div>
                </div>
            </div>
        </div>

    <?php require "../includes/footer.php";?>