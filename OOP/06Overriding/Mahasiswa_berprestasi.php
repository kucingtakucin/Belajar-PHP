<?php

class Mahasiswa_berprestasi extends Mahasiswa {
    public $skill, $prestasi, $overpower, $level, $imba;

    public function rajin($level,$imba){
        $this->level = $level;
        $this->imba = $imba;
    }

    public function kemampuan($skill){
        $this->skill = $skill;
    }

    public function juara($prestasi){
        $this->prestasi = $prestasi;
    }

    public function jago($overpower){
        $this->overpower = $overpower;
    }
}