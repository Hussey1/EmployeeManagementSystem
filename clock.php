<?php
ob_start();
require('config.php');
if(isset($_COOKIE["user"])){
  $empID=$_COOKIE["user"];

}else{
     $empID="";
}
   







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
    <link rel="shortcut icon" type="image/png" href="assets/img/icons/bns.png">
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
                                        <h4 class="text-dark mb-4">ATTENDANCE</h4><hr>
                                    </div>
                                    <form class="user" action="clock-backend.php" method="post">
                                        <div class="form-group"><input readonly name="id" id="id" class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Employee ID missing" name="username"></div>
                                        
                                        <?php
                                        $inactiveStatus="NULL";
                                       $previousLocation="";
                                        $currentLocation="";
                                        $updatedLocation="";
                                        $sqlinactive= "SELECT * FROM `attendance` WHERE `empID`='".$empID."' AND `status`='".$inactiveStatus."' ORDER BY `num` DESC LIMIT 1;";
                                        $resultinactive=mysqli_query($conn,$sqlinactive);
                                        
                                        
                                        $activeStatus="active";
                                        $sql= "SELECT * FROM `attendance` WHERE `empID`='".$empID."' AND `status`='".$activeStatus."';";
                                        $resultactive=mysqli_query($conn,$sql);
                    
                                        $rowInactive = mysqli_fetch_array($resultinactive);
                                        $previousLocation=$rowInactive['location'];
                                        
                                        if(mysqli_num_rows($resultactive)>0){
                                            $rowActive = mysqli_fetch_array($resultactive);
                                            $currentLocation=$rowActive['location'];
                                            if($currentLocation==$previousLocation){
                                                $updatedLocation=$previousLocation;
                                            }else{
                                               $updatedLocation=$currentLocation; 
                                            }
                                        }else{
                                            $updatedLocation=$previousLocation;
                                        }
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        ?>
                                        <div class="form-group"><input required name="location" id="location" class="form-control form-control-user" type="text" value="<?php echo $updatedLocation; ?>" placeholder="Enter Location"></div>
                                        <?php  ?>
                                        <input class="date" type="hidden" name="date" id="date">
                                        <input class="time" type="hidden" name="time" id="time">
                                        <input class="latitude" type="hidden" name="lat" id="lat">
                                        <input class="longitude" type="hidden" name="long" id="long">
                                        <button onclick="getdetails()" name="btn-submit" id="btn-submit" class="btn btn-primary btn-block text-white btn-user" type="submit">Clock In / Clock Out</button>
                                        <hr>
                                        

                                         
                                    </form>

                                    <?php 
                                        if(mysqli_num_rows($resultactive)>0){
                                        echo'<div class="alert alert-success" role="alert">You are currently Clocked In.<br> Please Clock off before you leave the premises .</div>';
                                        }else{
                                            echo'<div></div>';
                                        }



                                        ?>
                                    <div class="text-center"><a class="small" href="myHistory.php">My Attendance Archive</a></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    
        var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
        };

        function success(pos) {
          var crd = pos.coords;
            document.getElementById("lat").value=crd.latitude;
            document.getElementById("long").value=crd.longitude;
           
            
        }

        function error(err) {
          console.warn(`ERROR(${err.code}): ${err.message}`);
        }
        
        navigator.geolocation.getCurrentPosition(success, error, options);

</script>
                <script>
                    function getdetails(){
                        var today=new Date();
                        var date=today.getFullYear()+"-"+("0" + (today.getMonth() + 1)).slice(-2)+"-"+("0" +today.getDate()).slice(-2);
                        var time=today.getHours()+":"+today.getMinutes();
                        document.getElementById("date").value=date;
                        document.getElementById("time").value=formatAMPM(new Date);
                        
                    }
                    
                    function formatAMPM(date) {
                      var hours = date.getHours();
                      var minutes = date.getMinutes();
                      var ampm = hours >= 12 ? 'pm' : 'am';
                      hours = hours % 12;
                      hours = hours ? hours : 12; // the hour '0' should be '12'
                      minutes = minutes < 10 ? '0'+minutes : minutes;
                      var strTime = hours + ':' + minutes + ' ' + ampm;
                      return strTime;
                    } 
                    function setempID(){
                        document.getElementById("id").value="<?php echo $empID; ?>";
                        
                    }
                   window.onload=setempID();
                
                </script>
    <script type="text/javascript" src="Resources/js/clock.js"></script>
                
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>

</body>

</html>