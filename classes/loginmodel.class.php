<?php

class LoginModel extends Dbh {
    public $_error,
           $_errorMsg;

    protected function getUser($uid, $pwd) {
        $sql = 'SELECT *
                FROM Users
                WHERE email LIKE :email
                ;';

        $params = [
            'email' => $uid,
        ];

        try {
            $stm = $this->connect()->prepare($sql);
            $stm->execute($params);
        } catch (PDOException $e) {
            $this->_error = true;
            $this->_errorMsg = 'errordatabase';
            return [];
        }

        if ($stm->rowCount() == 0) {
            $this->_error = true;
            $this->_errorMsg = 'usernotfound';
            return [];
        }

        $row = $stm->fetch();

        if (!password_verify($pwd, $row['password'])) {
            $this->_error = true;
            $this->_errorMsg = 'errorpassword';
            return [];
        }

        return $row;
    }
}