<?php
    require_once "db.php";
    require_once "validate_session.php";

    $name = '';
    $pos =  '';
    $date = '';
    $func = '';
    $adv = '';
    $preadd = '';
    $peradd = '';
    $phone1 = '';
    $phone2 = '';
    $email = '';
    $nat = '';
    $status = '';
    $blgrp = '';
    $isSame = false;
    $relation = array();
    $rname = array();
    $roccup = array();
    $rage = array();
    $rdepend = array();
    // Delcare var with empty value here

    $sql = "SELECT t1.*, t2.relation, t2.rname, t2.roccup, t2.rage, t2.rdepend FROM emp t1
    JOIN family_details t2
    ON t1.username = t2.username
    WHERE t1.username = '$user_id';";

    $result = $con->query($sql);

    if($result) {
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $pos = $row['pos'];
            $date = $row['date'];
            $func = $row['func'];
            $adv = $row['adv'];
            $preadd = $row['preadd'];
            $peradd = $row['peradd'];
            $phone1 = $row['phone1'];
            $phone2 = $row['phone2'];
            $email = $row['email'];
            $nat = $row['nat'];
            $status = $row['status'];
            $blgrp = $row['blgrp'];
            $isSame = $peradd == $preadd;
            $relation = explode("|", $row['relation']);
            $rname = explode("|", $row['rname']);
            $roccup = explode("|", $row['roccup']);
            $rage = explode("|", $row['rage']);
            $rdepend = explode("|", $row['rdepend']);
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onboarding Form</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roberto">
    <style></style>
    <SCRIPT language="javascript">

        function addRow(tableID, arr) {
            const isValidArray = Array.isArray(arr);
            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "button";
            var btnName = "button" + (rowCount + 1);
            element1.name = btnName;
            element1.setAttribute('value', 'Delete'); // or element1.value = "button";  
            element1.onclick = function () { removeRow(btnName); }
            cell1.appendChild(element1);

            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.name = "relation[]";
            if(isValidArray) {
                element2.value = arr[0];
            }
            cell2.appendChild(element2);

            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "rname[]";
            if(isValidArray) {
                element3.value = arr[1];
            }
            cell3.appendChild(element3);

            var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "roccup[]";
            if(isValidArray) {
                element4.value = arr[2];
            }
            cell4.appendChild(element4);

            var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "text";
            element5.name = "rage[]";
            if(isValidArray) {
                element5.value = arr[3];
            }
            cell5.appendChild(element5);

            var cell6 = row.insertCell(5);
            var element6 = document.createElement("input");
            element6.type = "text";
            element6.name = "rdepend[]";
            if(isValidArray) {
                element6.value = arr[4];
            }
            cell6.appendChild(element6);

        }

        function removeRow(btnName) {
            try {
                var table = document.getElementById('dataTable');
                var rowCount = table.rows.length;
                for (var i = 0; i < rowCount; i++) {
                    var row = table.rows[i];
                    var rowObj = row.cells[0].childNodes[0];
                    if (rowObj.name == btnName) {
                        table.deleteRow(i);
                        rowCount--;
                    }
                }
            }
            catch (e) {
                alert(e);
            }
        }


        function addressHandler() {
            const isSame = document.getElementById("isSame");
            const preadd = document.getElementById("preadd")
            const peradd = document.getElementById("peradd")
            if (isSame.checked) {
                peradd.value = preadd.value;
                peradd.disabled = false;
            }
            else {
                peradd.value = '';
                peradd.disabled = false;
            }
        }
        function dataHandler(){
            const date = document.getElementById("date");
            console.log(date.value)
            const currentDate = new Date();
            const enteredDate= new Date(date.value);
            const ageinMilliseconds=currentDate-enteredDate;
            const ageInYears = ageinMilliseconds/(365*24*60*60*1000);
            if(ageInYears<18){
                alert("You must be atleast 18 years old to submit this form");
                document.getElementById("submit").disabled=true;
            }
            else{
                document.getElementById("submit").disabled = false;
            }
        }

        function server_add_rows() {
            <?php
                $param = "";
                for($i = 0; $i < count($relation); $i++) {
                    $param .= "addRow('dataTable', ['" . $relation[$i] . "', '" . $rname[$i] . "', '"  . $roccup[$i] . "', '" . $rage[$i] . "', '" . $rdepend[$i] . "']);";
                }
                echo $param;
            ?>
        }

        window.onload = function () {
            server_add_rows();
        }

    </SCRIPT>
    <!-- <script>
        // Save form1 data every 5 seconds
        $('#form1').sisyphus( {timeout: 5 } );
    </script> -->
</head>

<body>
    <!-- <img class="bg" src="f3.jpg" alt="Fresenius Kabi"> -->
    <div class="wrapper">
        <div class="container">

            <h2>Primary Details</h2><br><br>
            <form action="register.php" method="POST" id="form1">
                <div>
                    <label>Applicant's name:</label>
                    <input type="text" id="text" name="name" value="<?php echo $name ?>" placeholder="Enter Name" required>
                </div>
                <div>
                    <label>Date of Birth:</label>
                    <input type="date" id="date" value="<?php echo $date ?>" name="date" placeholder="Enter Date of Birth" onchange="dataHandler()" required>
                </div>
                <div>
                    <label>Position Applied for:</label>
                    <input type="text" id="text" name="pos" value="<?php echo $pos ?>" placeholder="Enter position" required>
                </div>
                <div>
                    <label>Function:</label>
                    <input type="text" id="text" name="func" value="<?php echo $func ?>" placeholder="Enter function" required>

                </div>
                <div>
                    <label>Where did you hear about us:</label>
                    <select name="adv" id="">
                        <option value="Linkedin" <?php echo $adv == "Linkedin" ? "selected" : "" ?>>Linkedin</option>
                        <option value="Facebook" <?php echo $adv == "Facebook" ? "selected" : "" ?>>Facebook</option>
                        <option value="Careers Site" <?php echo $adv == "Careers Site" ? "selected" : "" ?>>Careers Site</option>
                    </select>

                </div>
                <div>
                    <label>Present Address:</label>
                    <input type="text" id="preadd" name="preadd" value="<?php echo $preadd ?>" placeholder="Enter Present Address" required>

                </div>

                <div class="isSame">
                    <input type="checkbox" id="isSame" name="isSame" onchange="addressHandler()" <?php echo $isSame ? "checked" : "" ?>>
                    <label for="isSame">Is Permanent address same as Present Address?</label>
                </div>
                <div>
                    <label>Permanent Address:</label>
                    <input type="text" id="peradd" name="peradd" value="<?php echo $peradd ?>" placeholder="Enter Permanent Address" required>
                </div>
                <div>
                    <label> <i class="fa-solid fa-phone"></i>
                        (Residence):</label>
                        <input type="tel" id="phone" name="phone1" value="<?php echo $phone1 ?>" placeholder="Enter Residence Phone number" maxlength="10" >
                    </div>
                <div>
                    <label> <i class="fa-solid fa-phone"></i>(Emergency):</label>
                    <input type="tel" id="phone" name="phone2" value="<?php echo $phone2 ?>" placeholder="Enter Emergency Phone number" maxlength="10" >

                </div>
                <div>
                    <label>Personal E-mail Id:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email ?>" placeholder="Enter E-mail">
                </div>
                <div>
                    <label>Nationality:</label>
                    <input type="text" id="text" name="nat" value="<?php echo $nat ?>" placeholder="Enter Nationality">
                </div>
                <div>
                    <label for="status">Enter Marital Status:</label>
                    <input type="text" id="text" name="status" value="<?php echo $status ?>" placeholder="Enter Marital Status (Single/Married/Divorced/Widowed)">
                </div>
                <div>
                    <label>Blood Group:</label>
                    <input type="text" id="text" name="blgrp" value="<?php echo $blgrp ?>" placeholder="Enter Blood Group">
                </div>
                <label>Immediate Family Details(Dependents Only)</label>
                <table id="dataTable" class="b1">
                    <tr>
                        <th>Delete</th>
                        <th>Relationship</th>
                        <th>Name</th>
                        <th>Occupation</th>
                        <th>Age</th>
                        <th>Dependent(Y/N)</th>
                    </tr>
                    
                    <?php
                        if(count($relation) == 0) {
                    ?>
                        <tr>
                            <td><input type="button" name="button1" value="Delete" onclick="removeRow('button1')"></td>
                            <td><input type="text" name="relation[]"></td>
                            <td><input type="text" name="rname[]"></td>
                            <td><input type="text" name="roccup[]"></td>
                            <td><input type="text" name="rage[]"></td>
                            <td><input type="text" name="rdepend[]"></td>
                        </tr>
                    <?php
                        }
                    ?>

                </table>
                <INPUT class="btn2" type="button" value="+" onclick="addRow('dataTable')" />
                <br>
                <button class="btn1" type="submit" name="submit" id="submit">NEXT</button>

                </form>


        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</body>

</html>

<!-- SELECT t1.*, t2.* FROM emp t1
JOIN family_details t2
ON t1.id = t2.emp_id
where t1.id = 14 -->