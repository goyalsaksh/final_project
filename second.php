<?php
    require_once "db.php";
    require_once "validate_session.php";

    $detail1 = '';
    $detail2 =  '';
    $ta1 = '';
    $ta2 = '';
    $start = array();
    $end = array();
    $qual = array();
    $insname = array();
    $marks = array();
    $majarea = array();
   
    // Delcare var with empty value here

    $sql = "SELECT t1.*, t2.start, t2.end, t2.qual, t2.insname, t2.marks,t2.majarea FROM emp2 t1
    JOIN qualification t2
    ON t1.username = t2.username
    WHERE t1.username = '$user_id';";

    $result = $con->query($sql);

    if($result) {
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
            $row = $result->fetch_assoc();
            $detail1 = $row['detail1'];
            $detail2 = $row['detail2'];
            $ta1 = $row['ta1'];
            $ta2  = $row['ta2'];
            $start = explode("|", $row['start']);
            $end = explode("|", $row['end']);
            $qual = explode("|", $row['qual']);
            $insname = explode("|", $row['insname']);
            $marks = explode("|", $row['marks']);
            $majarea = explode("|",$row['majarea']);
            // Assign here
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>secondPage</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            element2.type = "text";
            element2.name = "start[]";
            if(isValidArray) {
                element2.value = arr[0];
            }
            cell2.appendChild(element2);

            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "end[]";
            if(isValidArray) {
                element3.value = arr[1];
            }
            cell3.appendChild(element3);

            var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "qual[]";
            if(isValidArray) {
                element4.value = arr[2];
            }
            cell4.appendChild(element4);

            var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "text";
            element5.name = "insname[]";
            if(isValidArray) {
                element5.value = arr[3];
            }
            cell5.appendChild(element5);

            var cell6 = row.insertCell(5);
            var element6 = document.createElement("input");
            element6.type = "text";
            element6.name = "marks[]";
            if(isValidArray) {
                element6.value = arr[4];
            }
            cell6.appendChild(element6);

            var cell7 = row.insertCell(6);
            var element7 = document.createElement("input");
            element7.type = "text";
            element7.name = "majarea[]";
            if(isValidArray) {
                element7.value = arr[5];
            }
            cell7.appendChild(element7);
        }

        function removeRow(btnName) {  
            try {  
                var table = document.getElementById('dataTable2');  
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
                for($i = 0; $i < count($start); $i++) {
                    $param .= "addRow('dataTable2', ['" . $start[$i] . "', '" . $end[$i] . "', '"  . $qual[$i] . "', '" . $insname[$i] . "', '" . $marks[$i] . "','" . $majarea[$i] . "']);";
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
            <h2>Education Details</h2><br><br>
            <form action="register2.php" class="register-form" method="POST">
                <div>
                    <table>
                        <tr>
                            <th>Have you had any illness/accident/surgery/hospitalization<br>
                            during past five years which involved absence from work for a 
                            continuous period of 15 days or more; If yes , please give details</th>
                            <th>Any Physical impairments/permanent disability/history of 
                            chronic illness.If yes,please give details</th>
                        </tr>
                        <tr>
                            
                            <td><textarea id="textarea" name="detail1" rows="4" cols="50" ><?php echo $detail1 ?></textarea>
                            </td>
                            <td><textarea id="textarea" name="detail2" rows="4" cols="50"><?php echo $detail2 ?></textarea>
                            </td>
                        </tr></table>
                </div>
                    
                <div class="edu_details">
                    <label>Education Details(start from pre-university & include your professional qualifications)</label>
                    <table id="dataTable2" class="b1">
                        <tr>
                            <th>Delete</th>
                            <th>From<br>(Year)</th>
                            <th>To<br>(Year)</th>
                            <th>Title of Qualification</th>
                            <th>Name of the Institution/<br>University</th>
                            <th>% of marks obtained</th>
                            <th>Major subjects/Area<br> of Specialization</th>
                            
                        </tr>
                        <?php
                        if(count($start) == 0) {
                    ?>
                        <tr>
                            <td><input type="button" name="button1" value="Delete" onclick="removeRow('button1')"></td>
                            <td><input type="date"  name="start[]"></td>
                            <td><input type="date"  name="end[]"></td>
                            <td><input type="text"  name="qual[]"></td>
                            <td><input type="text"  name="insname[]"></td>
                            <td><input type="text"  name="marks[]"></td>
                            <td><input type="text" name="majarea[]"></td>
                        </tr>
                        <?php
                        }
                    ?>
                    </table>
            
                        <!-- <button class="btn2" type="button" onclick="myFunction1()">Click to Add</button><br><br> -->
                        <INPUT class="btn2" type="button" value="+" onclick="addRow('dataTable2')" />
                </div>
                <div>
                    <table>
                        <tr>
                            <td> If any delay/break occurred in finishing a course of study within the usual
                                time,please indicate reasons.</td>
                        
                        </tr>
                        <tr>
                            
                            <td><textarea id="textarea" name="ta1" rows="4" cols="50" ><?php echo $ta1 ?></textarea>
                            </td>
                        
                        </tr>
                    </table>
                </div>
                <div>
                    <table>
                        <tr>
                            <td>Have you ever been involved in or convicted in any legal/criminal proceedings.If yes,please give details 
                            </td>
                        
                        </tr>
                        <tr>
                            
                            <td><textarea id="textarea" name="ta2" rows="4" cols="50" ><?php echo $ta2 ?></textarea>
                            </td>
                        
                        </tr>
                    </table>
                </div>
                <button class="btn1" type="submit" name="submit">NEXT</button>
                <button type="button" class="btn1" onclick="window.location.href = 'demo.php'">BACK</button>
            </form><br>
            
        </div>
    </div>
</body>
</html>