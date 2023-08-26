<?php
    require_once "db.php";
    require_once "validate_session.php";
    if(isset($_POST['submit'])){
    $ta3 = $_POST['ta3'];
    $ta4 = $_POST['ta4'];
    $ta5 = $_POST['ta5'];
    $selectop= $_POST['selectop'];
    $passno = $_POST['passno'];
    $passval = $_POST['passval'];
    $ta6 = $_POST['ta6'];
    $orgstart = implode("|", $_POST['orgstart']);
    $orgend = implode("|", $_POST['orgend']);
    $orgname = implode("|", $_POST['orgname']);
    $orgposj = implode("|", $_POST['orgposj']);
    $orgposl = implode("|", $_POST['orgposl']);
    $lastpos = implode("|", $_POST['lastpos']);
    // $username = $_SESSION['ID'];
    $sql = "INSERT INTO EMP3 (`id`, `username`,`ta3`,`ta4`,`ta5`,`selectop`,`passno`,`passval`,`ta6`) VALUES ('', '$user_id' ,'$ta3','$ta4','$ta5','$selectop','$passno','$passval','$ta6')";


   try{
    if($con->query($sql) === true){
        // $username = $con->insert_id;
        // // $_SESSION['ID'] = $emp_id;

        // $username = $_SESSION['ID'];

        $job_sql = "INSERT INTO JOB (`id`, `username`, `orgstart`, `orgend`, `orgname`, `orgposj`, `orgposl`,`lastpos`) VALUES ('', '$user_id', '$orgstart', '$orgend', '$orgname', '$orgposj', '$orgposl','$lastpos')";

        if($con->query($job_sql) === true) {
            echo "Inserted successfully!";
            header('Location: ./fourth.php');
        }
        else {
            echo "ERROR:$sql<br> $con->error";
        }
    }
    else{
        echo "ERROR:$sql<br> $con->error";
    }
    }
    catch(mysqli_sql_exception $e){
        if ($e->getCode() === 1062) {
            $update_sql = "UPDATE EMP3
            SET ta3 = '$ta3',  ta4 = '$ta4',  ta5 = '$ta5',  selectop = '$selectop',  passno = '$passno',  passval = '$passval',  ta6 = '$ta6'
            WHERE username = '$user_id'";
 
            $update_job = "UPDATE JOB
            SET orgstart = '$orgstart', orgend = '$orgend', orgname = '$orgname', orgposj = '$orgposj', orgposl = '$orgposl',lastpos = $lastpos
            WHERE username = '$user_id'";
 
            if($con->query($update_sql) === true && $con->query($update_job) === true) {
                 echo "Updated successfully!";
                 header('Location: ./fourth.php');
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