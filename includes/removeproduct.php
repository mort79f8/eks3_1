<link rel="stylesheet" href="../css/styles.css">
<?php
session_start();
include_once "connect.php";

$id = $_GET['id'];
$img = "../" . $_GET['img'];

// unlink is used to delete a file, if we cannot delete the img then we give an error and the product is not deleted.
if (!unlink($img)) {
    echo "<div class='info'>";
    echo "product could not be deleted due to an error";
    echo "</div>";
} else {
    $sql = "DELETE FROM `products` WHERE `product_id` = ?";
    $statement = $conn->prepare($sql);
    // user have to be level 2 or lower to delete a product
    if (isset($_SESSION["userlevel"]) and $_SESSION['userlevel'] <= 2) {
        $statement->execute([$id]);
    }
    echo "<div class='info-update'>";
    echo "Product removed";
    echo "</div>";
    header("Refresh:2; url=../index.php", true, 303);
};
