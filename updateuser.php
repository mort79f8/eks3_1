<?php
$title = "Update User - FancyClothes.dk";
$meta_desc = "Update user page";
$active = "admin";
include_once 'header.php';

$id = $_GET['id'];
?>
<div class="container update-container">
    <?php
    include_once 'includes/getuserbyid.php';
    ?>
</div>

<?php
include_once 'footer.php';
?>