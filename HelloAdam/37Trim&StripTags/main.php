<?php require_once('header.php'); ?>
<main>
    <h1>Labkom FMIPA UNS</h1>
    <h2>Trim dan Strip_Tags</h2>
    <?php
    $text = ' Halo perkenalkan nama saya adam ';
    echo 'sebelum' . $text . 'disini<br>';
    echo 'sesudah' . trim($text) . 'disini<br>';

    $text2 = '<script>alert("Hello, World")</script>';
    echo strip_tags($text2, 'h1');
    ?>
</main>
<?php require_once('footer.php') ?>
