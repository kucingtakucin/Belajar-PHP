<?php
class Produk {
    public string $judul;
    public string $penulis;
    public string $penerbit;
    public int $harga;

    /**
     * Produk constructor.
     * @param string $judul
     * @param string $penulis
     * @param string $penerbit
     * @param int $harga
     */
    public function __construct(string $judul ='judul', string $penulis = 'penulis', string $penerbit  = 'penerbit', int $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
}

$produk1 = new Produk('Naruto','Masashi Kishimoto','Shonen Jump',30000);
var_dump($produk1);
echo '<br><br>';

$produk2 = new Produk('Uncharted','Neil Druckmann','Sony Computer',250000);
var_dump($produk2);
echo '<br><br>';

