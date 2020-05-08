<html>

<head>
    <link href="myStyle.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <title>Recipe Lookup</title>

</head>

<body>
    <h3>Recipe Lookup</h3>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");
    $name1 = $_REQUEST['key'];
    $query = "SELECT name, glass, method, additional_ingredients FROM RECIPES WHERE name = \"$name1\"";
    if ($result = $mysqli->query($query)) {

    echo "<table><caption>Recipe Search Results</caption>";
    echo "<tr><th>Recipe Name</th><th>Glass</th><th>Method</th><th>Additional Ingredients</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $glass = $row["glass"];
        $method = $row["method"];
        $additional_ingredients = $row["additional_ingredients"];
        echo "<tr><td>" . $name . "</td><td>" . $glass . "</td><td>" . $method . "</td><td>" . $additional_ingredients . "</td></tr>";        
    }

    echo "</table><br>";
}

    $query2 = "SELECT SPIRIT.distiller, SPIRIT.name, USED_IN.amount FROM USED_IN, SPIRIT, RECIPES WHERE RECIPES.name = \"$name1\" AND USED_IN.recipeID = RECIPES.recipeID AND SPIRIT.spiritID = USED_IN.spirit";
    $mysqli2 = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");

    if ($result2 = $mysqli2->query($query2)) {

        echo "<table><caption>Ingredients</caption>";
        echo "<tr><th>Distiller</th><th>Spirit Name</th><th>Amount</th></tr>";
    
        while ($row2 = $result2->fetch_assoc()) {
            $distiller = $row2["distiller"];
            $name2 = $row2["name"];
            $amount = $row2["amount"];
            echo "<tr><td>" . $distiller . "</td><td>" . $name2 . "</td><td>" . $amount . "</td></tr>";        
        }
    
        echo "</table>";

    
    }
    echo "<p><form><button type=\"submit\" formaction=\"index.html\">Go Home</button></form></p>";
    ?>
