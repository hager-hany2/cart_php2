<?php 
 include_once './helpers/ConecationToBe.php';
if(isset($_GET['deletecart'])){
    $delete_id=$_GET['deletecart'];
    $delete_query=mysqli_query($conn,"DELETE from `cart` WHERE ID=$delete_id") or die('Query falid ');
if($delete_query){
        echo "product deleted";
        header('location:cart.php');

}
else{
    echo "product not deleted";
    header('location:cart.php');

}
}