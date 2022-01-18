<?php
require('config.php');
ob_start();
session_start();
if(!isset($_SESSION["username"])){
	header('Location:login.php');
}
$adminname="Hussey";
$adminsession=$_SESSION["username"];
if($adminsession==$adminname){
    $dashAddress='<a class="nav-link" href="index-admin.php">';
}else{
    $dashAddress='<a class="nav-link" href="index.php">';
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
                    <li class="nav-item"><?php echo $dashAddress ?><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profile.php"><i class="fas fa-user"></i><span>Create Profiles</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="verification.php"><i class="fas fa-key"></i><span>Verify Employees</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="fas fa-table"></i><span>Attendance</span></a></li>
                     <!--<li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i><span>Register</span></a>-->
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
                    <h3 class="text-dark mb-4">Add Employee</h3>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Register</p>
                                        </div>
                                        <div class="card-body">
                                            <form class="employee" method="post" action="profile.php">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="full_name"><strong>Full Name</strong></label><input class="form-control" type="text" id="full_name" placeholder="Full Name" name="full name" required></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="nick_name"><strong>Nick Name</strong></label><input class="form-control" type="text" id="nick_name" placeholder="Don" name="nick_name"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" placeholder="user@example.com" name="email"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="c_num"><strong>Contact No.</strong></label><input required class="form-control" type="text" id="c_num" placeholder="0412345678" name="c_num"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="empID"><strong>Employee ID</strong></label><input required class="form-control" type="text" id="empID" placeholder="ID" name="empID"></div>
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
                            <p class="text-primary m-0 font-weight-bold">All Employee Details</p>
                        </div>
                        <div class="card-body">
                            <div style="height:600px; overflow-y:auto;" class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                     <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Nickname</th>
                                            <th>Email Address</th>
                                            <th>Contact No.</th>
                                            <th>Employee ID</th>
                                            <th><i class="far fa-edit" ></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
// connect to database
/*$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'carwash');*/

// define how many results you want per page
$results_per_page =200;

// find out the number of results stored in database
$sql="SELECT * FROM `profile`;";
$result1 = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result1);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result1 = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sql="SELECT * FROM `profile`;";
$result = mysqli_query($conn, $sql);
?>
                                  
                                         <?php
                                           
                                                //output data of each row
                                                while($row = mysqli_fetch_array($result1))  {
                                        ?>

                    <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['nickname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contactnum']; ?></td>
                    <td><?php echo $row['empID']; ?></td>
                     <td><a href="empUpdate.php?eid=<?php echo $row['empID']; ?>"><i class="far fa-edit" ></i></a></td>
                  
                    
                        
                    
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
                                            <?php
                                                for ($page=1;$page<=$number_of_pages;$page++) {
                                            ?>
                                            <li class="page-item active"><?php echo'<a class="page-link" href="index.php?page=' . $page . '">' . $page . '</a> '?></li>
                                            <?php } ?>
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
</body>
    <?php 
    
		if(isset($_POST["btn-submit"])){
			$fullname=$_POST["full_name"];
			$nickname=$_POST["nick_name"];
			$email=$_POST["email"];
            $contactnum=$_POST["c_num"];
            $empID=$_POST["empID"];
            $password=$_POST["password"];
            $tempPass="N/A";
            $status="Inactive";
             /*$con=mysqli_connect("localhost","root","","carwash");
            if(!$con){
				die("Sorry we are facing a technical issue");
			}*/
			
			
		$sql = "INSERT INTO `profile`(`fullname`,  `nickname`, `email`,`contactnum`,  `empID`, `password`,`tempPass`,`status`) VALUES ('$fullname','$nickname','$email','$contactnum','$empID','$password','$tempPass','$status')";
            
            $result=mysqli_query($conn,$sql);
            mysqli_close($conn);
            header('Location:profile.php');

		

		

	}
    
    ob_end_flush();

	?>

</html>