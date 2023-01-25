<?php

class SignupModel extends Dbh {
    protected function setUser($first_name, $last_name, $email, $password, $role_id) {
        $sql = 'INSERT INTO Users (firstname, lastname, email, password, role_id)
                VALUES (:fn, :ln, :em, :pw, :ri)
                ;';

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $params = [
            'fn' => $first_name,
            'ln' => $last_name,
            'em' => $email,
            'ri' => $role_id,
            'pw' => $hashedPwd
        ];
        try {
            $stm = $this->connect()->prepare($sql);
            return $stm->execute($params); //TODO we want to return true or false
        } catch (PDOException $e) {
            echo 'error SignupModel->setuser: ' . $e->getMessage();
            exit();
        }
    }

    protected function checkUser($email) {
        $sql = 'SELECT *
                FROM Users
                WHERE email = :email
                ;';
        $params = [
            'email' => $email
        ];

        try {
            $stm = $this->connect()->prepare($sql);
            $stm->execute($params);
            return $stm->rowCount() > 0;
        } catch (Exception $e) {
            echo 'error SignupModel->checkuser';
            exit();
        }
    }
}