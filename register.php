<?php
    require_once "db.php";
    require_once "validate_session.php";

    if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $date = $_POST['date'];
    $pos = $_POST['pos'];
    $func = $_POST['func'];
    $adv = $_POST['adv'];
    $preadd = $_POST['preadd'];
    $peradd = $_POST['peradd'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $email = $_POST['email'];
    $nat = $_POST['nat'];
    $status = $_POST['status'];
    $blgrp = $_POST['blgrp'];
    $relation = implode("|", $_POST['relation']);
    $rname = implode("|", $_POST['rname']);
    $roccup = implode("|", $_POST['roccup']);
    $rage = implode("|", $_POST['rage']);
    $rdepend = implode("|", $_POST['rdepend']);
    // $username = $_SESSION['username'];
    $sql = "INSERT INTO EMP (`id`, `name`, `date`, `pos`, `func`, `adv`, `preadd`, `peradd`, `phone1`, `phone2`, `email`, `nat`, `status`, `blgrp`, `username`) VALUES ('', '$name', '$date', '$pos', '$func', '$adv', '$preadd', '$peradd', '$phone1', '$phone2', '$email', '$nat', '$status', '$blgrp', '$user_id')";


    try {
        if($con->query($sql) === true){
            // $username = $con->insert_id;
            // $_SESSION['USERNAME']=$username;
    
            // $emp_id = $_SESSION['ID'];
    
            $fam_details_sql = "INSERT INTO FAMILY_DETAILS (`id`, `username`, `relation`, `rname`, `roccup`, `rage`, `rdepend`) VALUES ('', '$user_id', '$relation', '$rname', '$roccup', '$rage', '$rdepend')";
    
            if($con->query($fam_details_sql) === true) {
                echo "Inserted successfully!";
                header('Location: ./second.php');
            }
            else {
                echo "ERROR:$sql<br> $con->error";
            }
        }
        else{
            echo "ERROR:$sql<br> $con->error";
        }
    }
    catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1063) {
           $update_sql = "UPDATE EMP
           SET name = '$name',  date = '$date',  pos = '$pos',  func = '$func',  adv = '$adv',  preadd = '$preadd',  peradd = '$peradd',  phone1 = '$phone1',  phone2 = '$phone2',  email = '$email',  nat = '$nat',  status = '$status',  blgrp = '$blgrp'
           WHERE emp.username = '$user_id'";

           $update_fam_details = "UPDATE FAMILY_DETAILS
           SET relation = '$relation', rname = '$rname', roccup = '$roccup', rage = '$rage', rdepend = '$rdepend'
           WHERE family_details.username = '$user_id'";

           if($con->query($update_sql) === true && $con->query($update_fam_details) === true) {
                echo "Updated successfully!";
                header('Location: ./second.php');
           }
           else {
                echo "ERROR:$sql<br> $con->error";
            }

        } else {
            echo "An error occurred: " . $e->getMessage();
        }
    }
}

?>