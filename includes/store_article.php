<?php

require 'database.php';

if (isset($_POST['articles']))
{
    $sql = 'INSERT INTO Articles (title, author_id, category_id, body)
            VALUES ';
    $params = [];
    
    $articles = json_decode($_POST['articles'], true);
    var_dump($articles);

    foreach ($articles as $article) {
        $sql .= "(?, ?, ?, ?),";
        array_push($params, $article['title'], $article['author_id'], $article['category'], $article['body']);
    }
    $sql[-1] = ';';
    $r = null;

    echo '<pre>';
    var_dump($sql);
    echo '</pre>';

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
    echo $msg . '<br>' . $err;
    // header('location: ../index.php');

    // echo json_encode([
    //     'return' => $r,
    //     'msg' => $msg,
    //     'err' => $err
    // ]);
}