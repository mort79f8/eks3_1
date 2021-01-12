<div class="categories">
    <div class="catTop">
        <h4>Kategorier:</h4>
    </div>
    <div class="catMain">
        <ul>
            <?php
            include_once "includes/getcategories.php";
            foreach ($categories as $category => $value) { ?>
                <li><a href="#" class="category" data-category="<?php echo $value ?>"><?php echo $value ?></a></li>
            <?php } ?>
            <li><a href="#" class="clearFilters hidden">Reset filters</a></li>
        </ul>
    </div>
</div>