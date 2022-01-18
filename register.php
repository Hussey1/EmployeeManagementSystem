<?php
require('config.php');
ob_start();
session_start();
if(!isset($_SESSION["username"])){
	header('Location:login.php');
}
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
                    <li class="nav-item"><a class="nav-link" href="index-admin.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Create Profiles</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="verification.php"><i class="fas fa-key"></i><span>Verify Employees</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="fas fa-table"></i><span>Attendance</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="register.php"><i class="fas fa-user-circle"></i><span>Register</span></a>
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
                    <h3 class="text-dark mb-4">Admin Register</h3>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Register</p>
                                        </div>
                                        <div class="card-body">
                                            <form class="employee" method="post" action="register.php">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="first_name" placeholder="First Name" name="first_name" required></div>
                                                    </div>
                                                     <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name" placeholder="Last Name" name="last_name"></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                   
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Username</strong></label><input class="form-control" type="text" id="username" placeholder="Username" name="username"></div>
                                                         
                                                    </div>
                                                    <div class="col">
                                                     <div class="form-group"><label for="password"><strong>Password</strong></label><input class="form-control" type="password" id="password" placeholder="Password" name="password"></div>
                                                        </div>
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" name="btn-submit"type="submit">Add</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                      <!--------Data View---------->
                    <div class="row">
                               <div class="col-lg-12 col-xl-12 mt-3">
                            <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Admin Details</p>
                        </div>
                        <div class="card-body">
                            <div style="height:600px; overflow-y:auto;" class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                     <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Password</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php


// retrieve selected results from database and display them on page
$sql="SELECT * FROM `admin`;";
$result = mysqli_query($conn, $sql);
?>
                                  
                                         <?php
                                           
                                                //output data of each row
                                                while($row = mysqli_fetch_array($result))  {
                                        ?>

                    <tr>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['adminUsername']; ?></td>
                    <td><?php echo $row['adminPassword']; ?></td>
                     <td><a onclick="return confirm('Are You Sure ?')" href="delete.php?aid=<?php echo $row['adminUsername']; ?>"><img width="20 rem" src="assets/img/icons/cross.png">
                        </a>
                        </td>
                  
                    
                        
                    
                    </tr>   
        
           <?php        
            }
        ?>
                                        
        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                           
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>   
                        </div>
                        




                    </div>
                    
                </div>


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
     <?php
        if(isset($_POST["btn-submit"])){
             $firstname=$_POST["first_name"];
             $lastname=$_POST["last_name"];
             $username=$_POST["username"];
             $password=$_POST["password"];
            
            /*$con=mysqli_connect("localhost","root","","carwash");
            if(!$con){
				die("Sorry we are facing a technical issue");
			}*/
            $sql="INSERT INTO `admin` (`firstName`, `lastName`, `adminUsername`,`adminPassword`) VALUES ('".$firstname."', '".$lastname."', '".$username."','".$password."');";
            $result=mysqli_query($conn,$sql);
            if($result){
                 header('Location:register.php');   
            }
            mysqli_close($con);
           
            
        }
        
        ob_end_flush();
    
    
    ?>

</html>