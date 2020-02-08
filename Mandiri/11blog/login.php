<?php
require_once "core/init.php";

if(isset($_SESSION['user'])){
    header('Location: index.php');
}else{

$error = '';

if(isset($_POST['submit'])){
  $nama  = $_POST['nama'];
  $pass  = $_POST['password'];

  if(!empty(trim($nama)) && !empty(trim($pass))){

    if(cek_data($nama, $pass)){
        $_SESSION['user'] = $nama;
        header('Location: index.php');
    }else{
        $error = 'ada masalah saat login';
    }

  }else{
    $error = 'nama dan password wajib diisi';
  }
}

require_once "view/header.php";

?>

<form action="" method="post">
  <label for="nama">nama</label> <br>
  <input type="text" name="nama" value=""><br><br>

  <label for="password">password</label><br>
  <input type="password" name="password" value=""><br><br>

  <div id="error"><?=$error ?></div> <br>

  <input type="submit" name="submit" value="submit">
</form>

<?php require_once "view/footer.php"; ?>

<?php } ?>
