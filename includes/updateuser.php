<link rel="stylesheet" href="../css/styles.css">
<?php

include_once "connect.php";

$id = $_GET['userid'];
$level = $_GET['userlevel'];

// sql to get the products from the db
$sql = "UPDATE `users` SET `user_level`=? WHERE `user_id`=?";
$statement = $conn->prepare($sql);
$statement->execute([$level, $id]);

echo "<div class='info-update'>";
echo "user updated";
echo "</div>";
header("Refresh:2; url=../admin.php", true, 303);
// header("location: ../admin.php");
