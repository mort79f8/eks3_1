<?php
$title = "Administrations side - FancyClothes.dk";
$meta_desc = "Velkommen til FancyClothes.dk Administrations side";
$active = "admin";
include_once "header.php";
?>

<div class="container">
    <?php
    include_once 'includes/getUsers.php';
    ?>
</div>


<?php
include_once 'footer.php';
?>