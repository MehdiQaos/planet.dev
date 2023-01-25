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

    public function getArticlesInfo() {
        $sql = 'SELECT *
                FROM Articles
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