<?php
namespace App\Produk;
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
