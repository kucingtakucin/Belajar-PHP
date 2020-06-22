<?php
namespace App\Produk;
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