<?php require_once('header.php'); ?>
<main>
    <h1>Labkom FMIPA UNS</h1>
    <h2>Metode Post dan Get</h2>
    <form action="main.php" method="get">
        <label for="Username">Username</label>
        <input type="text" name="Username" id="Username">
        <label for="Password">Password</label>
        <input type="password" name="Password" id="Password">
        <input type="submit" name="Submit">
    </form>
    <br>
    <form action="main.php" method="post">
        <label for="Username">Username</label>
        <input type="text" name="Username" id="Username">
        <label for="Password">Password</label>
        <input type="password" name="Password" id="Password">
        <input type="submit" name="Submit">
    </form>
    <?php
    if (isset($_GET['Submit'])) {
        echo $_GET['Username'];
        echo $_GET['Password'];
    }
    ?>
    <?php
    if (isset($_POST['Submit'])) {
        echo $_POST['Username'];
        echo $_POST['Password'];
    }
    ?>
</main>
<?php require_once('footer.php'); ?>