<?php

class UserModel extends Dbh {
    public function getUsersOfRole($role_id) {
        $sql = "SELECT U.id as id, CONCAT(firstname, ' ', lastname) as fullname
                FROM Users as U
                JOIN Roles as R ON U.role_id = $role_id
                WHERE R.name LIKE 'writer'
                ;";
        $pdo = $this->connect();
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }
}
