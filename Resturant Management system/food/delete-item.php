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
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "DELETE FROM cart WHERE Id='$id'";
    $app = new App;

    $path="cart.php";
    $cart_items = $app->delete($query,$path);
 }else{
   echo "<script>window.location.href='".APPURL."/404.php'</script>";
}
?>