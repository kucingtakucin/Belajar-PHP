<?php
namespace App\Produk;
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