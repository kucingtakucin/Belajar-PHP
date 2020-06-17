<?php require_once('header.php');?>
<main>
    <?php
    $data = array('Adam', 'Arthur', 'M3119001', 2019, 17);
    echo implode(' | ', $data);
    echo '<br>';
    $data2 = 'Mbah Putih Mulyosugito';
    print_r(explode(' ', $data2));
    ?>
</main>
<?php require_once('footer.php');?>