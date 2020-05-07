<html>
<head>
<link href="myStyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<title>View Users</title>

</head>
<body>

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "t542b398", "cahy7Thu", "t542b398");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$query = "SELECT * FROM Users";
 
if ($result = $mysqli->query($query)) {

    echo "<table><caption>List of users</caption>";
    echo "<tr><th>User ID no.</th><th>username</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $userid = $row["userid"];
        $username = $row["username"];

        echo "<tr><td>" . $userid . "</td><td>" . $username . "</td></tr>";        
    }

    echo "</table>";
    echo "<br><form><button type=\"submit\" formaction=\"AdminHome.html\">Back to Admin Home</button></form>";
 
    $result->free();
}


?>