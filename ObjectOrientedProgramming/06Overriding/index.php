<?php
require_once "Mahasiswa.php";
require_once "Mahasiswa_berprestasi.php";

$mahasiswa1 = new Mahasiswa('Adam Arthur Faizal', 'M3119001', 'Teknik Informatika', 2019);
$mahasiswa1->rajin('Tinggi');
$mahasiswa2 = new Mahasiswa_berprestasi('Mbah Putih', 'M3119000', 'Teknik Informatika', 2019);
$mahasiswa2->skill = 'Ngoding Java, C++, Python, Javascript, PHP, Ruby, Go';
$mahasiswa2->prestasi = 'Juara 1 OSN Informatika, Juara 1 Competitive Programming, Juara 1 Catch The Flag, Juara 1 Hackathon';
$mahasiswa2->overpower = 'Seorang Programmer sekaligus Web Developer, Android Developer, dan Cyber Security';
$mahasiswa2->rajin('Tinggi', 'Sangat tinggi');