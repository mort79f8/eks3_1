<?php

include_once "connect.php";

$id = $_GET['userid'];
$level = $_GET['userlevel'];

// sql to get the products from the db
$sql = "UPDATE `users` SET `user_level`=? WHERE `user_id`=?";
$statement = $conn->prepare($sql);
$statement->execute([$level, $id]);

echo "user updatede";
header("location: ../admin.php");
