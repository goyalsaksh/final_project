<?php
    require_once "db.php";
    require_once "constants.php";

    session_start();
    $_SESSION['USERNAME']=$username;
        if(isset($_POST['submit'])){
            $user_id = $_POST['username'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $location = $_POST['location'];
            $password = $_POST['password'];

            if(!preg_match($email_regex, $user_id)) {
                echo "Please enter valid email address";
                exit(0);
            }

        $sql = "INSERT INTO USER_DETAILS (`name`,`gender`,`location`,`username`,`password`, `changed`) VALUES ('$name',
        '$gender','$location','$user_id','$password', 'N')";

        if($con->query($sql) === true){

            // Call send mail function here
            // echo mail sent if success

            header('Location: ./adminpanel.html');
            // $emp_id = $_SESSION['ID'];
            $_SESSION['USERNAME'] = $user_id;
        }
        else{
            echo "username already present";
        }
    }

?>