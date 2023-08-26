<?php

    require_once "db.php";
    require_once "constants.php";
    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';
    require './PHPMailer/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    // ini_set("sendmail_from", "chauhan.sanjeev@hotmail.com");  
    if(isset($_POST['submit'])) {
        $email = $_POST['submit'];

        if(!preg_match($email_regex, $email)) {
            echo "Please enter valid email address";
            exit(0);
        }

        $user_details = "SELECT * FROM user_details WHERE username = '$email'";
        $result = $con->query($user_details);
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            $row = $result->fetch_assoc();

            $name = $row['name'];
            $email = $row['username'];
            $pass = $row['password'];

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'kapshreya12@gmail.com';
            $mail->Password   = 'ocflldfydxfkozbz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('kapshreya12@gmail.com', 'Fresenius Kabi');
            $mail->addAddress($email, $name);
            $mail->Subject =  "Registration Credentials";
            $mail->Body    = "Hello $name , Your registration credentials are Email - $email and Password - $pass";

            try {
                $mail->send();
                echo 'Email has been sent!';
            }
            catch (Exception $e) {
                echo "Email could not be sent. Error: {$mail->ErrorInfo}";
            }
        }
    }

?>