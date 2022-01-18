<?php
ob_start();
require('config.php');
if(isset($_POST['btn-submit'])){
        $passcode=$_POST['code'];
         $sql= "SELECT `tempPass` FROM `profile` WHERE `tempPass`='".$passcode."';";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $sql= "SELECT `empID` FROM `profile` WHERE `tempPass`='".$passcode."';";
            $sqlUp="UPDATE `profile` SET `status`='Activated' WHERE `tempPass`='$passcode'";
            $resultup = mysqli_query($conn,$sqlUp);
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result))  {
                $cookieValue=$row['empID'];
               setcookie("user",$cookieValue,time()+31556926, "/");
                header('Location:clock.php');


            }


        }else{
              echo'<div class="alert alert-danger mt-2" role="alert">Passcode is incorrect</div>';
                                            }
                                            
                                             
                                        }
                                    
                                    ob_end_flush();

            ?>
                                                
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
    <link rel="stylesheet" type="text/css" href="Resources/CSS/clockinfo.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col -lg-5">
                                <div class="row justify-content-center pt-4">
                                    <img class="img-fluid px-2" src="assets/img/icons/brand.PNG" alt="brand">
                                </div>
                                <div class="px-5 pb-5 pt-4">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">ACTIVATE ACCOUNT</h4><hr>
                                    </div>
                                    <form class="user" action="activate.php" method="post">
                                        <div class="form-group"><input name="code" id="code" class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Passcode" name="code"></div>
                                        <button onclick="getdetails()" name="btn-submit" id="btn-submit" class="btn btn-primary btn-block text-white btn-user" type="submit">Activate</button>
                                        <hr>
                                         <button type="button" class="btn btn-danger btn-block text-white btn-user" data-toggle="modal" data-target=".bd-example-modal-lg">Before You Proceed</button>
                                        
                                    </form>
                                    <!-- Large modal -->
                                   

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="container-fluid">
                                                 <h4 class="mt-4" style="text-align:center;">YOU MUST TURN ON YOUR LOCATION SERVICE !</h4>
                                                <hr>
                                                 <div class="col-auto">
                                                <div class="row">
                                                    <h5>For iPhone Users</h5>
                                                    <hr>
                                                    <div class="col-auto">
                                                        <img width="100%" src="assets/img/images/Capture.PNG">
                                                    
                                                    </div>
                                                   </div>
                                                     <div class="row mt-4 mb-3">
                                                         <h5>For Android Users</h5>
                                                    <div class="col-auto">
                                                        <img class="mt-3" width="100%" src="assets/img/images/Capture1.PNG">
                                                    
                                                    </div>
                                                   </div>
                                                   
                                                
                                                </div>
                                            
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                     <!-- Large modal end -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="Resources/js/clock.js"></script>
                
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>