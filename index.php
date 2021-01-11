<?php
$title = "Forside - FancyClothes.dk";
$meta_desc = "Velkommen til FancyClothes.dk";
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
            <div class="catMen">
                <img src="img/kategoriHerre.jpg" alt="">
                <h5>Herretøj</h5>
                <div class="action">Lær mere</div>
            </div>
            <div class="catWomen">
                <img src="img/kategoriKvinde.jpg" alt="">
                <h5>Kvindetøj</h5>
                <div class="action">Lær mere</div>
            </div>
        </div>
        <div class="frontProducts">
            <article>
                <img src="img/produkt1.jpg" alt="Lækker læderjakke>">
                <div class="info">
                    <h3>Lækker læderjakke</h3>
                    <div class="stars">
                        <i class='fa fa-star' aria-hidden='true'></i>
                        <i class='fa fa-star' aria-hidden='true'></i>
                        <i class='fa fa-star' aria-hidden='true'></i>
                        <i class='fa fa-star-o' aria-hidden='true'></i>
                        <i class='fa fa-star-o' aria-hidden='true'></i>
                    </div>
                </div>
                <div class="description">
                    <div class="published">
                        Oprettet: Mandag d. 24/6-2019 af Mark
                    </div>
                    <p>Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrenes opmærksomhed. Alle undtagen én. Hun forblev tro mod sig selv - en unik, selvsikker og uforanderlig skønhed - hende, alle fyrene ville ha'. En Odd Molly! - som ikke er et koncept, men autentisk! – et brand, hvis kollektioner er vildt smukke og inderlige, som der altid vil være brug for - dengang, nu, såvel som i fremtiden.
                        <a href="#">Læs mere...</a>
                    </p>
                    <!-- Mulighed for sletning herunder -->
                </div>
            </article>
            <article>
                <img src="img/produkt1.jpg" alt="Lækker læderjakke>">
                <div class="info">
                    <h3>Lækker læderjakke</h3>
                    <div class="stars">
                        <i class='fa fa-star' aria-hidden='true'></i>
                        <i class='fa fa-star' aria-hidden='true'></i>
                        <i class='fa fa-star' aria-hidden='true'></i>
                        <i class='fa fa-star-o' aria-hidden='true'></i>
                        <i class='fa fa-star-o' aria-hidden='true'></i>
                    </div>
                </div>
                <div class="description">
                    <div class="published">
                        Oprettet: Mandag d. 24/6-2019 af Mark
                    </div>
                    <p>Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrenes opmærksomhed. Alle undtagen én. Hun forblev tro mod sig selv - en unik, selvsikker og uforanderlig skønhed - hende, alle fyrene ville ha'. En Odd Molly! - som ikke er et koncept, men autentisk! – et brand, hvis kollektioner er vildt smukke og inderlige, som der altid vil være brug for - dengang, nu, såvel som i fremtiden.
                        <a href="#">Læs mere...</a>
                    </p>
                    <!-- Mulighed for sletning herunder -->
                </div>
            </article>
        </div>
    </div>
</main>

<?php
include_once "footer.php";
?>