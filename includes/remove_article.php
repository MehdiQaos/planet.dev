<?php

require 'database.php';

if (isset($_POST['remove_article'])) {
    $sql = 'DELETE
            FROM Articles
            WHERE id = ?;';
    $params = [$_POST['id']];
    $r = null;

    try {
        $db = new Dbh;
        $pdo = $db->connect();
        $stm = $pdo->prepare($sql);
        $r = $stm->execute($params);
        $msg = 'deleted with success';
        $err = null;
    } catch (PDOException $e) {
        $msg = 'failed deleting article';
        $err = $e->getMessage();
    }

    echo json_encode([
        'msg' => $msg,
        'err' => $err,
        'r' => $r
    ]);
}