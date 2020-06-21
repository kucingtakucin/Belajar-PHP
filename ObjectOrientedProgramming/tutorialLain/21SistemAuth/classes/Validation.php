<?php

class Validation{
    private $_pass = false, $_errors = array();

    public function check($items = array()){
        foreach ($items as $item => $values):
            foreach ($values as $key => $value):
                switch ($key):
                    case 'required':
                        if (trim(Input::post($item)) == false && $value == true): $this->addError($item . ' wajib diisi!'); endif;
                        break;
                    case 'min':
                        if (strlen(Input::post($item)) < $value): $this->addError($item . ' minimal ' . $value . ' karakter!'); endif;
                        break;
                    case 'max':
                        if (strlen(Input::post($item)) > $value): $this->addError($item . ' maksimal ' . $value . ' karakter!'); endif;
                        break;
                    case 'match':
                        if (Input::post($item) != Input::post($value)): $this->addError('Password tidak sama!'); endif;
                        break;
                    default:
                        break;
                endswitch;
            endforeach;
        endforeach;
        if (empty($this->_errors)): $this->_pass = true; endif;
        return $this;
    }

    private function addError($message){
        $this->_errors[] = $message;
    }

    public function errors(){
        return $this->_errors;
    }

    public function passed(){
        return $this->_pass;
    }
}