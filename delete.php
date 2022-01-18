<?php 
ob_start();
include "config.php";


if (isset($_GET['id'])) {
	$emp_ID = $_GET['id'];

	
	$sql = "DELETE FROM `profile` WHERE `empID`='$emp_ID'";

	$result = $conn->query($sql);

	if ($result == TRUE) {
        header('location:index.php');
        
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}


if (isset($_GET['eid'])) {
	$emp_ID = $_GET['eid'];
	$tempPass="N/A";
	$status="Inactive";

	
	/*$sql = "DELETE FROM `verify` WHERE `empid`='$emp_ID'";*/
	$sql="UPDATE `profile` SET `tempPass`='$tempPass',`status`='$status' WHERE `empID`='$emp_ID'";

	$result = $conn->query($sql);

	if ($result == TRUE) {
        header('location:verification.php');
        
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}



if (isset($_GET['aid'])) {
	$username = $_GET['aid'];
	$sql = "DELETE FROM `admin` WHERE `adminUsername`='$username'";

	$result = $conn->query($sql);

	if ($result == TRUE) {
        header('location:register.php');
        
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

if (isset($_GET['clock'])) {
	$clock = $_GET['clock'];
	$value1="NULL";
	$value2="inactive";

	$sql="UPDATE `attendance` SET `status`='$value1',`statusN`='$value2' WHERE `num`='$clock'";
	$result = $conn->query($sql);

	if ($result == TRUE) {
        header('location:index-admin.php');
        
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

ob_end_flush();


?>