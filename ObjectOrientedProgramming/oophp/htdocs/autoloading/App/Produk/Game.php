<?php
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