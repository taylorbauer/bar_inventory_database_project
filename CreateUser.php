<html>
<head>
<link href="myStyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<title>Create User</title>

</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
}

$mysqli = new mysqli("mysql.eecs.ku.edu", "t542b398", "cahy7Thu", "t542b398");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$query = "INSERT INTO Users (username) VALUES (\"$username\")";

if ($mysqli->query($query) == TRUE) {
    echo "<p>New user " . $username . " created successfully!</p>";
}
else{
    echo "<p>Sorry, your username must be non-empty and not already exist</p>";
}

echo "<form><button type=\"submit\" formaction=\"CreateUser.html\">Back to user creation</button></form>";

 ?>