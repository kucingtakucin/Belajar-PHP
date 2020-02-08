<?php
$login = false;
if($_SESSION['user']){
  $login = true;
}
?>

<head>
  <title>SekolahKoding</title>
  <link rel="stylesheet" href="view/style.css">
</head>

<h1>Blog SekolahKoding</h1>
<div id="menu">
  <a href="index.php">Home</a>
  <a href="add.php">Tambah</a>
  
  <?php if($login == true): ?>
    <a href="logout.php">Logout</a>
  <?php else: ?>
    <a href="login.php">Login</a>
  <?php endif; ?>
</div>
