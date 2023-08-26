<?php
    require_once "db.php";
    require_once "validate_session.php";

    $ta3 = '';
    $ta4 =  '';
    $ta5 = '';
    $selectop = '';
    $passno = '';
    $passval = '';
    $ta6 = '';
    $orgstart = array();
    $orgend = array();
    $orgname = array();
    $orgposj = array();
    $orgposl = array();
    $lastpos = array();
    // Delcare var with empty value here

    $sql = "SELECT t1.*, t2.orgstart, t2.orgend, t2.orgname, t2.orgposj, t2.orgposl,t2.lastpos FROM emp3 t1
    JOIN job t2
    ON t1.username = t2.username
    WHERE t1.username = '$user_id';";

    $result = $con->query($sql);

    if($result) {
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
            $row = $result->fetch_assoc();
            $ta3 = $row['ta3'];
            $ta4 =  $row['ta4'];
            $ta5 = $row['ta5'];
            $selectop = $row['selectop'];
            $passno = $row['passno'];
            $passval = $row['passval'];
            $ta6 = $row['ta6'];
            $orgstart = explode("|", $row['orgstart']);
            $orgend = explode("|", $row['orgend']);
            $orgname = explode("|", $row['orgname']);
            $orgposj = explode("|", $row['orgposj']);
            $orgposl = explode("|", $row['orgposl']);
            $lastpos = explode("|", $row['lastpos']);
            // Assign here
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thirdPage</title>
    <link href="style2.css" rel="stylesheet">
    <SCRIPT language="javascript">

        function addRow(tableID1,arr) {
            const isValidArray = Array.isArray(arr);
            var table = document.getElementById(tableID1);

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
            element2.type = "date";
            element2.name = "orgstart[]";
            if(isValidArray) {
                element2.value = arr[0];
            }
            cell2.appendChild(element2);

            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "date";
            element3.name = "orgend[]";
            if(isValidArray) {
                element3.value = arr[1];
            }
            cell3.appendChild(element3);

            var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "orgname[]";
            if(isValidArray) {
                element4.value = arr[2];
            }
            cell4.appendChild(element4);

            var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "text";
            element5.name = "orgposj[]";
            if(isValidArray) {
                element5.value = arr[3];
            }
            cell5.appendChild(element5);

            var cell6 = row.insertCell(5);
            var element6 = document.createElement("input");
            element6.type = "text";
            element6.name = "orgposl[]";
            if(isValidArray) {
                element6.value = arr[4];
            }
            cell6.appendChild(element6);

            var cell7 = row.insertCell(6);
            var element7 = document.createElement("input");
            element7.type = "text";
            element7.name = "lastpos[]";
            if(isValidArray) {
                element7.value = arr[5];
            }
            cell7.appendChild(element7);
            }
                
            function removeRow(btnName) {  
                try {  
                    var table = document.getElementById('dataTable1');  
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
        function server_add_rows() {
            <?php
                $param = "";
                for($i = 0; $i < count($orgstart); $i++) {
                    $param .= "addRow('dataTable1', ['" . $orgstart[$i] . "', '" . $orgend[$i] . "', '"  . $orgname[$i] . "', '" . $orgposj[$i] . "', '" . $orgposl[$i] . "','".$lastpos[$i]."']);";
                }
                echo $param;
            ?>
        }

        window.onload = function () {
            server_add_rows();
        }

        
    </SCRIPT>
</head>
<body>
    <div class="wrapper">

    <div class="container">
    <h2>Work Experience Details</h2><br><br>

        <form action="register3.php" method="post">
           
            <div class="b1">
                <table id="dataTable1">
                    <tr>
                        <th>Delete</th>
                        <th>From-<br>month<br>& year</th>
                        <th>To-<br>month<br>& year</th>
                        <th>Name of the Organization</th>
                        <th>Designation<br>(at the time of<br>joining)</th>
                        <th>Designation<br>(at the time of<br>leaving)</th>
                        <th>Reporting to in<br>the last position<br>(designation)</th>
                    </tr>
                    <?php
                        if(count($orgstart) == 0) {
                    ?>
                    <tr>
                    <td><input type="button" name="button1" value="Delete" onclick="removeRow('button1')"></td>
                    <td><input type="date"  name="orgstart[]"></td>
                    <td><input type="date"  name="orgend[]"></td>
                    <td><input type="text"  name="orgname[]"></td>
                    <td><input type="text"  name="orgposj[]"></td>
                    <td><input type="text"  name="orgposl[]"></td>
                    <td><input type="text"  name="lastpos[]"></td>
                        
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <!-- <button class="btn2" type="button" onclick="myFunction()">Click to Add</button><br><br> -->
                <INPUT class="btn" type="button" value="+" onclick="addRow('dataTable1')" />
            </div>

            <br>
            <table class="b2">
                <tr>
                    <td>Please outline the reasons for looking for a change from the present employment</td>
                </tr>
                <tr>
                    <td><textarea id="textarea" name="ta3" rows="4" cols="100" ><?php echo $ta3 ?></textarea> </td>
                </tr>
            </table><br><br>
            <table class="b2">
                <tr>
                    <th>Membership of professional Bodies,if any</th>
                    <th>Professional/Research Publications,if any</th>
                </tr>
                <tr>
                    
                    <td><textarea id="textarea" name="ta4" rows="4" cols="50" ><?php echo $ta4 ?></textarea>
                    </td>
                    <td><textarea id="textarea" name="ta5" rows="4" cols="50"><?php echo $ta5 ?></textarea>
                    </td>
                </tr></table><br><br>
                    <label><b>Are you willing to travel:</b></label>
                       
                        <select name="selectop" id="ops" value = "<?php echo $selectop ?>">
                            <option value="Yes">YES</option>
                            <option value="No">NO</option>
                       </select>
                       <br><br>
                    <table class="box2">
                        <tr>
                            <td>Do you have a valid Passport? Yes/No.If Yes,please furnish the following details.</td>
                       
                        <tr>
                            <td>
                                Passport Number:<input type="text" id="text" name="passno" value="<?php echo $passno?>">
                                Validity till:<input type="text" id="text" name="passval" value="<?php echo $passval?>"></td>
                            </tr>
                    </table><br><br>
                    <table class="box2">
                        <tr>
                            <td>Draw the organization chart of 2 levels below and above in your current organization and indicate
                                where you fit.</td>
                        </tr>
                        <tr>
                            <td><textarea id="textarea" name="ta6" rows="4" cols="100" ><?php echo $ta6 ?></textarea> </td>
                        </tr>
                    </table>
                    <button class="btn1" type="submit" name="submit">NEXT</button>
        </form><br>
        <a href="second.php">
            <button class="btn1">BACK</button>
        </a>
        
       </div>
               
    </div>
</body>
</html>