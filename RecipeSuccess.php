<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<link href="myStyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<title>Add New Recipe</title>

</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // $username = $_POST["username"];
    $name = $_POST["name"];
    $glass = $_POST["glass"];
    $method = $_POST["method"];
    $additional_ingredients = $_POST["additional_ingredients"];
    // $current_count = $_POST["current_count"];
}

$mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$query = "INSERT INTO RECIPES (name, glass, method, additional_ingredients) VALUES (\"$name\", \"$glass\", \"$method\", \"$additional_ingredients\")";

if ($mysqli->query($query) == TRUE) {
    echo "<p>New recipe " . $name . " added successfully!</p>";
}
else{
    echo "<p>Sorry, something went wrong</p>";
}

echo "<p><form><button type=\"submit\" formaction=\"AddIngredients.php\">Now lets add some ingredients to it</button></form></p>";
echo "<p><form><button type=\"submit\" formaction=\"index.html\">Go Home</button></form></p>";

 ?>