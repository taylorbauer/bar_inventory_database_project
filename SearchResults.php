<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<head>
    <link href="myStyle.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <title>Inventory Search</title>

</head>

<body>
    <h3>Inventory Search</h3>

<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "taylorbauer", "uuth3waN", "taylorbauer");
    $name = $_REQUEST['key'];
    $query = "SELECT  * FROM SPIRIT WHERE name LIKE '%" . $name .  "%' ";
    if ($result = $mysqli->query($query)) {

    echo "<table><caption>List of spirits</caption>";
    echo "<tr><th>Distiller</th><th>Spirit</th><th>Price Per Bottle</th><th>Most Recent Purchase</th><th>Shelf</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $distiller = $row["distiller"];
        $name = $row["name"];
        $price_per_bottle = $row["price_per_bottle"];
        $most_recent_purchase = $row["most_recent_purchase"];
        $shelf = $row["shelf"];

        echo "<tr><td>" . $distiller . "</td><td>" . $name . "</td><td>" . $price_per_bottle . "</td><td>" . $most_recent_purchase . "</td><td>" . $shelf . "</td></tr>";        
    }

    echo "</table>";

}
    ?>

