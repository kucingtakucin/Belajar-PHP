<?php
require_once 'Mahasiswa.php';

$mahasiswa1 = new Mahasiswa('Adam Arthur Faizal', 'M3119001', 'Teknik Informatika', 2019);
echo 'Nama = ' . $mahasiswa1->nama . ', NIM = ' . $mahasiswa1->nim . ', Jurusan = ' . $mahasiswa1->jurusan . ', Angkatan = ' . $mahasiswa1->angkatan;

