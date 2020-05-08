<html>
<head>
<link href="myStyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<title>Recipe Updated</title>

</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // $username = $_POST["username"];
    $recipeID = $_POST["key"];
    $spiritID = $_POST["key2"];
    $quantity = $_POST["quantity"];
}

$mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$query = "INSERT INTO USED_IN (spirit, amount, recipeID) VALUES (\"$spiritID\", \"$quantity\", \"$recipeID\")";

if ($mysqli->query($query) == TRUE) {
    echo "<p>Recipe updated successfully!</p>";
}
else{
    echo "<p>Sorry, something went wrong</p>";
}

echo "<p><form><button type=\"submit\" formaction=\"AddIngredients.php\">Add another ingredient</button></form></p>";
echo "<p><form><button type=\"submit\" formaction=\"index.html\">Go Home</button></form></p>";

 ?>