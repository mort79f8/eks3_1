<?php

include_once "connect.php";

$sql = "SELECT `products`.*, `categories`.`category_name`, `users`.`user_name` FROM `products` LEFT JOIN `categories` ON `products`.`product_category` = `categories`.`category_id` LEFT JOIN `users` ON `products`.`product_addedby` = `users`.`user_id`";
$statement = $conn->prepare($sql);
$statement->execute();


while ($row = $statement->fetch()) { ?>

    <?php
    $remainingStars = 5 - (int)$row['product_stars'];
    ?>
    <article>
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
                Oprettet: <?php echo $row['product_added'] ?> af <?php echo $row['user_name'] ?>
            </div>
            <p><?php echo $row['product_desc'] ?>
                <a href="#">Læs mere...</a>
            </p>
            <!-- Mulighed for sletning herunder -->
        </div>
    </article>

<?php } ?>