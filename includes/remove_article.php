<?php

include "autoload.inc.php";

if (isset($_POST['remove_article'])) {
    $articleId = $_POST['id'];
    $articleContr = new ArticleContr();
    $articleContr->deleteArticle($articleId);
}