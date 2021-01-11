<?php

$servername = "localhost";
$dbname = "fancyclothes";
$username = "root";
$password = "";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname; charset=utf8", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // test echo to see if we succeded connecting.
    // echo "Succes connected to the database!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
