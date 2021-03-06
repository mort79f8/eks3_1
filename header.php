<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <meta name="description" content=<?php echo $meta_desc ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Oswald" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slider.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/t2l9q829856mxvexmdqhz95prmv4f4by281bbei6336amu67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <div class="top container">
        <div class="language">
            <div class="flag">
                <img src="img/ikon.png" alt="Dansk ikon">
                <span>Dansk</span>
            </div>
            <span>DKK</span>
        </div>
        <div class="search">
            <input type="text" placeholder="Indtast søgning"><input type="submit" value="Søg">
        </div>
    </div>
    <hr>
    <div class="container home">
        <a href="index.php"><img src="img/homeIcon.png" alt="Forside ikon"></a>
        <!-- Velkomstbesked -->
        <?php if (isset($_SESSION['username'])) {
        ?>
            <h2>Hej <?php echo $_SESSION['username'] ?></h2>
        <?php } ?>
    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <!-- check for the active variable and set the class. -->
                <li class=<?php if ($active == "index") {
                                echo "active";
                            } ?>><a href="index.php">Forside</a></li>
                <li class=<?php if ($active == "products") {
                                echo "active";
                            } ?>><a href="#">Produkter</a></li>
                <li class=<?php if ($active == "news") {
                                echo "active";
                            } ?>><a href="#">Nyheder</a></li>
                <li class=<?php if ($active == "terms") {
                                echo "active";
                            } ?>><a href="#">Handelsbetingelser</a></li>
                <li class=<?php if ($active == "about") {
                                echo "active";
                            } ?>><a href="#">Om os</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                ?>
                    <li><a href='includes/logout.php'>Log ud</a></li>
                <?php } else { ?>
                    <li><a href='#' class='loginBtn'>Log ind</a></li>
                <?php } ?>
                <?php if (!isset($_SESSION['username'])) { ?>
                    <li class=<?php if ($active == "register") {
                                    echo "active";
                                } ?>><a href='register.php' class='loginBtn'>Opret bruger</a></li>
                <?php } ?>
                <?php if (isset($_SESSION['username']) && $_SESSION['userlevel'] == 1) { ?>
                    <li class=<?php if ($active == "admin") {
                                    echo "active";
                                } ?>><a href='admin.php' class='loginBtn'>Administration</a></li>
                <?php } ?>


            </ul>
        </nav>
        <div class="basket">
            <div class="basketContent">
                <p>Din indkøbskurv er tom</p>
            </div>
            <div class="shopIcon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="login container">
        <form action="includes/login.php" method="post">
            <label for="formUsername">Bruger:</label>
            <input type="text" id="formUsername" name="username" placeholder="Brugernavn" required>
            <label for="formPassword">Password:</label>
            <input type="password" id="formPassword" name="userpass" placeholder="Password" required>
            <input type="submit" value="Log ind">
        </form>
        <a id="newUser" href="register.php">Ny bruger?</a>
    </div>
    <hr>
    <div class="container">
        <ul class="slider" id="slider">
            <li><img src="img/slide1.jpg" alt=""></li>
            <li><img src="img/slide2.jpg" alt=""></li>
            <li><img src="img/slide3.jpg" alt=""></li>
        </ul>
    </div>
    <hr class="hide400">
    <h1 class="tagline">FancyClothes.DK - tøj, kvalitet, simpelt!</h1>
    <hr>