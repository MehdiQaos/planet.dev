<?php

class LoginContr extends LoginModel {

    private $uid,
            $pwd;
    
    public function __construct($uid, $pwd) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->_error = false;
    }

    public function loginUser() {
        if ($this->emptyInput()) {
            $this->_error = true;
            $this->_errorMsg = 'emptyinput';
            return [];
        }

        $row = $this->getUser($this->uid, $this->pwd);

        return $row;
    }

    private function emptyInput() {
        return
            empty($this->uid) ||
            empty($this->pwd);
    }
}