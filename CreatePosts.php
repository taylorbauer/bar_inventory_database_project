<html>
<head>
<link href="myStyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<title>Create Posts</title>

</head>
<body>

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $post = $_POST["post"];
}

$mysqli = new mysqli("mysql.eecs.ku.edu", "t542b398", "cahy7Thu", "t542b398");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$query = "SELECT userid FROM Users WHERE username='$username'";
$result = $mysqli->query($query);
$rs = mysqli_fetch_array($result);

$userid = $rs['userid'];

if ($userid == "") {
    echo "Sorry, that user doesn't seem to exist.";
}
else if ($post == "") {
    echo "Sorry, you cannot submit an empty post.";
}
else{
    $query = "INSERT INTO Posts (author_id, content) VALUES (\"$userid\", \"$post\")";
    if ($mysqli->query($query) == TRUE) {
        echo "<p>New post by user " . $username . " created successfully!</p>";
    }
}

echo "<form><button type=\"submit\" formaction=\"CreatePosts.html\">Back to post creation</button></form>";

?>