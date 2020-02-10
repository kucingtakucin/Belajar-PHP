<?php

class Mahasiswa{
    protected $nama, $nim, $jurusan, $angkatan, $level;

    public function __construct($nama, $nim, $jurusan, $angkatan){
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->angkatan = $angkatan;
    }

    public function rajin($level){
        $this->level = $level;
    }
}