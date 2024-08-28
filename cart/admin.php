<?php 
session_start();
$title="login";
include_once './Models/users.php';
// var_dump($_SESSION);
include_once './Templete/header.php';
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    $data_check = getspecific_user2($_POST['email'] ,$_POST['name'] ,$_POST['password']);
    // var_dump($data_check);
    if(is_array($data_check)){
        // echo'login is success';
        $_SESSION['ID']=$data_check['ID'];
        $_SESSION['email']=$data_check['email'];
        $_SESSION['name']=$data_check['name'];
        $_SESSION['password']=$data_check['password'];
        header('location:index.php');
    }
}

?>
<style>
    body{
        background-image: url('bg.avif');
        background-repeat: no-repeat;
        background-size: 100%;
        height: 100%;
        color: white;
      
    }
</style>
<div class="login"style="margin-top: 5%; position:relative;z-index:20;"> 
            <div class="card shadow-lg p-3 mb-5  rounded " style="width: 25rem;  height: 32rem; padding: 30px;             margin: auto">
            <div class="card-body">
                <h3 class="card-title text-center" style=" color: #303030d9;font-weight: bolder;">Admin</h3>
                <?php 
        if(isset($data_check)){
            if($data_check ==false){
                echo'   <div class="alert alert-danger"> password or email not correct</div>';
            }

        }
     
        
        ?>
        <form action="" method="post" style="max-width:500px" class="m-auto">
            <div class="mb-3">
                <label style="  color: #787575;  font-weight: bold; margin-top: 16px;">Email</label>
                <input class="form-control" name="email" type="email" required>
                
            </div>
            <div class="mb-3">
                <label style="  color: #787575;  font-weight: bold; margin-top: 16px;">Name</label>
                <input class="form-control" name="name" type="text" required>
                
            </div>
            <div class="mb-3">
                <label style="  color: #787575;  font-weight: bold; margin-top: 16px;">password</label>
                <input class="form-control" name="password" style="    margin-bottom: 17px;"  type="password" required >
            </div>
           
            
            <input class="  btn btn-warning text-white text-center " style="font-weight: bold;margin-left: 112px;    margin-top: 16px;
    padding: 18px;
    font-weight: bold;
    margin-left: 112px;
    margin-top: 16px;
    /* padding: 18px; */
    border-radius: 27px;
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 11px;
    padding-bottom: 12px;" type="submit" required>
        </form>
                
            </div>
            </div>
</div>
<?php
include_once './Templete/footer.php';
?>