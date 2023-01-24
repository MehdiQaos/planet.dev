<?php

require 'database.php';

if (isset($_POST['articles']))
{
    $sql = 'INSERT INTO Articles (title, author_id, category_id, body, created_at)
            VALUES ';
    $params = [];
    
    $articles = json_decode($_POST['articles'], true);

    foreach ($articles as $article) {
        $sql .= "(?, ?, ?, ?, NOW()),";
        array_push($params, $article['title'], $article['author_id'], $article['category'], $article['body']);
    }
    $sql[-1] = ';';
    $r = null;

    try {
        $db = new Dbh;
        $pdo = $db->connect();
        $stm = $pdo->prepare($sql);
        $r = $stm->execute($params);
        $msg = 'stored with success';
        $err = null;
    } catch (PDOException $e) {
        $msg = 'failed adding article';
        $err = $e->getMessage();
    }
    header('location: ../index.php');
}