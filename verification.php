<?php
ob_start();
require('config.php');
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
                    <li class="nav-item"><?php echo $dashAddress ?><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Create Profiles</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="verification.php"><i class="fas fa-key"></i><span>Verify Employees</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="fas fa-table"></i><span>Attendance</span></a></li>
                    <!--<li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i><span>Register</span></a></li>-->
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
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 mt-3">
                                                      <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Generate Code</p>
                                        </div>
                                        <div class="card-body">
                                            <form class="employee" method="post" action="verification.php">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="full_name"><strong>Emp. ID</strong></label><input class="form-control" type="text" id="e-id" placeholder="Employee ID" name="e-id"></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" name="btn-submit"type="submit">Generate Code</button></div>
                                            </form>
                                            <?php
                                                 if(isset($_POST["btn-submit"])){
                                                      $id=$_POST["e-id"];
                                                      $random=rand(100,999);
                                                      $pcode=$id.$random;
                                                     /*$sql="INSERT INTO `verify` (`empid`, `code`,`status`) VALUES ('".$id."', '".$random."','Inactive');";*/
                                                     $sql="UPDATE `profile` SET `tempPass`='$pcode' WHERE `empID`='$id'";
                                                    $result=mysqli_query($conn,$sql);
                                                     header('Location:verification.php');
                                                 
                                                 
                                                 }
                                            
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div> 
                        </div>
                           <div class="col-lg-6 col-xl-6 mt-3">
                            <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Temperory Passcode</p>
                        </div>
                        <div class="card-body">
                            <div style="height:300px; overflow-y:auto;" class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Emp. ID</th>
                                            <th>Name</th>
                                            <th>Passcode</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
// connect to database
/*$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'carwash');*/

// define how many results you want per page
$results_per_page =20;

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
					<td><?php echo $row['tempPass']; ?></td>
					<td><?php echo $row['status']; ?></td>
                    <td><a onclick="return confirm('Do you what to send invitation to <?php echo $row['nickname'] ?>?')" href="sendsms.php?eid=<?php echo $row['empID']; ?>"><img width="20 rem" src="assets/img/icons/invite.png">
                        </a>
                        </td>
                    <td><a onclick="return confirm('Are You Sure ?')" href="delete.php?eid=<?php echo $row['empID']; ?>"><img width="20 rem" src="assets/img/icons/cross.png">
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
                                            <li class="page-item active"><?php echo'<a class="page-link" href="verification.php?page=' . $page . '">' . $page . '</a> '?></li>
                                            <?php
                                                
                                                }
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