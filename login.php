<?php 
ob_start();
require('config.php');
session_start();?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="shortcut icon" type="image/png" href="assets/img/icons/bns.png">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-register-image" style="background-image: url(assets/img/images/buff.jpg);"></div>
                            </div>
                            <div class="col -lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" action="login.php" method="post">
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username" name="username"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button name="btn-login" class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>
                                        <?php
                                        if(isset($_POST["btn-login"])){
                                            $username=$_POST["username"];
                                            $password=$_POST["password"];
                                            
                                            /*$con=mysqli_connect("localhost","root","","carwash");
                                            if(!$con){
                                                die("Sorry we are facing a technical issue");
                                            }*/
                                            $sql= "SELECT * FROM `admin` WHERE `adminUsername`='".$username."' AND `adminPassword`='".$password."';";
                                            $result = mysqli_query($conn,$sql);
                                            $row = mysqli_fetch_array($result);
                                            $adminuser="Hussey";
                                            if(mysqli_num_rows($result)>0){
                                                if($row['adminUsername']==$adminuser){
                                                    $_SESSION["username"] = $adminuser;
                                                    header('Location:index-admin.php');
                                                }else{
                                                     $_SESSION["username"] = $username;
                                                    header('Location:index.php');

                                                }
                                               
                                            }else{
                                                echo'<div class="alert alert-danger mt-2" role="alert">Please enter the correct username and password</div>';
                                            }
                                            
                                            
                                        }
                                        
                                        ob_end_flush();
                                        
                                        ?>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>