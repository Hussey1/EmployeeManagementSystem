<?php
require('config.php');
if(isset($_POST['btn-update'])){
	$name=$_POST['eName'];
	$num=$_POST['eNum'];
	$locIn=$_POST['locIn'];
	$locOut=$_POST['locOut'];
	if($_POST['locationIn']){
		$locationIn=$_POST['locationIn'];
	}else{
		$locationIn=$_POST['locIn'];
	}

	if($_POST['locationOut']){
		$locationOut=$_POST['locationOut'];
	}else{
		$locationOut=$_POST['locOut'];
	}



	$sql="UPDATE `attendance` SET `name`='$name',`location`='$locationIn',`locationout`='$locationOut' WHERE `num`='$num'";
	$result=mysqli_query($conn,$sql);
	header('Location:table.php');


}


 ?>