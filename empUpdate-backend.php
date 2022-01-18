  <?php 
ob_start();
  require('config.php');
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
            
            
        $sqlUpdate="UPDATE `profile` SET `fullname`='$fullname',`nickname`='$nickname',`email`='$email',`contactnum`='$contactnum',`empID`='$empID',`password`='$password' WHERE `empID`='$empID'";

            
            $result=mysqli_query($conn,$sqlUpdate);
            mysqli_close($conn);
            echo "<script>location='profile.php'</script>";

      

        

    }
    
    ob_end_flush();

    ?>
