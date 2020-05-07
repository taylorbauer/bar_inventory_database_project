<html>
<head>
<link href="myStyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<title>Count Updated</title>

</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // $username = $_POST["username"];
    $spiritID = $_POST["key"];
    $count = $_POST["count"];
}

$mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$query = "UPDATE CURRENT_INVENTORY SET current_count = \"$count\" WHERE spiritID = \"$spiritID\"";

if ($mysqli->query($query) == TRUE) {
    echo "<p>Count updated successfully!</p>";
}
else{
    echo "<p>Sorry, something went wrong</p>";
}

echo "<p><form><button type=\"submit\" formaction=\"Count.php\">Keep counting</button></form></p>";
echo "<p><form><button type=\"submit\" formaction=\"index.html\">Go Home</button></form></p>";

 ?>