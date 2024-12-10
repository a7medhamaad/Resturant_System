<?php require "../includes/header.php";?>
<?php require "../libs/App.php";?>
<?php require "../config/config.php";?>
 
<?php 
        $query = "SELECT * FROM orders WHERE User_id='$_SESSION[user_id]'";
        $app = new App;

        $orders = $app->selectAll($query);

       


?>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="../">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/orders.php?id=<?php echo $_SESSION['user_id']; ?>">Orders</a></li>
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Twon</th>
                            <th scope="col">Countery</th>
                            <th scope="col">Zipcode</th>
                            <th scope="col">Phone_number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Total_price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                             <?php foreach($orders as $order) : ?>
                                    <tr>
                                        <th><?php echo $order->Name; ?></th>
                                        <td><?php echo  $order->Email; ?></td>
                                        <td><?php echo  $order->Twon; ?></td>
                                        <td><?php echo  $order->Countery; ?></td>
                                        <td><?php echo  $order->Zipcode; ?></td>
                                        <td><?php echo  $order->Phone_number; ?></td>
                                        <td><?php echo  $order->Address; ?></td>
                                        <td>$<?php echo  $order->Total_price; ?></td>
                                        <td><?php echo  $order->Status; ?></td>
                                        <td><?php echo  $order->Created_at; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                          
                              
                      
                        </tbody>
                      </table>
                  
                </div>
            </div>
        <!-- Service End -->
        

        <?php require "../includes/footer.php";?>