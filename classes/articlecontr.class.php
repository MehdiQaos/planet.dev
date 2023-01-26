<?php

require 'articlemodel.class.php';

class ArticleContr extends ArticleModel {
    public function getArticle($id) {
        if (!$this->checkArticle($id))
            return false;

        return parent::getArticle($id);
    }

    public function addArticles($articles) {
        foreach ($articles as $article) {
            $title = $article['title'];
            $body = $article['body'];
            $category_id = $article['category_id'];
            $author_id = $article['author_id'];
            $this->newArticle($title, $body, $category_id, $author_id);
        }
    }

    public function updateArticle($id, $title, $body, $catId, $authId) {
        if (!$this->checkArticle($id))
            return false;
        
        return $this->setArticle($id, $title, $body, $catId, $authId);
    }

}