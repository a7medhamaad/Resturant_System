<?php require "../layout/header.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 
    $query="SELECT * FROM orders";
    $app=new App;
    $app->validatesessionAdminInside();
    $orders=$app->selectAll($query) ;
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">town</th>
                    <th scope="col">country</th>
                    <th scope="col">phone_number</th>
                    <th scope="col">address</th>
                    <th scope="col">total_price</th>
                    <th scope="col">status value</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($orders as $order) : ?>
                  <tr>
                    <th scope="row"><?php echo $order->Id; ?></th>
                    <td><?php echo $order->Name; ?></td>
                    <td><?php echo $order->Email; ?></td>
                    <td><?php echo $order->Twon; ?></td>
                    <td><?php echo $order->Countery; ?></td>
                   
                    <td><?php echo $order->Phone_number; ?></td>
                    <td><?php echo $order->Address; ?></td>
                    <td>$<?php echo $order->Total_price; ?></td>
                    <td><?php echo $order->Status; ?></td>

                     <td><a href="status.php?id=<?php echo $order->Id; ?>" class="btn btn-primary  text-center ">Status</a></td>
                     <td><a href="delete-orders.php?id=<?php echo $order->Id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require "../layout/footer.php"; ?>