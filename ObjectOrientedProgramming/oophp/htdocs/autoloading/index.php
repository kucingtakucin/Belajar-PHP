<?php
require_once 'App/init.php';

$produk1 = new Komik('Naruto','Masashi Kishimoto','Shonen Jump',30000, 100);
$produk2 = new Game('Uncharted','Neil Druckmann','Sony Computer',250000, 15);
$cetakProduk = new InfoProduk();
$cetakProduk->tambahProduk($produk1, $produk2);
echo $cetakProduk->cetak();
echo '<hr>';