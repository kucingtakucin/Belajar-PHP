<?php

class Mahasiswa{
    static $nama, $nim, $jurusan, $angkatan;

    public static function Orang(){
        self::Identitas('Adam Arthur Faizal', 'M3119001', 'Teknik Informatika', 2019);
    }
    public static function Identitas($nama, $nim, $jurusan, $angkatan){
        self::$nama = $nama;
        self::$nim = $nim;
        self::$jurusan = $jurusan;
        self::$angkatan = $angkatan;
        echo 'Nama = ' . self::$nama . ', NIM = ' . self::$nim . ', Jurusan = ' . self::$jurusan . ', Angkatan = ' . self::$angkatan;
    }
}