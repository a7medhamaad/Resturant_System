<?php require "../layout/header.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 
    $query="SELECT * FROM admins";
    $app=new App;
    $app->validatesessionAdminInside();
    $admins=$app->selectAll($query) ;
?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">AdminName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created_at</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($admins as $admin) : ?>
                  <tr>
                    <th scope="row">1<?php echo $admin->Id; ?></th>
                    <td><?php echo $admin->Adminname; ?></td>
                    <td><?php echo $admin->Email; ?></td>
                    <td><?php echo $admin->Created_at; ?></td>
                  </tr>
                <?php endforeach ; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require "../layout/footer.php"; ?>