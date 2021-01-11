<?php

require_once "connect.php";

$username = $_POST["username"];
$userpass = $_POST["userpass"];
$sql = "SELECT * FROM users WHERE user_name=?";
$statement = $conn->prepare($sql);
$statement->execute([$username]);


if ($row = $statement->fetch()) {
    if (password_verify($userpass, $row['user_pass'])) {
        session_start();
        $_SESSION['username'] = $row['user_name'];
        $_SESSION['userlevel'] = $row['user_level'];
        $_SESSION['userid'] = $row['user_id'];
        header("location: ../index.php");
    }
} else {
    $sql = "SELECT * FROM users WHERE user_name=?";
    $statement = $conn->prepare($sql);
    $statement->execute([$username]);
    if ($row = $statement->fetch()) {
        session_start();
        $_SESSION['pass_error'] = "1";
        header("location: ../index.php");
    } else {
        header("location: ../index.php");
    }
}
