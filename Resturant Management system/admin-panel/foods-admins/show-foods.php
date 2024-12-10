<?php require "../layout/header.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 
    $query="SELECT * FROM foods";
    $app=new App;
    $app->validatesessionAdminInside();
    $foods=$app->selectAll($query) ;
?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="create-foods.php" class="btn btn-primary mb-4 text-center float-right">Create Foods</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($foods as $food) : ?>
                  <tr>
                    <th scope="row"><?php echo $food->Id; ?></th>
                    <td><?php echo $food->Name; ?></td>
                    <td><img style="width: 80px; height: 80px" src="../../img/<?php echo $food->Image; ?>"</td>
                    <td>$<?php echo $food->Price; ?></td>
                     <td><a href="delete-foods.php?id=<?php echo $food->Id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



      <?php require "../layout/footer.php"; ?>