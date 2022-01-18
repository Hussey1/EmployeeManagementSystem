<?php
ob_start();
require('config.php');

    $sqlD='DELETE FROM print';
    $resultD = mysqli_query($conn, $sqlD);
    mysqli_close($conn);
    

ob_end_flush();


?>