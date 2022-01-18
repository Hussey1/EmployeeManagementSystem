<?php
ob_start();
session_start();
require('config.php');
if(!isset($_SESSION["username"])){
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
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
                     <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Create Profiles</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="verification.php"><i class="fas fa-key"></i><span>Verify Employees</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="table.php"><i class="fas fa-table"></i><span>Attendance</span></a></li>
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
                    <div class="row">
                        <div class="col-md-10 col-xl-10"></div>
                        <div class="col-md-2 col-xl-2 mb-1">
                            <form  action="deleteAttendance.php" method="post">
                            <button onclick="return confirm('Do you want to delete all the Records ?')" type="submit" name="delete" class="btn btn-danger btn-sm  d-sm-inline-block"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Delete Records</button>
                        </form>
                        </div>
                    
                    </div>
                </div>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Employee Attendance</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Employee Info</p>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <form action="range.php" method="post">
                                <div class="form-row ml-4 pt-3">
                                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label> <br>
                                      <button name="btn-submit" type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label><br>
                                        <a class="text-decoration-none" href="range.php"><i class="fas fa-sync"></i>&nbsp;Refresh</a>
                                    </div>
                                </div>
                            </div>
                                </div> 
                            
                            </form>

                            </div>
            </div>

            <?php
                                    if(isset($_GET['eid'])){
                                        $employeeID=$_GET['eid'];
                                        $sql = "SELECT * FROM `attendance` WHERE `num`='$employeeID'";
                                        $result = mysqli_query($conn, $sql);

                                        if($result->num_rows>0){
                                            while($row=$result->fetch_assoc()){
                                                    $name=$row['name'];
                                                    $num=$row['num'];
                                                    $locIn=$row['location'];
                                                    $locOut=$row['locationout'];
                                                





                                 ?>
             
            <div class="row">
                <div class="col-auto">
                    <form action="updateAt.php" method="post">
                                <div class="form-row ml-4 pt-3">
                                    <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="eName" id="eName" value="<?php echo $name; ?>" class="form-control">
                                        <input type="hidden" name="eNum" id="eNum" value="<?php echo $num; ?>" class="form-control">
                                        <input type="hidden" name="locIn" id="locIn" value="<?php echo $locIn; ?>" class="form-control">
                                        <input type="hidden" name="locOut" id="locOut" value="<?php echo $locOut; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Location In</label>
                                        <select name="locationIn" id="locationIn" style="border-radius:18px;font-size:0.85rem;" class="form-control pr-3" id="location">
                                                <option  selected="true" disabled="disabled">- Choose Location -</option>
                                                <option value="Heidleburge Ford">Heidleburge Ford</option>
                                                <option value="FTG Automotive">FTG Automotive</option>
                                                <option value="FTG Nissan">FTG Nissan</option>
                                                <option value="Pakenham Mazda">Pakenham Mazda</option>
                                                <option value="Berwick Mitsubishi">Berwick Mitsubishi</option>
                                                <option value="Waverley Toyota">Waverley Toyota</option>
                                                <option value="SHOP">SHOP</option>
                                                <option value="Chadstone Toyota">Chadstone Toyota</option>
                                                <option value="Wignall Ford Frankston">Wignall Ford Frankston</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Location Out</label>
                                        <select name="locationOut" id="locationOut" style="border-radius:18px;font-size:0.85rem;" class="form-control pr-3" id="location">
                                                <option  selected="true" disabled="disabled">- Choose Location -</option>
                                                <option value="Heidleburge Ford">Heidleburge Ford</option>
                                                <option value="FTG Automotive">FTG Automotive</option>
                                                <option value="FTG Nissan">FTG Nissan</option>
                                                <option value="Pakenham Mazda">Pakenham Mazda</option>
                                                <option value="Berwick Mitsubishi">Berwick Mitsubishi</option>
                                                <option value="Waverley Toyota">Waverley Toyota</option>
                                                <option value="SHOP">SHOP</option>
                                                <option value="Chadstone Toyota">Chadstone Toyota</option>
                                                <option value="Wignall Ford Frankston">Wignall Ford Frankston</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>&nbsp;</label> <br>
                                      <button name="btn-update" type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                                </div> 
                            
                            </form>
                            <?php } } } ?>


                </div>
            </div>
                        <div class="card-body">
                            <div style="height:650px; overflow-y:auto;" class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Clock-In</th>
                                            <th><i class="fas fa-location-arrow"></i></th>
                                            <th>Location</th>
                                            <th>Clock-Out</th>
                                            <th><i class="fas fa-location-arrow"></i></th>
                                            <th><i class="far fa-edit" ></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                                require('config.php');

                                if(isset($_POST['btn-submit']))
                                {
                                    $from_date = $_POST['from_date'];
                                    $to_date = $_POST['to_date'];

                                    $query = "SELECT * FROM attendance WHERE adate BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['adate']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['location']; ?></td>
                                            <td><?php echo $row['clockin']; ?></td>
                                            <td><a href="map.php?lg=<?php echo $row['lg']; ?>&alt=<?php echo $row['alt']; ?>"><img width="20 rem" src="assets/img/icons/arrow.png">
                        </a></td>
                                            <td><?php echo $row['locationout']; ?></td>
                                             <td><?php echo $row['clockout']; ?></td>
                                            <td><a href="map.php?lg=<?php echo $row['lgout']; ?>&alt=<?php echo $row['altout']; ?>"><img width="20 rem" src="assets/img/icons/arrow.png">
                        </a></td>
                                            <td><a href="range.php?eid=<?php echo $row['num']; ?>"><i class="far fa-edit" ></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }else{
                                    $query = "SELECT * FROM attendance ORDER BY num desc";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['adate']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['location']; ?></td>
                                            <td><?php echo $row['clockin']; ?></td>
                                            <td><a href="map.php?lg=<?php echo $row['lg']; ?>&alt=<?php echo $row['alt']; ?>"><img width="20 rem" src="assets/img/icons/arrow.png">
                        </a></td>
                                            <td><?php echo $row['locationout']; ?></td>
                                             <td><?php echo $row['clockout']; ?></td>
                                            <td><a href="map.php?lg=<?php echo $row['lgout']; ?>&alt=<?php echo $row['altout']; ?>"><img width="20 rem" src="assets/img/icons/arrow.png">
                        </a></td>
                                            <td><a href="range.php?eid=<?php echo $row['num']; ?>"><i class="far fa-edit" ></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }

                                }
                            ?>
                                    </tbody>
                                </table>      
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    </nav>
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

</html>