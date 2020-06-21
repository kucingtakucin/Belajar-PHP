<?php
class Produk {
    public string $judul = 'judul';
    public string $penulis = 'penulis';
    public string $penerbit = 'penerbit';
    public int $harga = 0;

    /**
     * @return string
     */
    public function hello(): string {
        return 'Hello, World';
    }

    /**
     * @return string
     */
    public function getJudul(): string {
        return $this->judul;
    }

    /**
     * @return string
     */
    public function getPenulis(): string {
        return $this->penulis;
    }
}

$produk1 = new Produk();
$produk1->judul = 'Naruto';
$produk1->penulis = 'Masashi Kishimoto';
$produk1->penerbit = 'Shonen Jump';
$produk1->harga = 30000;
var_dump($produk1);
echo $produk1->hello();
echo '<br><br>';

$produk2 = new Produk();
$produk2->judul = 'Uncharted';
$produk2->penulis = 'Neil Druckmann';
$produk2->penerbit = 'Sony Computer';
$produk2->harga = 250000;
var_dump($produk2);
echo $produk2->hello();
echo '<br><br>';

