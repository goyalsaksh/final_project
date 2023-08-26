<?php
    require_once "db.php";
    // require Validate Admin later
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Mail</title>
</head>
<body>
    <form method="post" action="send_mail.php">
        <table>
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $qry = "SELECT name, location, username FROM user_details";
                    $result = $con->query($qry);

                    $i = 1;
                    while($row = $result -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td><button type='submit' name='submit' value='" . $row['username'] . "'>Send Email</button></td>";
                        echo "</tr>";
                        $i++;
                    }
                ?>
            </tbody>
        </table>
    </form>
</body>
</html>