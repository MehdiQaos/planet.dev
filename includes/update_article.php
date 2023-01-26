<?php

include "autoload.inc.php";

if (isset($_GET['get_article_data'])) {
    $id = $_GET['get_article_data'];
    $articleContr = new ArticleContr;
    $data = $articleContr->getArticle($id);
    echo json_encode($data);
}

if (isset($_POST['update_article'])) {
    // echo 'mehdi qaos';
    $articleContr = new ArticleContr;
    $id = $_POST['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author_id = $_POST['author_id'];
    $category_id = $_POST['category_id'];
    $r = $articleContr->updateArticle($id, $title, $body, $category_id, $author_id);
    echo json_encode($r);
}