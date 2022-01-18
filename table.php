<?php
ob_start();
session_start();
require('onloadDelete.php');
require('config.php');
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
                     <li class="nav-item"><?php echo $dashAddress ?><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Create Profiles</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="verification.php"><i class="fas fa-key"></i><span>Verify Employees</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="table.php"><i class="fas fa-table"></i><span>Attendance</span></a></li>
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
                   <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Employee Attendance Page</h3>
                        <form  action="deleteAttendance.php" method="post">
                            <button onclick="return confirm('Do you want to delete all the Records ?')" type="submit" name="delete" class="btn btn-danger btn-sm d-none d-sm-inline-block"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Delete Records</button>
                        </form>
                    </div>

                    <!------- Table filter ------------>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <div class="row">
                                                <div class="col-6"><p class="text-primary m-0 font-weight-bold">Filter</p></div>
                                            <div class="col-6"><a style="float:right;" class="text-decoration-none" href="table.php"><i class="fas fa-sync"></i>&nbsp;Refresh</a></div>

                                            </div>
                                            
                                            
                                        </div>
                                        <div class="card-body" style="height:250px;">
                                            <form class="employee" method="post" action="#">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="c_num"><strong>From</strong></label>
                                                            <input type="date" name="from_date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>" class="form-control">

                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="empID"><strong>To</strong></label>
                                                            <input type="date" name="to_date" value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>" class="form-control">

                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="empID"><strong>Name</strong></label>
                                                            <input type="text" name="empName" class="form-control" placeholder="Enter Name">

                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="empID"><strong>Location</strong></label>
                                                            <select name="print_select" class="form-control">
                                                                <option  selected value="choose">- Choose Location -</option>
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
                                                </div>
                                                <div class="form-row">
                                                   
                                                        <div class="form-group">
                                                            <button name="btn-submit" type="submit" class="btn btn-primary mt-4">Filter</button>
                                                        </div>
                                                 </form>
                                                 <form action="print-filter.php" method="post">
                                                    <div class="form-group ml-2">
                                                             <button name="btn-print" type="submit" class="btn btn-primary mt-4"><i class="fas fa-print"></i>&nbsp; Print</button>
                                                        </div>
                                                </form>
                                                        
                                                       
                                                    
                                                    
                                                </div>
                                           
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                         <!------- Table filter end ------------>
                    </div>
                    <!------- Table update end ------------>
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



                     <!------- Table update start ------------>



                            
                    
                    
                     <div class="row mb-3">

                         <div class="col-lg-12">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Update Employee</p>
                                        </div>
                                        <div class="card-body" style="height:250px;">
                                            <form class="employee" method="post" action="updateAt.php">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="full_name"><strong>Name</strong></label>
                                                            <input type="text" name="eName" id="eName" value="<?php echo $name; ?>" class="form-control">
                                                            <input type="hidden" name="eNum" id="eNum" value="<?php echo $num; ?>" class="form-control">
                                                            <input type="hidden" name="locIn" id="locIn" value="<?php echo $locIn; ?>" class="form-control">
                                                            <input type="hidden" name="locOut" id="locOut" value="<?php echo $locOut; ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="nick_name"><strong>Location In</strong></label>
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
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>Location Out</strong></label>
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
                                                </div>
                                                <div class="form-group">
                                                      <button name="btn-update" type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                               
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                      <?php } } } ?>

                    <!------- Table data starts ------------>
                    <div class="row">
                                     <div class="col-lg-12 col-xl-12 mt-3">
                            <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Employees Data</p>
                        </div>
                        <div class="card-body">
                            <div style="height:600px; overflow-y:auto;" class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
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
                                        <!-------- filter data------->
                                         <?php 
                               

                                if(isset($_POST['btn-submit']))
                                {
                                    $temp_from=new DateTime($_POST['from_date']);
                                    $temp_to=new DateTime($_POST['to_date']);
                                    $temp_location=$_POST['print_select'];
                                    $temp_name=$_POST['empName'];
                                    if($temp_from<$temp_to){
                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];

                                    }else{
                                        $from_date =$_POST['to_date'];
                                        $to_date =$_POST['from_date'];

                                    }
                                   
                                    $selection="choose";
                                    /*
                                    if($temp_location==$selection){
                                         $query = "SELECT * FROM attendance WHERE adate BETWEEN '$from_date' AND '$to_date' ";
                                    }else{
                                         $query = "SELECT * FROM attendance WHERE adate BETWEEN '$from_date' AND '$to_date' AND location='$temp_location'";
                                    } */
                                    if(($from_date!="")&&($to_date!="")&&($temp_location!=$selection)&&($temp_name!="")){
                                        $query = "SELECT * FROM attendance WHERE adate BETWEEN '$from_date' AND '$to_date' AND location='$temp_location' AND name='$temp_name'";
                                    }else if(($from_date!="")&&($to_date!="")&&($temp_location!=$selection)&&($temp_name=="")){
                                         $query = "SELECT * FROM attendance WHERE adate BETWEEN '$from_date' AND '$to_date' AND location='$temp_location'";
                                    }else if(($from_date!="")&&($to_date!="")&&($temp_location==$selection)&&($temp_name=="")){
                                        $query = "SELECT * FROM attendance WHERE adate BETWEEN '$from_date' AND '$to_date'";
                                    }else if(($from_date!="")&&($to_date!="")&&($temp_location==$selection)&&($temp_name!="")){
                                        $query = "SELECT * FROM attendance WHERE adate BETWEEN '$from_date' AND '$to_date' AND name='$temp_name'";
                                    }else if(($from_date=="")&&($to_date=="")&&($temp_location!=$selection)&&($temp_name=="")){
                                        $query = "SELECT * FROM attendance WHERE location='$temp_location'";
                                    }else if(($from_date=="")&&($to_date=="")&&($temp_location==$selection)&&($temp_name!="")){
                                        $query = "SELECT * FROM attendance WHERE name='$temp_name'";
                                    }else{
                                        $query = "SELECT * FROM attendance ORDER BY num desc";
                                    }

                                   
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {

                                            $dateP=$row['adate'];
                                            $eidP=$row['empID'];
                                            $nameP=$row['name'];
                                            $locationP=$row['location'];
                                            $clockinP=$row['clockin'];
                                            $locationoutP=$row['locationout'];
                                            $clockoutP=$row['clockout'];

                                            $sqlprint="INSERT INTO `print` (`adate`, `empID`, `name`,`location`,`clockin`,`locationout`,`clockout`) VALUES ('".$dateP."', '".$eidP."', '".$nameP."','".$locationP."','".$clockinP."','".$locationoutP."','".$clockoutP."');";
                                            $resultprint=mysqli_query($conn,$sqlprint);

                                ?>

                                    <?php require('attendanceUpdateRow.php') ?>
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
                                     <?php require('attendanceUpdateRow.php') ?>   
                                           
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