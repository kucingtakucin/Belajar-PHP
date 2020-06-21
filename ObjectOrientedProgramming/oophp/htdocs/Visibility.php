<?php
class Produk {
    private string $judul;
    private string $penulis;
    private string $penerbit;
    private int $harga;
    private int $diskon;

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
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    /**
     * @param int $diskon
     */
    public function setDiskon(int $diskon): void {
        $this->diskon = $diskon;
    }

    /**
     * @return string
     */
    public function getInfoProduk(): string {
        $str = "{$this->getJudul()} | {$this->getPenulis()}, {$this->getPenerbit()} (Rp.{$this->getHarga()})";
        return $str;
    }
}

class Komik extends Produk {
    private int $jumlahHalaman;

    /**
     * Komik constructor.
     * @param string $judul
     * @param string $penulis
     * @param string $penerbit
     * @param int $harga
     * @param int $jumlahHalaman
     */
    public function __construct(string $judul = 'judul', string $penulis = 'penulis', string $penerbit = 'penerbit', int $harga = 0, int $jumlahHalaman = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jumlahHalaman = $jumlahHalaman;
    }

    /**
     * @return int
     */
    public function getJumlahHalaman(): int {
        return $this->jumlahHalaman;
    }

    /**
     * @return string
     */
    public function getInfoProduk(): string {
        return "Komik : " . parent::getInfoProduk() . " - {$this->getJumlahHalaman()}";
    }
}

class Game extends Produk {
    private int $waktuMain;

    /**
     * Game constructor.
     * @param string $judul
     * @param string $penulis
     * @param string $penerbit
     * @param int $harga
     * @param int $waktuMain
     */
    public function __construct(string $judul = 'judul', string $penulis = 'penulis', string $penerbit = 'penerbit', int $harga = 0, int $waktuMain = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
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
    public function getInfoProduk(): string {
        return "Game : " . parent::getInfoProduk() . " ~ {$this->getWaktuMain()}";
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

$produk1 = new Komik('Naruto','Masashi Kishimoto','Shonen Jump',30000, 100);
var_dump($produk1);
echo '<br><br>';

$produk2 = new Game('Uncharted','Neil Druckmann','Sony Computer',250000, 15);
var_dump($produk2);
echo '<br><br>';

$infoproduk1 = new InfoProduk();
echo $infoproduk1->cetak($produk1);
echo '<br><br>';
$infoproduk2 = new InfoProduk();
echo $infoproduk2->cetak($produk2);
echo '<br><br>';

echo $produk1->getInfoProduk();
echo '<br><br>';
echo $produk2->getInfoProduk();
