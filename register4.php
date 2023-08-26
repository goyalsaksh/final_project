<?php
    require_once "db.php";
    require_once "validate_session.php";

    if(isset($_POST['submit'])){
   
    extract($_POST);

    $str = "VALUES ";
    for($i = 0; $i < count($lang); $i++) {
        $str .= "(''," . "'".$user_id."',";
        $str .= "'" . $lang[$i] . "', " . "'" . $speak[$i] . "', " . "'" . $read[$i] . "', " . "'" . $write[$i];
        $str .= "')";

        if($i != count($lang) - 1) {
            $str .= ",";
        }
    }

    $sql = "INSERT INTO EMP4 (`id`, `username`,`ta7`,`ta8`,`ta9`,`ta10`,`ta11`) VALUES ('', '$user_id' ,'$ta7','$ta8','$ta9','$ta10','$ta11')";

    $sql2 = "INSERT INTO lang (`id`, `username`, `lang`, `speak`, `read`, `write`) " . $str;

    try{
        if($con->query($sql) === true && $con->query($sql2) === true){
                echo "Inserted successfully!";
                header('Location: ./last.html');
        }
        else{
            echo "ERROR:$sql<br> $con->error";
        }
    }

    catch(mysqli_sql_exception $e){
        if ($e->getCode() === 1062) {
            $update_sql = "UPDATE EMP4
            SET ta7 = '$ta7',  ta8 = '$ta8',  ta9 = '$ta9',  ta10 = '$ta10',  ta11 = '$ta11'
            WHERE username = '$user_id'";
 
            $update_lang = "UPDATE LANG
            SET lang = '$lang', speak = '$speak', read = '$read', write = '$write'
            WHERE username = '$user_id'";
 
            if($con->query($update_sql) === true && $con->query($update_lang) === true) {
                 echo "Updated successfully!";
                 header('Location: ./last.html');
            }
            else {
                 echo "ERROR:$sql<br> $con->error";
             }
 
         } else {
             echo "An error occurred: " . $e->getMessage();
         }
    }

}

?>