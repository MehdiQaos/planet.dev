<?php

class CategoryModel extends Dbh {
    public function getCategories() {
        $sql = 'SELECT *
                FROM Categories
                ;';
        $result = $this->connect()->query($sql);
        return $result->fetchAll();
    }
}