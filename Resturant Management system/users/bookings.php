<?php require "../includes/header.php";?>
<?php require "../libs/App.php";?>
<?php require "../config/config.php";?>
 
<?php 
        $query = "SELECT * FROM bookings WHERE User_id='$_SESSION[user_id]'";
        $app = new App;

        $bookings = $app->selectAll($query);

       


?>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Bookings</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="../">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/bookings.php?id=<?php echo $_SESSION['user_id']; ?>">Bookings</a></li>
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
                            <th scope="col">Data_booking</th>
                            <th scope="col">Num_people</th>
                            <th scope="col">Special_request</th>
                            <th scope="col">Status</th>
                            <th scope="col">Review</th>

                          </tr>
                        </thead>
                        <tbody>
                          
                             <?php foreach($bookings as $booking) : ?>
                                    <tr>
                                        <th><?php echo $booking->Name; ?></th>
                                        <td><?php echo  $booking->Email; ?></td>
                                        <td><?php echo  $booking->Data_booking; ?></td>
                                        <td><?php echo  $booking->Num_people; ?></td>
                                        <td><?php echo  $booking->Special_request; ?></td>
                                        <td><?php echo  $booking->Status; ?></td>
                                        <?php if( $booking->Status == "Confirmed") : ?>
                                            <td><a href="<?php echo APPURL; ?>/users/review.php" class="btn btn-success text-white">Review Us</td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                          
                              
                      
                        </tbody>
                      </table>
                  
                </div>
            </div>
        <!-- Service End -->
        

        <?php require "../includes/footer.php";?>