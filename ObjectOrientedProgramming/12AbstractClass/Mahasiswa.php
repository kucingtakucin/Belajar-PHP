<?php

abstract class Mahasiswa{
    public $nama, $nim, $jurusan, $angkatan;
    abstract public function __construct($nama,$nim,$jurusan,$angkatan);
    abstract public function identitas();
    abstract public function __toString();
}
