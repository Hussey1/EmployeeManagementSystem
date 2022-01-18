<?php
require('config.php');
ob_start();
if(isset($_COOKIE["user"])){
  $empID=$_COOKIE["user"];

}
$sqlcheck= "SELECT * FROM `attendance` WHERE `empID`='".$empID."';";
$resultcheck = mysqli_query($conn,$sqlcheck);
if(mysqli_num_rows($resultcheck)>0){
$sqlC="SELECT * FROM `attendance` WHERE `empID`='$empID';";
$resultC = mysqli_query($conn, $sqlC);

$rowC = mysqli_fetch_array($resultC);
$nameC="Welcome ".$rowC['name'];

}else{
$nameC="No Records Found";
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
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 style="text-align:center;" class="text-dark mb-4 mt-4"><?php echo $nameC ?></h3>
                    
                    <!--------Data View---------->
                  
                    <div class="row">
                               <div class="col-lg-12 col-xl-12 mt-3">
                            <div class="card shadow">
                        <div class="card-header py-3">
                            <div class="col"><a style="float:right;" class="text-decoration-none" href="clock.php"><i class="fas fa-angle-left"></i>&nbsp;Go Back</a></div>
                            <div clas="col"><p class="text-primary m-0 font-weight-bold">My Attendance</p></div>
                            
                        </div>
                        <div class="card-body">
                              
                            <div style="height:500px; overflow-y:auto;" class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                     <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Location In</th>
                                            <th>Clock-In</th>
                                            <th>Location Out</th>
                                            <th>Clock-Out</th>
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
$sql="SELECT * FROM `attendance`;";
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
if($empID!=""){
$sql="SELECT * FROM `attendance` WHERE `empID`='$empID' ORDER BY num desc;";
$result = mysqli_query($conn, $sql);
?>
                                  
                                         <?php
                                           
                                                //output data of each row
                                                while($row = mysqli_fetch_array($result))  {
                                                    
                                        ?>

                    <tr>
                    <td style="display:none;"><?php echo $row['num']; ?></td>
                    <td><?php echo $row['adate']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['clockin']; ?></td>
                    <td><?php echo $row['locationout']; ?></td>
                    <td><?php echo $row['clockout']; ?></td>
                    <td><button class="editbtn" style="border:none;background:transparent;" type="button" name="editbtn"><i class="far fa-edit" ></i></button></td>
                        
                    
                    </tr>   
        
           <?php        
            }}
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
        
        
        
        
        <!--------------------update modal----->
         <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Time</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <form action="myHistory.php" method="post" class="needs-validation">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label >Date</label>
                                    <input readonly type="hidden" class="form-control" id="id" name="id">
                                    <input readonly type="text" class="form-control" id="date" name="date" placeholder="Date">
                                </div>


                                <div class="">
                                    <div class="form-group mt-3">
                                        <label >Name</label>
                                        <input readonly type="text" name="name" class="form-control" id="name" placeholder="Name">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Location Out</label>
                                        <div class="input-group">
                                            <input readonly type="text" name="location" id="location" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="validationCustom06">Clock-out</label>
                                        <div class="input-group">
                                            <input type="text" name="cout" id="cout" class="form-control" placeholder="Quantity" required>
                                        </div>

                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <div class="modal-footer">
                                    

                                    <button style="border-radius:30px;" type="submit" name="updatedata" class="btn btn-primary btn-block text-white">Update Time</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
         <?php

            if (isset($_POST['updatedata'])) {

                require("config.php");
                $num=$_POST['id'];
                $cout= $_POST['cout'];
                
                if(strpos($cout,'edited')!==false){
                    $run = "UPDATE attendance SET clockout='$cout' WHERE num='$num'";
                }else{
                   $cout= $_POST['cout']." edited";
                   $run = "UPDATE attendance SET clockout='$cout' WHERE num='$num'";
                }

                $result = mysqli_query($conn, $run);

                if ($result) {
                   
                    header("location:myHistory.php"); 
                  
                                   
                } else {
                    echo "please check query";
                }
                
            }
            
            ?>
        
        
        <!-------modal end----->
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#id').val(data[0]);
                $('#date').val(data[1]);
                $('#name').val(data[2]);
                $('#location').val(data[5]);
                $('#cout').val(data[6]);


            });
        });
    </script>

</body>
    <?php 
    ob_end_flush();

    ?>

</html>