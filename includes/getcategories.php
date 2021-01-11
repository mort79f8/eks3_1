<?php
include_once "connect.php";

$sql = "SELECT * FROM categories";
$statement = $conn->prepare($sql);
$statement->execute();

$categories = [];

while ($row = $statement->fetch()) {
    $categories += [$row['category_id'] => $row['category_name']];
}
