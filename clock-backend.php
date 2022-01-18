<?php
ob_start();
require('config.php');
if(isset($_POST["btn-submit"])){
    $id=$_POST["id"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $alt=$_POST["lat"];
    $long=$_POST["long"];
    $location=$_POST["location"];
    $activeStatus="active";
    
    /*$con=mysqli_connect("localhost","root","","carwash");
    if(!$con){
        die("Sorry we are facing a technical issue");
    }*/
    /*--------for checking the employee is real--------*/
    $sqlOne= "SELECT * FROM `profile` WHERE `empID`='".$id."';";
    /*------check the employee in clock off------------*/
    $sqlFour= "SELECT * FROM `attendance` WHERE `statusN`='".$resultFourStatus."';";
    $resultOne = mysqli_query($conn,$sqlOne);
    $resultFour = mysqli_query($conn,$sqlFour);
    /*------checking the client is real or not---------*/
    if(mysqli_num_rows($resultOne)>0){
        /*-----for checking the employee is active-----------*/
        $sqlTwo= "SELECT * FROM `attendance` WHERE `empID`='".$id."' AND `status`='".$activeStatus."';";
        $resultTwo = mysqli_query($conn,$sqlTwo);
        if(mysqli_num_rows($resultTwo)>0){
            $inactiveStatus="inactive";
            $inactive="NULL";
            $sqlThree="UPDATE `attendance` SET `status`='$inactive',`clockout`='$time',`statusN`='$inactiveStatus',`lgout`='$long',`altout`='$alt',`locationout`='$location' WHERE `empID`='$id' AND `statusN`='$inactive'";
            $resultThree = mysqli_query($conn,$sqlThree); 
            mysqli_close($conn);
            header('Location:clockoutposter.php');
        }else{
             $status="active";
            while($row=mysqli_fetch_array($resultOne)){
                $name=$row['nickname'];
                $sqlThree="INSERT INTO `attendance` (`adate`,`empID`,`name`,`location`,`clockin`,`lg`,`alt`,`status`,`clockout`,`statusN`,`lgout`,`altout`,`locationout`) VALUES ('".$date."','".$id."','".$name."','".$location."','".$time."','".$long."','".$alt."','".$status."','_','NULL','NULL','NULL','_');";
                $resultThree = mysqli_query($conn,$sqlThree);
                mysqli_close($conn);
                header('Location:clockinposter.php');
                }
            }
        }else{
            echo'<script>alert("Entered a Wrong Emplyee Number")</script>';
            mysqli_close($conn);
            header('Location:clockerror.php');
            }
        
            
    }
    ob_end_flush();
    

?>