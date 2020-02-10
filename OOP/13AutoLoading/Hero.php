<?php

class Hero{
    public $nama, $nim, $jurusan, $angkatan;

    public function __construct($nama, $nim, $jurusan, $angkatan){
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->angkatan = $angkatan;
    }

    public function identitas(){
        echo 'Nama : ' . $this->nama . '<br>';
        echo 'NIM : ' . $this->nim . '<br>';
        echo 'Jurusan : ' . $this->jurusan . '<br>';
        echo 'Angkatan : ' . $this->angkatan . '<br>';
    }
}