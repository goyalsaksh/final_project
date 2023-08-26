<?php
    require_once "db.php";

    $_SESSION['USERNAME']=$username;
        if(isset($_POST['submit'])){
            $admin_id = $_POST['username'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $location = $_POST['location'];
           
            $password = $_POST['password'];

        $sql = "INSERT INTO ADMIN_DETAILS (`name`,`gender`,`location`,`username`,`password`) VALUES ('$name',
        '$gender','$location','$admin_id','$password')";

        if($con->query($sql) === true){

            // Call send mail function here
            // echo mail sent if success

            header('Location: ./adminlogin.html');
            // $emp_id = $_SESSION['ID'];$_SESSION['USERNAME'] = $user_id;
        }
        else{
            echo "username already present";
        }
    }

?>