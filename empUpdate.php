<?php
session_start();
if(!isset($_SESSION["username"])){
	header('Location:login.php');
}
require('config.php');
ob_start();
?>



 <?php
// retrieve selected results from database and display them on page
$employeeID=$_GET['eid'];
$sql="SELECT * FROM `profile` WHERE `empID`='$employeeID';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
                    $name=$row['fullname'];
                    $nname=$row['nickname']; 
                    $email=$row['email'];
                    $cnum=$row['contactnum'];
                     $id=$row['empID']; 
                    $password=$row['password'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                   <div class="sidebar-brand-icon "><img width="45px" src="assets/img/icons/caricon.png"></div>
                    <div class="sidebar-brand-text mx-3"><span>BNS CARWASH</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">

                     <li class="nav-item"><a class="nav-link active" href="empUpdate.php"><i class="fas fa-user-circle"></i><span>Update</span></a>
                </ul>
                <div class="text-center d-none d-md-inline mt-4"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow mt-3">
                                    <span class="d-none d-lg-inline mr-4 text-gray-600 small">Welcome ! <?php 
                                    $session=$_SESSION["username"];
                                    echo " ".$session;

                                        ?></span>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                               <a class="text-decoration-none" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mt-3 text-gray-400"></i>&nbsp;Logout</a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4 mt-3">Update Employee</h3>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Update</p>
                                        </div>
                                        <div class="card-body">
                                            <form class="employee" method="post" action="empUpdate-backend.php">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="full_name"><strong>Full Name</strong></label><input value="<?php echo $name ?>" class="form-control" type="text" id="full_name" placeholder="Full Name" name="full name" required></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="nick_name"><strong>Nick Name</strong></label><input class="form-control" type="text" id="nick_name" placeholder="Don" name="nick_name" value="<?php echo $nname ?>"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>Email Address</strong></label><input value="<?php echo $email ?>" class="form-control" type="email" id="email" placeholder="user@example.com" name="email"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="c_num"><strong>Contact No.</strong></label><input value="<?php echo $cnum ?>" required class="form-control" type="text" id="c_num" placeholder="0412345678" name="c_num"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="empID"><strong>Employee ID</strong></label><input readonly value="<?php echo $id ?>" required class="form-control" type="text" id="empID" placeholder="ID" name="empID"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="password"><strong>Password</strong></label><input value="<?php echo $password ?>" class="form-control" type="password" id="password" placeholder="Password" name="password"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" name="btn-submit"type="submit">Update</button></div>
                                                <div class="col-6"><a style="float:right;" class="text-decoration-none" href="profile.php"><i class="fas fa-angle-left"></i>&nbsp;Go Back</a></div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
             
                    
                </div>
                 <?php   ob_end_flush(); ?>


            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Massive Dynamics 2021</span></div>
                </div>
            </footer>






        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

   

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="JS/edit.js"></script>
</body>
    

</html>