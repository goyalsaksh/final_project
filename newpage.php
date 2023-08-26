<?php
    require_once "db.php";
    require_once "validate_session.php";

    $emp_count_emp = 0;
    $emp_count_emp2 = 0;
    $emp_count_emp3 = 0;
    $emp_count_emp4 = 0;
    $emp_count_emp5 = 0;

    $sql = "SELECT 'emp' as table_name, COUNT(*) as emp_count
    FROM emp
    WHERE username = '$user_id'
    UNION ALL
    SELECT 'emp2' as table_name, COUNT(*) as emp_count
    FROM emp2
    WHERE username = '$user_id'
    UNION ALL
    SELECT 'emp3' as table_name, COUNT(*) as emp_count
    FROM emp3
    WHERE username = '$user_id'
    UNION ALL
    SELECT 'emp4' as table_name, COUNT(*) as emp_count
    FROM emp4
    WHERE username = '$user_id';
    ";

    $result = $con->query($sql);

    $counts = array();

    while ($row = $result->fetch_assoc()) {
        $table_name = $row['table_name'];
        $emp_count = $row['emp_count'];
        $counts[$table_name] = $emp_count;
    }

    $emp_count_emp = $counts['emp'];
    $emp_count_emp2 = $counts['emp2'];
    $emp_count_emp3 = $counts['emp3'];
    $emp_count_emp4 = $counts['emp4'];

    // Existing doc check
    $pattern = "./docs/" . $user_id . "_*";
    $file_check = glob($pattern);
    $emp_count_emp5 = count($file_check);

    $submit_enable = $emp_count && $emp_count_emp2 && $emp_count_emp3 && $emp_count_emp4 && $emp_count_emp5;

    if(isset($_POST['submit'])){
        $date = $_POST['date'];
        $place = $_POST['place'];
        $appname = $_POST['appname'];
        $sql = "INSERT INTO EXTRA_DETAIL (`username`,`date`,`place`,`appname`) VALUES ('$user_id' ,'$date','$place','$appname')";
    
    
        if($con->query($sql) === true){
            
            // $_SESSION['ID'] = $emp_id;
    
            // $username = $_SESSION['ID'];
                echo "Inserted successfully!";
                header('Location: ./thankspage.html');
        }
        else{
            echo "ERROR:$sql<br> $con->error";
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style6.css">
    <script>
        function checkboxHandler() {
            const persondetails = document.getElementById("persondetails").checked;
            const edudetails = document.getElementById("edudetails").checked;
            const workexp = document.getElementById("workexp").checked;
            const additiondetails = document.getElementById("additiondetails").checked;
            const attachmentdetails = document.getElementById("attachmentdetails").checked;
            const button = document.getElementById("submit");

            if(persondetails && edudetails && workexp && additiondetails && attachmentdetails) {
                button.disabled = false;
            }
            else {
                button.disabled = true;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <h2>Welcome to Fresenius Kabi</h2>
            <form action="" method="post">
                <div class="nav">
                   <div>
                        <label for="">
                            <input type="checkbox" name="persondetails" id="persondetails" disabled <?php echo $emp_count_emp > 0 ? "checked" : "" ?>>
                            <button type="button" class="btn1" onclick="window.location.href = 'demo.php'">Primary Details</button>
                        </label><br>
                   </div>
                    <div>
                        <label for="">
                            <input type="checkbox" name="edudetails" id="edudetails" disabled <?php echo $emp_count_emp2 > 0 ? "checked" : "" ?>>
                            <!-- <a href="second.html">Education Details</a> -->
                            <button type="button" class="btn1" onclick="window.location.href = 'second.php'">Educational Details</button>                           
                        </label><br>
                    </div>
                    <div>
                        <label for="">
                            <input type="checkbox" name="workexp" id="workexp" disabled <?php echo $emp_count_emp3 > 0 ? "checked" : "" ?>>
                            <button type="button" class="btn1" onclick="window.location.href = 'third.php'">Work Experience</button>
                        </label><br>
                    </div>
                   <div>
                        <label for="">
                            <input type="checkbox" name="additiondetails" id="additiondetails" disabled <?php echo $emp_count_emp4 > 0 ? "checked" : "" ?>>
                            <button type="button" class="btn1" onclick="window.location.href = 'fourth.php'">Additional Details</button>
                        </label><br>
                   </div>
                    <div>
                        <label for="">
                            <input type="checkbox" name="attachmentdetails" id="attachmentdetails" disabled <?php echo $emp_count_emp5 > 0 ? "checked" : "" ?>>
                            <button type="button" class="btn1" onclick="window.location.href = 'last.html'">Attach Documents</button>
                        </label><br>
                    </div>
                </div>
                <div>
                <p><b><br>I hereby declare that all the information provided in this form is true to the best of my knowledge and
                    that nothing has been concealed or misinterpreted.I further declare that the above mentioned facts 
                    may be verified by the Fresenius kabi Group with my references,previous employer(s) as well as the 
                    current employer. I understand and agree that any misinterpretation or concealment of facts or 
                    information on this form is sufficient cause for dismissal,without notice or compensation, by the
                    company.</b></p>
                </div>
                <div>
                        <br><p>Date: <input type="date" type="date" name="date"></p><br>
                        <p> Place: <input type="text" id="text" name="place"><br></p>
                </div>
                <div>
                       <br> Applicant's Signature: <input type="text" id="text" name="appname" placeholder="Write your Name">

                </div>    
                <center>   
                 <button class="submit btn1" type="submit" id="submit" <?php echo $submit_enable ? "" : "disabled" ?>>Submit</button>
                 </center>     
                    
           </form>      
        </div>
    </div>
</body>
</html>