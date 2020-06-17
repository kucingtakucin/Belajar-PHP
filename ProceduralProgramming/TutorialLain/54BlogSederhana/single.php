<?php
require_once 'core/init.php';
require_once 'view/header.php';

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
?>
<main>
    <section id="judul">
        <h2><?php echo $judul_awal; ?></h2>
    </section>
    <section id="isi">
        <p><?php echo $isi_awal; ?></p>
    </section>
    <section id="tag">
        <p><?php echo $tag_awal; ?></p>
    </section>
</main>
<?php
require_once 'view/footer.php';
?>
