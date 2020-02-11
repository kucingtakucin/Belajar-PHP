<?php

class Lingkaran{
    public $jarijari = 3, $diameter, $luas, $keliling;

    public function Luas($jarijari){
        $this->jarijari = $jarijari;
        $this->luas = 3.14 * $this->jarijari;
        return $this->luas;
    }

    public function Keliling($jarijari){
        $this->jarijari = $jarijari;
        $this->diameter = 2 * $this->jarijari;
        $this->keliling = 2 * 3.14 * $this->diameter;
        return $this->keliling;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return 'Ini adalah object dari class Lingkaran';
    }
}