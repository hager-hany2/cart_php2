

<?php 
function contactToDB(){
    $info="mysql:host=localhost:8080;dbname=ecomerce";
    $username="root";
    $password='';
    $con=new PDO($info,$username,$password);
    $con->setAttribute
    (PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
    return $con;  
} 
$conn=mysqli_connect('localhost:8080','root','','ecomerce') or die('conaction failed');
?>