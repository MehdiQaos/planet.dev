<?php

class Dbh {
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $dbName = 'planetdevDB';

    public function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->dbName";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        try {
            return new PDO($dsn, $this->user, $this->pwd, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
