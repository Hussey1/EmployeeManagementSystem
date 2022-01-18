<?php
ob_start();
require('config.php');

if(isset($_POST["delete"])){
    
    $sql='DELETE FROM attendance';
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('Location:table.php');
    
}

ob_end_flush();


?>