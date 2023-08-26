<?php
    require_once "db.php";
    require_once "validate_session.php";

        $ta7 = '';
        $ta8 = '';
        $ta9 = '';
        $ta10 = '';
        $ta11 = '';
        $lang = array();
        $speak = array();
        $read = array();
        $write = array();
    // Delcare var with empty value here

    $sql = "SELECT t1.*, t2.lang, t2.speak, t2.read, t2.write FROM emp4 t1
    JOIN lang t2
    ON t1.username = t2.username
    WHERE t1.username = '$user_id';";

    $result = $con->query($sql);

    if($result) {
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
            $row = $result->fetch_assoc();
            $ta7 = $row['ta7'];
            $ta8 = $row['ta8'];
            $ta9 = $row['ta9'];
            $ta10 = $row['ta10'];
            $ta11 = $row['ta11'];
            $lang = explode("|", $row['lang']);
            $speak = explode("|", $row['speak']);
            $read = explode("|", $row['read']);
            $write = explode("|", $row['write']);
            // Assign here
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fourthPage</title>
    <link rel="stylesheet" href="style2.css">
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
           element2.name = "lang[]";
           if(isValidArray) {
                element2.value = arr[0];
            }
           cell2.appendChild(element2);

           var cell3 = row.insertCell(2);
           var element3 = document.createElement("input");
           element3.type = "text";
           element3.name = "speak[]";
           if(isValidArray) {
                element3.value = arr[1];
            }
           cell3.appendChild(element3);

           var cell4 = row.insertCell(3);
           var element4 = document.createElement("input");
           element4.type = "text";
           element4.name = "read[]";
           if(isValidArray) {
                element4.value = arr[2];
            }
           cell4.appendChild(element4);

           var cell5 = row.insertCell(4);
           var element5 = document.createElement("input");
           element5.type = "text";
           element5.name = "write[]";
           if(isValidArray) {
                element5.value = arr[3];
            }
           cell5.appendChild(element5);
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
                for($i = 0; $i < count($lang); $i++) {
                    $param .= "addRow('dataTable2', ['" . $lang[$i] . "', '" . $speak[$i] . "', '"  . $read[$i] . "', '" . $write[$i] . "']);";
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
        <h2>Additional Details</h2><br><br>
        <form action="register4.php" method="post">
            <label>Languages Known**</label>
            <div class="b1">
                <table id="dataTable2">
                    <tr>
                        <th>Delete</th>
                        <th>Language</th>
                        <th>Speak</th>
                        <th>Read</th>
                        <th>Write</th>
                    </tr> 
                    <?php
                        if(count($lang) == 0) {
                    ?>
                    <tr>
                        <td><input type="button" name="button1" value="Delete" onclick="removeRow('button1')"></td>
                        <td><input type="text"  name="lang[]"></td>
                        <td><input type="number"  name="speak[]"></td>
                        <td><input type="number"  name="read[]"></td>
                        <td><input type="number"  name="write[]"></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                
                <INPUT class="btn2" type="button" value="+" onclick="addRow('dataTable2')" />
            </div>
                <p>**Please use the following grading:<br>
                1=Basic,2=Satisfactory,3=Good,4=Fluent,5=Excellent.
                Please specify the native language/mother tongue.</p><br>
            <table class="b2">
                <tr>
                    <td>Hobbies/Extra Curricular Activities(Literary/Cultural/Social Interests)</td>
                </tr>
                <tr>
                    <td><textarea id="textarea" name="ta7" rows="4" cols="100" ><?php echo $ta7 ?></textarea> </td>
                </tr>
            </table><br><br>

            <table class="b2">
                <tr>
                    <td>Do you have any friends/relatives in any company/unit of Fresenius kabi Group.. If Yes , provide
                        name,designation & nature of relationship</td>
                </tr>
                <tr>
                    <td><textarea id="textarea" name="ta8" rows="4" cols="100" ><?php echo $ta8 ?></textarea> </td>
                </tr>
            </table><br><br>
            
            <table class="b2">
                <tr>
                    <td> Have you ever been interviewed at any company/unit of Fresenius Kabi Group before. If Yes,please
                        indicate the month,year &position</td>
                </tr>
                <tr>
                    <td><textarea id="textarea" name="ta9" rows="4" cols="100" ><?php echo $ta9 ?></textarea> </td>
                </tr>
            </table><br><br>
            
            <table class="b2">
                <tr>
                    <td> Names,contact number of two professional references other than relatives who know you closely and
                        to whom we may contact for references.</td>
                </tr>
                <tr>
                    <td><textarea id="textarea" name="ta10" ><?php echo $ta10 ?></textarea>
                    <textarea id="textarea" namr="ta11" ><?php echo $ta11 ?></textarea> </td>
                </tr>
            </table><br><br>
            <button class="btn1" type="submit" name="submit">NEXT</button>
        </form>
        <a href="third.php">
            <button class="btn1">BACK</button>
        </a>
        
    </div>
    </div>
</body>
</html>