<?php

class Mahasiswa{
    public $nama, $nim, $jurusan, $angkatan;

    public function __construct($nama, $nim, $jurusan, $angkatan){
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->angkatan = $angkatan;
    }
}