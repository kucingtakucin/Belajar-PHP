<?php
class Mahasiswa{
    public $nama, $nim, $jurusan, $angkatan;

    public function __construct($nama, $nim, $jurusan, $angkatan){
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->angkatan = $angkatan;
    }
    public function setNama($nama): void{
        $this->nama = $nama;
    }
    public function setNim($nim): void{
        $this->nim = $nim;
    }
    public function setAngkatan($angkatan): void{
        $this->angkatan = $angkatan;
    }
    public function setJurusan($jurusan): void{
        $this->jurusan = $jurusan;
    }
}