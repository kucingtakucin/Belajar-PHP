<?php
class Mahasiswa{
    public $nama = 'Adam Arthur Faizal';
    public $nim = 'M3119001';
    public $angkatan = 2019;
}

$mahasiswa1 = new Mahasiswa;
echo "Mahasiswa ini bernama " . $mahasiswa1->nama . ', nim = ' . $mahasiswa1->nim . ', angkatan = ' . $mahasiswa1->angkatan;
