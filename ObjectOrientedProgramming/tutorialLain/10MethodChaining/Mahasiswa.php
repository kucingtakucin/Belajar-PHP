<?php

class Mahasiswa{
    public $nama, $nim, $jurusan, $angkatan, $sifat, $rajin;

    public function __construct($nama, $nim, $jurusan, $angkatan){
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->angkatan = $angkatan;
    }

    public function sifat($sifat){
        $this->sifat = $sifat;
        return $this;
    }

    public function rajin($rajin){
        $this->rajin = $rajin;
        return $this;
    }
}