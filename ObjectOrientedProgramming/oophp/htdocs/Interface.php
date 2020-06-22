<?php
interface Info {
    /**
     * @return string
     */
    public function getInfoProduk(): string;

}

abstract class Produk {
    private string $judul;
    private string $penulis;
    private string $penerbit;
    private int $harga;
    private int $diskon = 50;

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
    abstract public function getInfo(): string;
}

class Komik extends Produk implements Info {
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
    public function getInfo(): string {
        $str = "{$this->getJudul()} | {$this->getPenulis()}, {$this->getPenerbit()} (Rp.{$this->getHarga()})";
        return $str;
    }

    /**
     * @return string
     */
    public function getInfoProduk(): string {
        return "Komik : " . $this->getInfo() . " - {$this->getJumlahHalaman()}";
    }
}

class Game extends Produk implements Info{
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
    public function getInfo(): string {
        $str = "{$this->getJudul()} | {$this->getPenulis()}, {$this->getPenerbit()} (Rp.{$this->getHarga()})";
        return $str;
    }

    /**
     * @return string
     */
    public function getInfoProduk(): string {
        return "Game : " . $this->getInfo() . " ~ {$this->getWaktuMain()}";
    }
}

class InfoProduk {
    private array $daftarProduk = [];

    /**
     * @return string
     */
    public function cetak(): string {
        $str = "DAFTAR PRODUK <br>";
        foreach ($this->daftarProduk as $produk):
            $str .= "- {$produk->getInfoProduk()} <br>";
        endforeach;
        return $str;
    }

    /**
     * @param Produk $produk
     */
    public function tambahProduk(Produk ...$produk): void {
        foreach($produk as $item):
            $this->daftarProduk[] = $item;
        endforeach;
    }
}

$produk1 = new Komik('Naruto','Masashi Kishimoto','Shonen Jump',30000, 100);
$produk2 = new Game('Uncharted','Neil Druckmann','Sony Computer',250000, 15);
$cetakProduk = new InfoProduk();
$cetakProduk->tambahProduk($produk1, $produk2);
echo $cetakProduk->cetak();
echo '<hr>';