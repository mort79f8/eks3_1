<?php

include_once "connect.php";

// sql to get the products from the db
$sql = "SELECT * FROM users";
$statement = $conn->prepare($sql);
$statement->execute();
?>

<table class="admin">
    <tr>
        <th>Bruger id</th>
        <th>Brugernavn</th>
        <th>Bruger niveau</th>
        <th>Update</th>
    </tr>
    <?php
    while ($row = $statement->fetch()) { ?>
        <tr>
            <td><?php echo $row['user_id'] ?></td>
            <td><?php echo $row['user_name'] ?></td>
            <td><?php echo $row['user_level'] ?></td>
            <td><a href="updateuser.php?id=<?php echo $row['user_id'] ?>">update</a></td>
        </tr>
    <?php } ?>
</table>