<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$con = mysqli_connect($server,$username,$password, $dbname);

if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
    // exit(0);
}

?>