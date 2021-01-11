<?php
$title = "Opret bruger - FancyClothes.dk";
$meta_desc = "Velkommen til FancyClothes.dk";
include_once "header.php";

$errormsg = "";
if (isset($_POST['username'])) {
    $formuser = $_POST['username'];
    $formpass = $_POST['userpass'];
    $formpassrepeat = $_POST['repeatpass'];

    include_once 'includes/connect.php';
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $statement = $conn->prepare($sql);
    $statement->execute([$formuser]);

    if ($row = $statement->fetch()) {
        $errormsg = "<h2 style='color: red'>Bruger er allerede registeret</h2>";
    } elseif ($formpass !== $formpassrepeat) {
        $errormsg = "<h2 style='color: red'>passwords er ikke det samme</h2>";
    } elseif ($formuser == "") {
        $errormsg = "<h2 style='color: red'>brugernavn er ikke udfyldt</h2>";
    } elseif ($formpass == "") {
        $errormsg = "<h2 style='color: red'>password er ikke udfyldt</h2>";
    } elseif ($formpassrepeat == "") {
        $errormsg = "<h2 style='color: red'>gentag password er ikke udfyldt</h2>";
    } else {
        $sql = "INSERT INTO users(user_name, user_pass) VALUES(?,?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$formuser, password_hash($formpass, PASSWORD_DEFAULT)]);
        $errormsg = "<h2 style='color: green'>bruger oprettet</h2>";
        header("Refresh:2; url=index.php", true, 303);
    }
}

?>
<div class="container">
    <div class="register-error"><?php echo $errormsg ?></div>
    <form action="" method="POST" class="register-user">

        <label for="username">Brugernavn</label>
        <input type="text" name="username" placeholder="Brugernavn" id="username">

        <label for="userpass">Password</label>
        <input type="password" name="userpass" placeholder="Password" id="userpass">

        <label for="repeatpass">Gentag password</label>
        <input type="password" name="repeatpass" placeholder="Gentag password" id="repeatpass">

        <input type="submit">
    </form>
</div>


<?php
include_once "footer.php";
?>