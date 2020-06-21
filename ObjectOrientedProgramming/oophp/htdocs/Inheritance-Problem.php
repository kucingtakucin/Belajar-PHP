<?php
class Produk {
    public string $judul;
    public string $penulis;
    public string $penerbit;
    public int $harga;
    public int $jumlahHalaman;
    public int $waktuMain;
    public string $tipe;

    /**
     * Produk constructor.
     * @param string $judul
     * @param string $penulis
     * @param string $penerbit
     * @param int $harga
     */
    public function __construct(string $judul ='judul', string $penulis = 'penulis', string $penerbit  = 'penerbit', int $harga = 0, int $jumlahHalaman = 0, int $waktuMain = 0, string $tipe = 'tipe'){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jumlahHalaman = $jumlahHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;
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

    /**
     * @return int
     */
    public function getJumlahHalaman(): int {
        return $this->jumlahHalaman;
    }

    /**
     * @return int
     */
    public function getWaktuMain(): int {
        return $this->waktuMain;
    }

    /**
     * @return string
     */
    public function getTipe(): string {
        return $this->tipe;
    }

    /**
     * @return string
     */
    public function getInfoLengkap(): string {
        $str = "{$this->getTipe()} : {$this->getJudul()} | {$this->getPenulis()}, {$this->getPenerbit()} (Rp.{$this->getHarga()})";
        if ($this->tipe === 'Komik'):
            $str .= " - {$this->getJumlahHalaman()} Halaman.";
        elseif ($this->tipe === 'Game'):
            $str .= " ~ {$this->getWaktuMain()} Jam.";
        endif;
        return $str;
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

$produk1 = new Produk('Naruto','Masashi Kishimoto','Shonen Jump',30000, 100, 0, 'Komik');
var_dump($produk1);
echo '<br><br>';

$produk2 = new Produk('Uncharted','Neil Druckmann','Sony Computer',250000, 0, 15, 'Game');
var_dump($produk2);
echo '<br><br>';

$infoproduk1 = new InfoProduk();
echo $infoproduk1->cetak($produk1);
echo '<br><br>';
$infoproduk2 = new InfoProduk();
echo $infoproduk2->cetak($produk2);
echo '<br><br>';

echo $produk1->getInfoLengkap();
echo '<br><br>';
echo $produk2->getInfoLengkap();
