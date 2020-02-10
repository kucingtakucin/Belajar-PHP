<?php

class Mahasiswa{
    public $nama, $nim, $angkatan, $jurusan;

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
    public function getNama(){
        return $this->nama;
    }
    public function getNim(){
        return $this->nim;
    }
    public function getAngkatan(){
        return $this->angkatan;
    }
    public function getJurusan(){
        return $this->jurusan;
    }
}

$mahasiswa1 = new Mahasiswa;
$mahasiswa1->setNama('Adam Arthur Faizal');
$mahasiswa1->setJurusan('Teknik Informatika');
$mahasiswa1->setNim('M3119001');
$mahasiswa1->setAngkatan(2019);
echo 'Nama = ' . $mahasiswa1->getNama() . ', NIM = ' . $mahasiswa1->getNim() . ', Jurusan = ' . $mahasiswa1->getJurusan() . ', Angkatan = ' . $mahasiswa1->getAngkatan();
