<?php require "../includes/header.php";?>
<?php require "../libs/App.php";?>
<?php require "../config/config.php";?>
 
<?php 

  if(!isset($_SESSION['user_id'])){
    // redirect them to your desired location
    echo "<script>window.location.href='".APPURL."auth/login.php'</script>";
    exit;
}
        $query = "SELECT * FROM cart WHERE User_id='$_SESSION[user_id]'";
        $app = new App;
        $cart_items = $app->selectAll($query);

        $cart_price=$app->selectone("SELECT SUM(Price) as Total_Price FROM cart WHERE User_id='$_SESSION[user_id]' ");

        if(isset($_POST['submit'])){
            $_SESSION['total_price']=$cart_price->Total_Price;

            echo "<script>window.location.href='checkout.php'</script>";
        }

        if (empty($cart_items)) {
            $cart_items = []; // Set to an empty array if no items are found
        }

?>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="../">Home</a></li>
                            <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php if($cart_price->Total_Price> 0) : ?>
                             <?php foreach($cart_items as $cart_item) : ?>
                                    <tr>
                                        <th><img src="<?php echo APPURL; ?>/img/<?php echo $cart_item->Image; ?>" style="width: 50px; height: 50px"></th>
                                        <td><?php echo $cart_item->Name; ?></td>
                                        <td>$<?php echo $cart_item->Price; ?></td>
                                        <td><a href="<?php echo APPURL; ?>/food/delete-item.php?id=<?php echo $cart_item->Id; ?>"class="btn btn-danger text-white">delete</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>Cart is empty add some food</p>
                                <?php endif; ?>
                      
                        </tbody>
                      </table>
                      <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                        <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: $<?php echo $cart_price->Total_Price; ?></p>
                        <form action="cart.php" method="POST">
                            <button name="submit" type="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Service End -->
        

        <?php require "../includes/footer.php";?>