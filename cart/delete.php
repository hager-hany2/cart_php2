<?php 
 include_once './helpers/ConecationToBe.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn,"DELETE from `product` WHERE ID=$delete_id") or die('Query falid ');
if($delete_query){
        echo "product deleted";
        header('location:viewproduct.php');

}
else{
    echo "product not deleted";
    header('location:viewproduct.php');

}
}




















?>