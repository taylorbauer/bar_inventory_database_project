<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<head>
    <link href="myStyle.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <title>Add Ingredients</title>

</head>

<body>
    <h3>Add Ingredients</h3>
    <?php


    $mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");
    $resultSet1 = $mysqli->query("SELECT name, distiller, spiritID FROM SPIRIT ORDER BY distiller ASC");
    $resultSet2 = $mysqli->query("SELECT name FROM RECIPES");
    ?>
    <br>
    <p>
        <form method="POST" action="AddIngredientsSuccess.php" id="updateForm">
        Recipe:
            <!-- <input type="hidden" name="action" value="search_key"> -->

            <select name="key">
                <?php
                while ($rows2 = $resultSet2->fetch_assoc()) {
                    $name = $rows2['name'];
                    $recipeID = $rows2['recipeID'];
                    echo "<option value = '$recipeID'>$name</option>";
                }
                ?>
            </select>
            <br><br>New Ingredient:
            <select name="key2">
                <?php
                while ($rows1 = $resultSet1->fetch_assoc()) {
                    $name1 = $rows1['name'];
                    $spiritID = $rows1['spiritID'];
                    $distiller = $rows1['distiller'];
                    echo "<option value = '$spiritID'>$distiller $name1</option>";
                }
                ?>
                </select>
            <br><br>Quantity: 
            <input id="quantity" name="quantity" type="text"><br><br>
            <button type="submit">Submit</button>
        </form>
        <form><button type="submit" formaction="index.html">Back to Home</button></form>

    </p>