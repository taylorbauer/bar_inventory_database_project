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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST["user"];
}

$query = "SELECT userid FROM Users WHERE username='$user'";
$result = $mysqli->query($query);
$rs = mysqli_fetch_array($result);
$userid = $rs['userid'];

$query = "SELECT post_id, content FROM Posts WHERE author_id='$userid'";

if ($result = $mysqli->query($query)) {

    echo "<table><caption>Posts by user " . $user . "</caption>";
    echo "<tr><th>Post ID</th><th>Content</th></tr>";
 
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $post_id = $row["post_id"];
        $content = $row["content"];

        echo "<tr><td>" . $post_id . "</td><td>" . $content . "</td></tr>";        
    }

    echo "</table>";

    echo "<br><form><button type=\"submit\" formaction=\"AdminHome.html\">Back to Admin Home</button></form>";
 
    /* free result set */
    $result->free();
}

?>

</body>