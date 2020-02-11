<?php

class MahasiswaMantab extends Mahasiswa{
    public function __construct($nama, $nim, $jurusan, $angkatan){
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->angkatan = $angkatan;
    }

    /**
     */
    public function identitas()
    {
        // TODO: Implement identitas() method.
        echo "Mahasiswa ini bernama " . $this->nama;
    }

    public function __toString(){
        // TODO: Implement __toString() method.
        return 'Ini adalah objek dari class abstrak Mahasiswa';
    }
}