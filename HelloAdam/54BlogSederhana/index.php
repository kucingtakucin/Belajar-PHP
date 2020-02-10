<?php
require_once 'core/init.php';
$articles = read_data();
global $link;
$per_halaman = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$start = ($halaman > 1) ? ($halaman * $per_halaman) - $per_halaman : 0;
$konten = "select * from blog limit $start,$per_halaman";
$hasil2 = mysqli_query($link, $konten);
$hasil = mysqli_query($link, "select * from blog");
$total = mysqli_num_rows($hasil);
$pages = ceil($total / $per_halaman);
require_once "view/header.php";
?>
<section id="search">
    <form method="get">
        <input type="search" name="search" placeholder="Cari sesuatu">
    </form>
</section>
<?php if (isset($_GET['search'])) $articles = search_data($_GET['search']); ?>
    <?php while ($elemen = mysqli_fetch_assoc($articles)): ?>
        <?php while ($elemen = mysqli_fetch_assoc($hasil2)): ?>
        <main>
            <section id="judul">
                <h3><a href="single.php?id=<?php echo $elemen['id']; ?>"><?php echo $elemen['judul']; ?></a></h3>
            </section>
            <section id="isi">
                <p><?php echo excerpt($elemen['isi']); ?></p>
            </section>
            <p id="waktu"><?php echo $elemen['waktu'] ?></p>
            <p id="tag">Tag: <?php echo $elemen['tag']; ?></p>
            <?php if (isset($_SESSION['user'])): ?>
                <?php if(cek_status($_SESSION['user'])): ?>
                    <button><a href="delete.php?id=<?php echo $elemen['id']; ?>">Delete</a></button>
                <?php endif; ?>
                <button><a href="edit.php?id=<?php echo $elemen['id']; ?>">Edit</a></button>
            <?php endif; ?>
        </main>
        <?php endwhile; ?>
    <?php endwhile; ?>
    <div class="pagination">
        <?php for ($i = 1;$i <= $pages;$i++) : ?>
            <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
<?php require_once "view/footer.php"; ?>