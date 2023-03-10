<?php

require 'dbh.class.php';

class ArticleModel extends Dbh {
    public function getArticle($id) {
        $sql = 'SELECT *
                FROM Articles
                WHERE id = ?
                ;';
        $params = [$id];
        try {
            $stm = $this->connect()->prepare($sql);
            $stm->execute($params);
            return $stm->fetch();
        } catch (PDOException $e) {
            echo 'error articleModel->checkarticle';
            return false;
        }
    }

    public function searchWord($word) {
        $params = [$word];
        $sql = "SELECT title, firstname, lastname, CONCAT(firstname, ' ', lastname) as fullname, Categories.name as categoryname, Articles.id as id
                FROM Articles
                JOIN Users ON Users.id = Articles.author_id
                JOIN Categories ON Articles.category_id = Categories.id
                WHERE title LIKE '%$word%';";
        try {
            $result = $this->connect()->query($sql);
            return $result->fetchAll();
        } catch (PDOException $e) {
            echo 'error articleModel->checkarticle';
            return [];
        }
    }

    public function deleteArticle($id) {
        $sql = 'DELETE
                FROM Articles
                WHERE id = ?;';
        $params = [$id];
        $stm = $this->connect()->prepare($sql);
        return $stm->execute($params);
    }

    public function getArticlesInfo() {
        $sql = 'SELECT title, firstname, lastname, CONCAT(firstname, " ", lastname) as fullname, Categories.name as categoryname, Articles.id as id
                FROM Articles
                JOIN Users ON Users.id = Articles.author_id
                JOIN Categories ON Articles.category_id = Categories.id
            ;';
        try {
            $result = $this->connect()->query($sql);
            return $result->fetchAll();
        } catch (PDOException $e) {
            echo 'error articleModel->checkarticle';
            return false;
        }
    }

    protected function newArticle($title, $body, $catId, $authId) {
        $sql = 'INSERT INTO Articles (title, author_id, category_id, body, created_at)
                VALUES (?, ?, ?, ?, NOW())';
        $params = [$title, $body, $catId, $authId];
        $r = null;

        try {
            $pdo = $this->connect();
            $stm = $pdo->prepare($sql);
            $r = $stm->execute($params);
            $msg = 'stored with success';
            $err = null;
        } catch (PDOException $e) {
            $msg = 'failed adding article';
            $err = $e->getMessage();
            return false;
        }
        return true;
    }
    protected function setArticle($id, $title, $body, $catId, $authId) {
        $sql = 'UPDATE Articles
                SET title = ?, body = ?, category_id = ?, author_id = ?, updated_at = NOW()
                WHERE id = ?;';
        $params = [$title, $body, $catId, $authId, $id];
        $r = null;

        try {
            $pdo = $this->connect();
            $stm = $pdo->prepare($sql);
            $r = $stm->execute($params);
            $msg = 'updated with success';
            $err = null;
            return $r;
        } catch (PDOException $e) {
            $msg = 'failed updating article';
            $err = $e->getMessage();
            return false;
        }
    }

    protected function checkArticle($id) {
        $sql = 'SELECT *
                FROM Articles
                WHERE id = ?
                ;';
        $params = [$id];

        try {
            $stm = $this->connect()->prepare($sql);
            $stm->execute($params);
            return $stm->rowCount() > 0;
        } catch (PDOException $e) {
            echo 'error articleModel->checkarticle';
            return false;
        }
    }
}