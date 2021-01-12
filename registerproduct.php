<h3 class="center errorMsg">Opret ny vare:</h3>
<form action="includes/insertArticle.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="fileToUpload">Billede</label>
        <input type="file" id="fileToUpload" name="fileToUpload" placeholder="Vælg billede" required>
    </div>
    <div>
        <label for="imgAlt">Alt tekst</label>
        <input type="text" id="imgAlt" name="imgAlt" placeholder="Billedets alttekst..." required>
    </div>
    <div>
        <label for="heading">Overskrift</label>
        <input type="text" id="heading" name="heading" placeholder="Overskrift..." required>
    </div>
    <div>
        <label for="content">Brødtekst</label>
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Brødtekst..."></textarea>
    </div>
    <div>
        <label for="stars">Antal stjerner</label>
        <select name="stars" id="stars">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div>
        <label for="category">Kategori</label>
        <select name="category" id="category" required>
            <?php
            include_once 'includes/getcategories.php';
            foreach ($categories as $category => $value) { ?>
                <option value=<?php echo $category ?>><?php echo $value ?></option>
            <?php } ?>

        </select>
    </div>
    <div>
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="male">Mand</option>
            <option value="female">Dame</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Opret" name="value">
    </div>
</form>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>