<?php 
session_start();
$title="login";
include_once './Models/users.php';
// var_dump($_SESSION);
include_once './Templete/header.php';
if(isset($_POST['add-product'])){
    $name=$_POST['name-product'];
    // $Quantity=$_POST['Quantity-product'];
    $price=$_POST['price-product'];
    $choose=$_FILES['choose-product']['name'];
    $temp_image=$_FILES['choose-product']['tmp_name'];
    $choose_image='images/'.$choose;
    $insert_query=mysqli_query($conn,"insert into `product` (name,price,image)
    values('$name','$price','$choose')") or die('insert query failed');

}
?>
<style>
    body{
        background-image: url('bg.avif');
        background-repeat: no-repeat;
        background-size: 100%;
        color: white;
      
    }
</style>
<nav class="navbar navbar-expand-lg " style="        background: #414140;">
        <div class="container" style="    padding: 5px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand " style="       color: white;font-weight:bolder;font-size: 26px;" href="#">E-Commerce</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" style="     color: white; font-weight:bold;" href="./index.php">Home</a>
        </li>

        </ul>
        
            <form class="form-inline my-2 my-lg-0" style="width:980px">
            <div class="input-group mb-3" style="margin-top: 20px; padding-left:20px ">
            <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" fdprocessedid="02jugy">
            <span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
            </svg></span>
            <a href="add_product.php" class="link-offset-2 link-underline link-underline-opacity-0 " style="margin-left: 18px;position: relative;top: 8px;    color: white;font-weight:bold;">Add product</a>
            <a href="viewproduct.php" class="link-offset-2 link-underline link-underline-opacity-0 " style="margin-left: 18px;position: relative;top: 8px;    color: white;font-weight:bold;">view product</a>
            <a href="viewuser.php" class="link-offset-2 link-underline link-underline-opacity-0 text-light"style="    margin-left: 18px;position: relative;top: 8px;font-weight:bold;">view users</a>
             <a href="shop.php" class="link-offset-2 link-underline link-underline-opacity-0 text-light"style="    margin-left: 18px;position: relative;top: 8px;font-weight:bold;">shop product</a>
            </div>
            

    </form></div>
    </div>
    <div class="cart" style="color:white;position: relative;right: 100px; font-weight:bold; font-size:20px ">
    <?php
                    $select_product=mysqli_query($conn,'select * from `cart`');
                    $row_count=mysqli_num_rows( $select_product)
        ?>
        <a href="cart.php" class="link-offset-2 link-underline link-underline-opacity-0 text-light">
        <svg style=" color: white;font-weight:bold;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"></path>
        </svg>
        <span style="    color: white;font-weight:bold;"><sup><?php echo $row_count?></sup></span>
    </a>
    </div>
    </nav>
<div class="login"style=" position:relative;z-index:20;margin-top: 2%;"> 
            <div class="card shadow-lg p-3 mb-5  rounded " style="width: 25rem;  height: 39rem; padding: 30px;margin: auto">
            <div class="card-body">
                <h3 class="card-title text-center" style=" color: #303030d9;font-weight: bolder;">Add Product</h3>
                <?php 
        if(isset($data_check)){
            if($data_check ==false){
                echo'   <div class="alert alert-danger"> password or email not correct</div>';
            }

        }
     
        
        ?>
        <form action="" method="post" style="max-width:500px" class="m-auto" enctype="multipart/form-data">
            <div class="mb-3">
                <label style="  color: #787575;  font-weight: bold; margin-top: 16px;"> Product Name</label>
                <input class="form-control" placeholder="Enter Product Name" name="name-product" type="text" required>
                
            </div>
            <div class="mb-3">
                <label style="  color: #787575;  font-weight: bold; margin-top: 16px;">Quantity</label>
                <input class="form-control"placeholder="Enter Quantity" name="=Quantity-product" type="number"min=0 required>
                
            </div>
            <div class="mb-3">
                <label style="  color: #787575;  font-weight: bold; margin-top: 16px;">Price</label>
                <input class="form-control"placeholder="Enter Price" name="price-product" type="text" required>
                
            </div>
            <div class="mb-3">
                <label style="  color: #787575;  font-weight: bold; margin-top: 16px;">Choose File</label>
                <input class="form-control"placeholder="Enter file" name="choose-product" type="file" accept="image/png ,image/jpg ,image/jpeg" required>
                
            </div>
            <?php 
             if(isset($insert_query)){
                // move_uploaded_file( $temp_image,$choose_image);
                echo'<p class="alert alert-success">product add sucessfully</p> ';

                
            
            
            }
          
            
            
            
            
            ?>
            <input name="add-product" class="  btn btn-warning text-white text-center " style="font-weight: bold;margin-left: 112px;    margin-top: 20px;
    padding: 18px;
    font-weight: bold;
    margin-left: 78px;
    margin-top: 25px;
    /* padding: 18px; */
    border-radius: 27px;
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 11px;
    padding-bottom: 12px;" type="submit" value="Add Product" required>
        </form>
                
            </div>
            </div>
</div>
<?php
include_once './Templete/footer.php';
?>
