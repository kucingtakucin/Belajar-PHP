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

    /**
     * @return string
     */
    public function getPenerbit(): string {
        return $this->penerbit;
    }

    /**
     * @return int
     */
    public function getHarga(): int {
        return $this->harga;
    }

}

class InfoProduk {

    /**
     * @param Produk $produk
     * @return string
     */
    public function cetak(Produk $produk): string {
        return "{$produk->getJudul()} | {$produk->getPenulis()}, {$produk->getPenerbit()} (Rp.{$produk->getHarga()})";
    }
}

$produk1 = new Produk('Naruto','Masashi Kishimoto','Shonen Jump',30000);
var_dump($produk1);
echo '<br><br>';

$produk2 = new Produk('Uncharted','Neil Druckmann','Sony Computer',250000);
var_dump($produk2);
echo '<br><br>';

$infoproduk1 = new InfoProduk();
echo $infoproduk1->cetak($produk1);
echo '<br><br>';
$infoproduk2 = new InfoProduk();
echo $infoproduk2->cetak($produk2);
