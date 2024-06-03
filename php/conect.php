<?php
    $server = "localhost";
    $root = "root";
    $rootPassword = '';
    $db = "bazar";

    $con = mysqli_connect($server,$root,$rootPassword,$db);

    if(!$con){
        die("Error connect.");
    }
?>