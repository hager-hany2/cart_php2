

<?php 
include_once './helpers/ConecationToBe.php';?>
<?php
include_once './Templete/header.php'?>
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

<div class="container">
    <section class="display-product">
        <table class="table table-striped">
                
                <?php
                    $display_product=mysqli_query($conn,'select * from `product`');
                    $num=1;
                    if(mysqli_num_rows($display_product)>0){
                        echo'<thead>
                        <tr>
                        <th scope="col">num</th>
                        <th scope="col">product image</th>
                        <th scope="col"> product name</th>
                        <th scope="col">product price</th>
                        <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>'; 
                        while( $row=mysqli_fetch_assoc($display_product)){
                            
                        
                        ?>

                            <th scope="row"><?php echo $num;?></th>
                            <td><img style="width: 100px; height:100px" src="<?php echo$row['image']?>" alt="<?php echo $row['name'];?>"></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['price']?></td>
                            <td>
                            <a href="edit.php?edit=<?php echo $row['ID']?>"class="text-success p-2" onclick="return confirm('Are you sure edit this?')"class="text-success p-2"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a>
                            <a href="delete.php?delete=<?php echo $row['ID']?>"class="text-danger" onclick="return confirm('Are you sure delete this?')" >
                            <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                            </a>
                        </td>
                    </tr>
                        <?php
                        $num++;
                        }
                   
                        

                    }else{
                        echo" <div class='empty_text alert alert-primary'> No product Avaliable</div>'";
                    }
                    
                    
                    ?>
                    <tr>
                    </tbody>
                </table>
    </section>
</div>

<?php
include_once './Templete/footer.php'?>