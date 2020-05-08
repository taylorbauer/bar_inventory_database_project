<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<head>
    <link href="myStyle.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <title>Recipe Lookup</title>

</head>

<body>
    <h3>Recipe Lookup</h3>
    <?php


    $mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");
    $resultSet = $mysqli->query("SELECT * FROM RECIPES ORDER BY name ASC");
    ?>
    <br>
    <p>Which recipe would you like to look up?
        <form method="POST" action="RecipeLookupResults.php" id="searchForm">
            <input type="hidden" name="action" value="search_key">

            <select name="key">
                <?php
                while ($rows = $resultSet->fetch_assoc()) {
                    $name = $rows['name'];
                    echo "<option value = '$name'>$name </option>";
                }
                ?>
            </select>
            <button type="submit">Submit</button>
        </form>
        <br><form><button type="submit" formaction="index.html">Back to Home</button></form>

    </p>