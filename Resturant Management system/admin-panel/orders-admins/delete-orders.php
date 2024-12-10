<?php require "../layout/header.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
        if(!isset($_SERVER['HTTP_REFERER'])){
            // redirect them to your desired location
            echo "<script>window.location.href='".ADMINURL."'</script>";
            exit;
        }
?>

<?php 
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "DELETE FROM orders WHERE Id='$id'";
    $app = new App;

    $path="show-orders.php";
     $app->delete($query,$path);
 }else{
   echo "<script>window.location.href='".ADMINURL."/404.php'</script>";
}
?>