<?php
    require_once "db.php";
    require_once "validate_session.php";

    // $username = $_SESSION['USERNAME'];

    if(isset($_POST['submit'])){
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];

    $sql = "SELECT password from USER_DETAILS WHERE username='$user_id'";

    $result = $con->query($sql);

    if($result){
        $username = $con->insert_id;
       

        // $username = $_SESSION['username'];
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
            $row = $result->fetch_assoc();

            $serverpass = $row['password'];

            if($oldpassword != $serverpass) {
                echo "Wrong Old Password!";
                exit(0);
            }

            $sql2 = "UPDATE USER_DETAILS SET changed='Y', password='$newpassword' WHERE username = '$user_id'";
            
            if($con->query($sql2) == true) {
                header('Location: ./newpage.php');
            }
            else {
                echo "Unable to change password";
            }
        }
        else {
            echo "Wrong Username/Password";
        }
    }
    else{
        echo "user not found";
    }
}

?>