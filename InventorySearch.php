<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<head>
    <link href="myStyle.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <title>Inventory Search</title>

</head>

<body>
    <h3>Inventory Search</h3>
    <?php
    

    $mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");
    $resultSet = $mysqli->query("SELECT name, distiller FROM SPIRIT ORDER BY distiller ASC");
    ?>
    <p>View full inventory report for spirit
    <form method="POST" action="SearchResults.php" id="searchForm">
    <input type="hidden" name="action" value="search_key">

        <select name="key">
            <?php
            while ($rows = $resultSet->fetch_assoc()) {
                $name = $rows['name'];
                $distiller = $rows['distiller'];
                echo "<option value = '$name'>$distiller $name </option>";
            }
            ?>
        </select>
        <button type="submit">Submit</button>
        </form>

    </p>



    
    <br>
    <form><button type="submit" formaction="index.html">Back to Home</button></form>

</body>

