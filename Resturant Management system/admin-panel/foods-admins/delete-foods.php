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
     $app = new App;
 if(isset($_GET['id'])){
    $id=$_GET['id'];

    $query="SELECT * FROM foods WHERE Id='$id'";
    
    $one = $app->selectone($query);
    unlink("foods-images/".$one->Image);//for image

    $query = "DELETE FROM foods WHERE Id='$id'";
    
    $path="show-foods.php";
     $app->delete($query,$path);
 }
?>