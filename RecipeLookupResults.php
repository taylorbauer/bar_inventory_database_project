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
    $name = $_REQUEST['key'];
    $query = "SELECT name, glass, method, additional_ingredients FROM RECIPES WHERE name = \"$name\"";
    if ($result = $mysqli->query($query)) {

    echo "<table><caption>List of spirits</caption>";
    echo "<tr><th>Recipe Name</th><th>Glass</th><th>Method</th><th>Additional Ingredients</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $glass = $row["glass"];
        $method = $row["method"];
        $additional_ingredients = $row["additional_ingredients"];
        echo "<tr><td>" . $name . "</td><td>" . $glass . "</td><td>" . $method . "</td><td>" . $additional_ingredients . "</td></tr>";        
    }

    echo "</table>";
    echo "<p><form><button type=\"submit\" formaction=\"index.html\">Go Home</button></form></p>";
}
    ?>

