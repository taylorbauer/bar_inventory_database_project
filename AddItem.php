<html>
<head>
<link href="myStyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<title>Add Inventory Item</title>

</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // $username = $_POST["username"];
    $distiller = $_POST["distiller"];
    $name = $_POST["name"];
    $price_per_bottle = $_POST["price_per_bottle"];
    $most_recent_purchase = $_POST["most_recent_purchase"];
    $shelf  = $_POST["shelf"];
    // $current_count = $_POST["current_count"];
}

$mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$query = "INSERT INTO SPIRIT (distiller, name, price_per_bottle, most_recent_purchase, shelf) VALUES (\"$distiller\", \"$name\", \"$price_per_bottle\", \"$most_recent_purchase\", \"$shelf\")";

if ($mysqli->query($query) == TRUE) {
    echo "<p>New spirit " . $distiller . " " . $name . " added successfully!</p>";
}
else{
    echo "<p>Sorry, something went wrong</p>";
}

echo "<p><form><button type=\"submit\" formaction=\"AddItem.html\">Add another spirit</button></form></p>";
echo "<p><form><button type=\"submit\" formaction=\"index.html\">Go Home</button></form></p>";

 ?>