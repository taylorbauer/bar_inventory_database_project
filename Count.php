<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<head>
    <link href="myStyle.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <title>New Count</title>

</head>

<body>
    <h3>New Count</h3>
    <?php


    $mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");
    $resultSet = $mysqli->query("SELECT name, distiller, spiritID FROM SPIRIT ORDER BY distiller ASC");
    ?>
    <br>
    <p>Which count would you like to update? 
        <form method="POST" action="CountUpdate.php" id="updateForm">
            <input type="hidden" name="action" value="search_key">

            <select name="key">
                <?php
                while ($rows = $resultSet->fetch_assoc()) {
                    $name = $rows['name'];
                    $distiller = $rows['distiller'];
                    $spiritID = $rows['spiritID'];
                    echo "<option value = '$spiritID'>$distiller $name </option>";
                }
                ?>
            </select>
            <br><br>New Count:
            <input id="count" name="count" type="number"><br><br>
            <button type="submit">Submit</button>
        </form>
        <form><button type="submit" formaction="index.html">Back to Home</button></form>

    </p>