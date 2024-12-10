<?php require "../layout/header.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 
    $query="SELECT * FROM bookings";
    $app=new App;
    $app->validatesessionAdminInside();
    $bookings=$app->selectAll($query) ;
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data_booking</th>
                    <th scope="col">Num_people</th>
                    <th scope="col">Special_request</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Status value</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($bookings as $booking) : ?>
                  <tr>
                    <th scope="row"><?php echo $booking->Id; ?></th>
                    <td><?php echo $booking->Name; ?></td>
                    <td><?php echo $booking->Email; ?></td>
                    <td><?php echo $booking->Data_booking; ?></td>
                    <td><?php echo $booking->Num_people; ?></td>
                    <td><?php echo $booking->Special_request; ?></td>
                    <td><?php echo $booking->Created_at; ?></td>
                    <td><?php echo $booking->Status; ?></td>
                    <td><a href="status.php?id=<?php echo $booking->Id; ?>" class="btn btn-primary  text-center ">Status</a></td>
                     <td><a href="delete-bookings.php?id=<?php echo $booking->Id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require "../layout/footer.php"; ?>