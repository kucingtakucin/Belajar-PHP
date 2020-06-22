<?php
require_once 'App/init.php';

use App\Produk\{Komik, Game, InfoProduk, User as UserProduk};
use App\Service\User as UserService;


$produk1 = new Komik('Naruto','Masashi Kishimoto','Shonen Jump',30000, 100);
$produk2 = new Game('Uncharted','Neil Druckmann','Sony Computer',250000, 15);
$cetakProduk = new InfoProduk();
$cetakProduk->tambahProduk($produk1, $produk2);
echo $cetakProduk->cetak();
echo '<hr>';
new UserProduk();
echo '<br>';
echo '<hr>';
new UserService();