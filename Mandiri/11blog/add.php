<?php
require_once "core/init.php";

if(!$_SESSION['user']){
    header('Location: login.php');
}

require_once "view/header.php";

$error = '';

if(isset($_POST['submit'])){
  $judul  = $_POST['judul'];
  $konten = $_POST['konten'];
  $tag    = $_POST['tag'];

  if(!empty(trim($judul)) && !empty(trim($konten))){

    if(tambah_data($judul, $konten, $tag)){
        header('Location: index.php');
    }else{
        $error = 'ada masalah saat menambah data';
    }

  }else{
    $error = 'judul dan konten wajib diisi';
  }
}

?>

<form action="" method="post">
  <label for="judul">Judul</label> <br>
  <input type="text" name="judul" value=""><br><br>

  <label for="konten">Isi</label><br>
  <textarea name="konten" rows="8" cols="40"></textarea><br><br>

  <label for="tag">Tag</label><br>
  <input type="text" name="tag" value=""><br><br>

  <div id="error"><?=$error ?></div> <br>

  <input type="submit" name="submit" value="submit">
</form>

<?php require_once "view/footer.php"; ?>
