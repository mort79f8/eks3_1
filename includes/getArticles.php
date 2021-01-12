<?php

include_once "connect.php";

// sql to get the products from the db
$sql = "SELECT `products`.*, `categories`.`category_name`, `users`.`user_name` FROM `products` LEFT JOIN `categories` ON `products`.`product_category` = `categories`.`category_id` LEFT JOIN `users` ON `products`.`product_addedby` = `users`.`user_id`";
$statement = $conn->prepare($sql);
$statement->execute();


while ($row = $statement->fetch()) { ?>

    <?php
    // figure out how many stars the product have and sets the remainingStars, we can change the 5 to how many max stars we want.
    $remainingStars = 5 - (int)$row['product_stars'];
    ?>
    <!-- use data- to set a custom param that we can use in f.eks. javascript. -->
    <article data-category="<?php echo $row['category_name'] ?>" data-gender="<?php echo $row['product_gender'] ?>">
        <img src="img/<?php echo $row['product_img'] ?>" alt="<?php echo $row['product_imgalt'] ?>">
        <div class="info">
            <h3><?php echo $row['product_name'] ?></h3>
            <div class="stars">
                <?php
                // add the full stars
                for ($s = $row['product_stars']; $s > 0; $s--) { ?>
                    <i class='fa fa-star' aria-hidden='true'></i>
                <?php }
                // add empty stars
                for ($rs = $remainingStars; $rs > 0; $rs--) { ?>
                    <i class='fa fa-star-o' aria-hidden='true'></i>
                <?php } ?>
            </div>
        </div>
        <div class="description">
            <div class="published">
                <!-- set local to danish (do not seems to work?) -->
                <?PHP setlocale(LC_TIME, "da-DK"); ?>
                <!-- date(D d-m-Y) is the format, output would be example: Mon 21-08-2021 -->
                Oprettet: <?php echo date("D d-m-Y", strtotime($row['product_added'])) ?> af <?php echo $row['user_name'] ?>
                <!-- Oprettet: <?php echo $row['product_added'] ?> af <?php echo $row['user_name'] ?> -->
            </div>
            <p><?php echo $row['product_desc'] ?>
                <a href="#">Læs mere...</a>
            </p>
            <!-- Mulighed for sletning herunder -->
            <?php if (isset($_SESSION['userlevel']) and $_SESSION['userlevel'] == 1) { ?>
                <div>
                    <a href="includes/removeproduct.php?id=<?php echo $row['product_id'] ?>&img=img/<?php echo $row['product_img'] ?>" class="delete-product-link">fjern product</a>
                </div>
            <?php } elseif (isset($_SESSION['userlevel']) and $_SESSION['userlevel'] == 2 and $row['user_name'] == $_SESSION['username']) { ?>
                <div>
                    <a href="includes/removeproduct.php?id=<?php echo $row['product_id'] ?>&img=img/<?php echo $row['product_img'] ?>" class="delete-product-link">fjern product</a>
                </div>
            <?php } ?>
        </div>
    </article>

<?php } ?>