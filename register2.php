<?php
    require_once "db.php";
    require_once "validate_session.php";

    if(isset($_POST['submit'])){
    $detail1 = $_POST['detail1'];
    $detail2 = $_POST['detail2'];
    $ta1 = $_POST['ta1'];
    $ta2 = $_POST['ta2'];
    $start = implode("|", $_POST['start']);
    $end = implode("|", $_POST['end']);
    $qual = implode("|", $_POST['qual']);
    $insname = implode("|", $_POST['insname']);
    $marks = implode("|", $_POST['marks']);
    $majarea = implode("|", $_POST['majarea']);
    // $username = $_SESSION['ID'];
    $sql = "INSERT INTO EMP2 (`id`, `username`,`detail1`,`detail2`,`ta1`,`ta2`) VALUES ('', '$user_id' ,'$detail1','$detail2','$ta1','$ta2')";


    try{
        if($con->query($sql) === true){
            // $username = $con->insert_id;
            // $_SESSION['ID'] = $emp_id;
    
            // $username = $_SESSION['ID'];
    
            $qualification_sql = "INSERT INTO QUALIFICATION (`id`, `username`, `start`, `end`, `qual`, `insname`, `marks`,`majarea`) VALUES ('', '$user_id', '$start', '$end', '$qual', '$insname', '$marks','$majarea')";
    
            if($con->query($qualification_sql) === true) {
                echo "Inserted successfully!";
                header('Location: ./third.php');
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
        if ($e->getCode() === 1062) {
           $update_sql = "UPDATE EMP2
           SET detail1 = '$detail1',  detail2 = '$detail2',  ta1 = '$ta1',  ta2 = '$ta2'
           WHERE username = '$user_id'";

           $update_qualification = "UPDATE QUALIFICATION
           SET start = '$start', end = '$end', qual = '$qual', insname = '$insname', marks = '$marks' , majarea = '$majarea'
           WHERE username = '$user_id'";

           if($con->query($update_sql) === true && $con->query($update_qualification) === true) {
                echo "Updated successfully!";
                header('Location: ./third.php');
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