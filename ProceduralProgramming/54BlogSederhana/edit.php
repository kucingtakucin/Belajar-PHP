<?php
require_once 'core/init.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
$error = null;
$judul_awal = null;
$isi_awal = null;
$tag_awal = null;
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $article = view_data_per_id($id);
    while ($hasil = mysqli_fetch_assoc($article)) {
        $judul_awal = $hasil['judul'];
        $isi_awal = $hasil['isi'];
        $tag_awal = $hasil['tag'];
    }
}
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tag = $_POST['tag'];
    if (!empty(trim($judul)) && !empty(trim($isi))) {
        if (edit_data($judul, $isi, $tag, $id)) header('Location:index.php');
        else $error = 'Ada masalah saat mengedit data!';
    }
}
require_once 'view/header.php';
?>
<main>
    <form action="" method="post">
        <label for="judul">Judul</label><br>
        <input type="text" name="judul" id="judul" required value="<?php echo $judul_awal; ?>"><br><br>
        <label for="isi">Isi</label><br>
        <textarea type="text" name="isi" id="isi" rows="10" cols="40" required><?php echo $isi_awal; ?></textarea><br><br>
        <label for="tag">Tag</label><br>
        <input type="text" name="tag" id="tag" required value="<?php echo $tag_awal; ?>"><br><br>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <input type="submit" name="submit" id="submit" value="Submit">
    </form>
</main>
<?php
require_once 'view/footer.php';
?>
