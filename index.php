<?php
$title = "Forside - FancyClothes.dk";
$meta_desc = "Velkommen til FancyClothes.dk";
$active = "index";
include_once 'header.php';
?>

<div class="createArticle container">

    <?php
    if (isset($_SESSION['username'])) {
        include_once "registerproduct.php";
    } ?>

</div>
</div>
<main class="container">
    <aside>
        <?php
        include_once "categoriessidepanel.php";
        ?>

        <div class="newsletter">
            <div class="newsTop">
                <h4>Tilmeld nyhedsbrev</h4>
            </div>
            <div class="newsMain">
                <form action="">
                    <input type="text" placeholder="Navn">
                    <input type="email" placeholder="Email">
            </div>
            <div class="newsBottom">
                <input type="submit" value="Tilmeld">
                </form>
            </div>
        </div>
    </aside>
    <div class="products">
        <h3>INSPIRATION</h3>
        <hr>
        <div class="inspiration">
            <div class="catMen" data-gender="male">
                <img src="img/kategoriHerre.jpg" alt="">
                <h5>Herretøj</h5>
                <div class="action">Lær mere</div>
            </div>
            <div class="catWomen" data-gender="female">
                <img src="img/kategoriKvinde.jpg" alt="">
                <h5>Kvindetøj</h5>
                <div class="action">Lær mere</div>
            </div>
        </div>
        <div class="frontProducts">
            <?php
            include_once 'includes/getArticles.php';
            ?>
        </div>
    </div>
</main>

<?php
include_once "footer.php";
?>