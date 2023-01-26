<?php

include "autoload.inc.php";

if (isset($_GET['articles_search'])) {
    $word = $_GET['word'];
    $articleContr = new ArticleContr;
    $rows = $articleContr->searchWord($word);
    echo json_encode($rows);
}