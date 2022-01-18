<?php
ob_start();
require('config.php');
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
    <title>Dashboard - Brand</title>
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
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Create Profiles</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="verification.php"><i class="fas fa-key"></i><span>Verify Employees</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="fas fa-table"></i><span>Attendance</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i><span>Register</span></a></li>
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                        <form  action="pdfGen.php" method="post">
                            <button type="submit" name="report" class="btn btn-primary btn-sm d-none d-sm-inline-block"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-6 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Active</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span></span>
                                             <?php
                                                /*$con = mysqli_connect("localhost", "root", "", "carwash"); 
	
	
	                                           if (mysqli_connect_errno()) { 
		                                              echo "Database connection failed."; 
	                                                                       } */
	
	                                           $query = "SELECT * FROM `attendance` WHERE `status`='active';";
	
	
	                                           $result = mysqli_query($conn, $query); 
	
	                                           if ($result) { 
		 
		                                      $row = mysqli_num_rows($result); 
		                                      if ($row) { 
			 	                              printf(" " . $row); 
			                                             } 
		
		                                      mysqli_free_result($result); 
	                                                       } 


                                            ?> 
                                                </div>
                                        </div>
                                        <div class="col-auto"><img src="assets/img/icons/active.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Total Employees</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span></span>
                                          <?php
                                                /*$con = mysqli_connect("localhost", "root", "", "carwash"); 
	
	
	                                           if (mysqli_connect_errno()) { 
		                                              echo "Database connection failed."; 
	                                                                       } */
	
	                                           $query = "SELECT fullname FROM profile"; 
	
	
	                                           $result = mysqli_query($conn, $query); 
	
	                                           if ($result) { 
		 
		                                      $row = mysqli_num_rows($result); 
		                                      if ($row) { 
			 	                              printf(" " . $row); 
			                                             } 
		
		                                      mysqli_free_result($result); 
	                                                       } 


                                            ?> 
                                            </div>
                                        </div>
                                        <div class="col-auto"><img width="40px"  src="assets/img/icons/total.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 mt-3">
                            <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Active Employees</p>
                        </div>
                        <div class="card-body">
                            <div style="height:600px; overflow-y:auto;" class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                     <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Clock In</th>
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
$sql="SELECT * FROM `attendance` WHERE `status`='active';";
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
$sql="SELECT * FROM `attendance` WHERE `status`='active'" . $this_page_first_result1 . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);
?>
                                  
                                         <?php
                                           
                                                //output data of each row
                                                while($row = mysqli_fetch_array($result1))  {
                                        ?>

					<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['clockin']; ?></td>
                    <td><a onclick="return confirm('Do you want to remove <?php echo $row['name'] ?> from Active employees ?')" href="delete.php?clock=<?php echo $row['num']; ?>"><i class="fas fa-clock"></i></a></td>
                  
                    
                        
					
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
                           <div class="col-lg-6 col-xl-6 mt-3">
                            <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Total Employees</p>
                        </div>
                        <div class="card-body">
                            <div style="height:600px; overflow-y:auto;" class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Emp. ID</th>
                                            <th>Name</th>
                                            <th>Contact No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
// connect to database
/*$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'carwash');*/

// define how many results you want per page
$results_per_page =50;

// find out the number of results stored in database
$sql='SELECT * FROM profile';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sql='SELECT * FROM profile LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);
?>
                                     
                                         <?php
                                           
                                                //output data of each row
                                                while($row = mysqli_fetch_array($result))  {
                                        ?>

					<tr>
                    <td><?php echo $row['empID']; ?></td>
					<td><?php echo $row['nickname']; ?></td>
					<td><?php echo $row['contactnum']; ?></td>
                    <td><a onclick="return confirm('Are You Sure ?')" href="delete.php?id=<?php echo $row['empID']; ?>"><img width="20 rem" src="assets/img/icons/cross.png">
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
                                             <?php
                                                for ($page=1;$page<=$number_of_pages;$page++) {
                                            ?>
                                            <li class="page-item active"><?php echo'<a class="page-link" href="index.php?page=' . $page . '">' . $page . '</a> '?></li>
                                            <?php
                                                
                                                }
                                                mysqli_close($conn);
                                            ob_end_flush();
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                           
                            
                        </div>
                        <div class="col">
                            <div class="row">
                                
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