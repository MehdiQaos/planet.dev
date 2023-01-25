<?php

include "classes/dbh.class.php";

if (isset($_POST['update_article'])) {
    $sql = 'UPDATE Articles
            SET title = ?, body = ?, category_id = ?, author_id = ?, updated_at = NOW()
            WHERE id = ?;';
    $params = [$_POST['title'], $_POST['body'], $_POST['category_id'], $_POST['author_id'], $_POST['id']];
    $r = null;

    try {
        $db = new Dbh;
        $pdo = $db->connect();
        $stm = $pdo->prepare($sql);
        $r = $stm->execute($params);
        $msg = 'updated with success';
        $err = null;
    } catch (PDOException $e) {
        $msg = 'failed updating article';
        $err = $e->getMessage();
    }

    // echo json_encode([
    //     'msg' => $msg,
    //     'err' => $err,
    //     'r' => $r
    // ]);
}

header('location: ../index.php');