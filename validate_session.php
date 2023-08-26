<?php
 session_start();
 if (!isset($_SESSION['USERNAME']) || $_SESSION['USERNAME'] == ""){
    header('Location: ./loginPage.html');
    exit(0);
}
$user_id=$_SESSION['USERNAME'];
?>