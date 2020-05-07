<html>
<head>
<link href="myStyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<title>Delete Posts</title>

</head>
<body>


<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "t542b398", "cahy7Thu", "t542b398");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$delete = FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $ids = "";

    for ($post_id = 1; $post_id < 1000; $post_id ++) {   // This is hacky, I know! Sorry!
        if (isset($_POST[$post_id])){
            $delete = TRUE;
            $query = "DELETE FROM Posts WHERE post_id='$post_id'";
            $mysqli->query($query);
            if ($ids != "") {
                $ids = $ids . ", ";
            }
            $ids = $ids . $post_id;
        }
    }
}

if ($delete) {
    echo "Post number(s) " . $ids . " deleted successfully!";
}
else {
    echo "You didn't select any posts!";
}

echo "<br><form><button type=\"submit\" formaction=\"AdminHome.html\">Back to Admin Home</button></form>";

?>

</body>
</html>