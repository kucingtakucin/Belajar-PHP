<?php
require_once 'core/init.php';
require_once 'view/header.php';

$error = null;
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tag = $_POST['tag'];
    if (!empty(trim($judul)) && !empty(trim($isi))) {
        if (add_data($judul, $isi, $tag)) header('Location:index.php');
        else $error = 'Ada masalah saat menambah data!';
    }
}
?>
<main>
    <form action="" method="post">
        <label for="judul">Judul</label><br>
        <input type="text" name="judul" id="judul" placeholder="Masukkan judul" required><br><br>
        <label for="isi">Isi</label><br>
        <textarea type="text" name="isi" id="isi" rows="10" cols="40" placeholder="Masukkan isi" required></textarea><br><br>
        <label for="tag">Tag</label><br>
        <input type="text" name="tag" id="tag" placeholder="Masukkan tag" required><br><br>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <input type="submit" name="submit" id="submit" value="Submit">
    </form>
</main>
<?php
require_once 'view/footer.php';
?>
