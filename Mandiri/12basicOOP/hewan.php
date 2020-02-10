<?php

require_once 'robot.php';

//inheritance || pewarisan
class robot_hewan extends robot{

  public function get_kekuatan(){
    echo ' saya hewan laut bisa berenang... ';
  }

  //overriding
  public function get_suara(){
    return 'suaranya adalah... ' . $this->suara;
  }

  public function testing(){
    //self dan parent
    return parent::get_suara();
  }

}

?>
