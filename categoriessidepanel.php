<div class="categories">
    <div class="catTop">
        <h4>Kategorier:</h4>
    </div>
    <div class="catMain">
        <ul>
            <?php
            include_once "includes/getcategories.php";
            foreach ($categories as $category => $value) { ?>
                <li><a href="#"><?php echo $value ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>