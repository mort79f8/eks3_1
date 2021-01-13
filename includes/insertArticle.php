<link rel="stylesheet" href="../css/styles.css">
<?php
session_start();
global $_FILES;

$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

        $productimgpath = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
        $productimgalt = $_POST['imgAlt'];
        $productname = $_POST['heading'];
        $productdesc = $_POST['content'];
        $productstars = (int)$_POST['stars'];
        $productcategory = (int)$_POST['category'];
        $productgender = $_POST['gender'];
        $productaddedby = (int)$_SESSION['userid'];

        require_once 'connect.php';

        $statement = $conn->prepare("INSERT INTO `products`( `product_name`, `product_img`, `product_imgalt`, `product_desc`, `product_addedby`, `product_stars`, `product_category`, `product_gender`) VALUES (?,?,?,?,?,?,?,?)");
        $statement->bindParam(1, $productname);
        $statement->bindParam(2, $productimgpath);
        $statement->bindParam(3, $productimgalt);
        $statement->bindParam(4, $productdesc);
        $statement->bindParam(5, $productaddedby);
        $statement->bindParam(6, $productstars);
        $statement->bindParam(7, $productcategory);
        $statement->bindParam(8, $productgender);
        $statement->execute();
        echo "<div class='info-update'>";
        echo "<br>Produkt tilføjet";
        echo "</div>";
        header("Refresh:3; url=../index.php", true, 303);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

/* *************************************************
    file upload script end
*************************************************** */
