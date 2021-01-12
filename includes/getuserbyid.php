<?php

include_once "connect.php";

// sql to get the products from the db
$sql = "SELECT * FROM users WHERE user_id=?";
$statement = $conn->prepare($sql);
$statement->execute([$id]);

while ($row = $statement->fetch()) { ?>

    <form action="includes/updateuser.php" method="GET" class="update-user">

        <label for="userid">Bruger id</label>
        <input type="text" name="userid" value="<?php echo $row['user_id'] ?>" readonly id="userid">

        <label for="username">Brugernavn</label>
        <input type="text" name="username" value="<?php echo $row['user_name'] ?>" readonly id="username">

        <label for="userlevel">Bruger niveau</label>
        <input type="text" name="userlevel" value="<?php echo $row['user_level'] ?>" id="userlevel">

        <input type="submit">
        <a href="admin.php">fortryd</a>
    </form>

<?php } ?>