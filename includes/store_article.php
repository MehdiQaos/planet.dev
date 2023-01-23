<?php

require 'database.php';

if (isset($_POST['title']) && isset($_POST['content']))
{
    $articleTitle = $_POST['title'];
    $articleBody = $_POST['content'];
    $sql = 'INSERT INTO articles (title, body)
            VALUES (?, ?)
            ;';

    try {
        $db = new Dbh;
        $pdo = $db->connect();
        $stm = $pdo->prepare($sql);
        $stm->execute([$articleTitle, $articleBody]);
        $msg = 'stored with success';
        $err = null;
    } catch (PDOException $e) {
        $msg = 'failed adding article';
        $err = $e->getMessage();
    }

    echo json_encode([
        'msg' => $msg,
        'err' => $err
    ]);
}