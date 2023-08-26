<?php
    require_once "db.php";
    session_start();

    if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, changed from USER_DETAILS WHERE username='$username' and password='$password'";

    $result = $con->query($sql);


    if($result){
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
            $row = $result->fetch_assoc();

            $_SESSION['USERNAME'] = $row['username'];

            if($row['changed'] == 'N') {
                header('Location: ./changepass.html');
            }
            else {
                header('Location: ./newpage.php');
            }
        }
        else {
            echo "Wrong Username/Password";
        }
        // $emp_id = $_SESSION['ID'];
    }
    else{
        echo "unable to fetch";
    }
}

?>