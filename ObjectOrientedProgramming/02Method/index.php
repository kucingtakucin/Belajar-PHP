<?php

class Mahasiswa{
    public $nama = 'Adam Arthur Faizal';
    public $nim = 'M3119001';
    public $angkatan = 2019;
    public $jurusan = 'Teknik Informatika';

    public function identitas(){
        echo "Mahasiswa ini bernama " . $this->nama;
        echo "NIM = " . $this->nim;
        echo "Angkatan = " . $this->angkatan;
        echo "Jurusan = " . $this->jurusan;
    }
}

$mahasiswa1 = new Mahasiswa;
$mahasiswa1->identitas();