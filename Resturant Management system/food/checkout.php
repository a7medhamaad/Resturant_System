<?php require "../includes/header.php";?>
<?php require "../libs/App.php";?>
<?php require "../config/config.php";?>
<?php
        if(!isset($_SERVER['HTTP_REFERER'])){
            // redirect them to your desired location
            echo "<script>window.location.href='".APPURL."'</script>";
            exit;
        }
?>

<?php
    $app=new App;


   if(isset($_POST['submit'])){
    $name    =$_POST['name'];
    $email   =$_POST['email'];
    $twon    =$_POST['twon'];
    $countery=$_POST['countery'];
    $zipcode =$_POST['zipcode'];
    $phone_number=$_POST['phone_number'];
    $address=$_POST['address'];
    $total_price= $_SESSION['total_price'];
    $user_id= $_SESSION['user_id'];

    $query="INSERT INTO orders(Name,Email,Twon,Countery,Zipcode,Phone_number,Address,Total_price,User_id) VALUES (:name,:email,:twon,:countery,:zipcode,:phone_number,:address,:total_price,:user_id) ";
    $arr=[
       ":name"=>$name,
       ":email"=>$email,
       ":twon"=>$twon, 
       ":countery"=>$countery, 
       ":zipcode"=>$zipcode,
       ":phone_number"=>$phone_number,
       ":address"=>$address,
       ":total_price"=>$total_price,
       ":user_id"=>$user_id,
    ];

    $path="pay.php";

    $app->insert($query,$arr,$path);
}
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Checkout</h1>
                        <form  class="col-md-12" method="POST" action="checkout.php">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input  name="email" type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input  name="twon" type="text" class="form-control" id="twon" placeholder="Twon">
                                        <label for="twon">Town</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input  name="countery" type="text" class="form-control" id="labelcountery" placeholder="Country">
                                        <label for="labelcountery">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="zipcode" type="text" class="form-control" id="zip" placeholder="Zipcode">
                                        <label for="zip">Zipcode</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input name="phone_number" type="text" class="form-control" id="num" placeholder="Phone number">
                                        <label for="num">Phone number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="address" class="form-control" placeholder="Address" id="message" style="height: 100px"></textarea>
                                        <label for="message">Address</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button name="submit" type="submit" class="btn btn-primary w-100 py-3" >Order and Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        <!-- Service End -->
        

        <?php require "../includes/footer.php";?>