<?php

require 'includes/database.php';

function showArticles() {
    $db = new Dbh;
    $pdo = $db->connect();
    $sql = 'SELECT *
            FROM articles
            ;';
    $result = $pdo->query($sql);
    foreach ($result->fetchAll() as $article) {
        $title = $article['title'];
        $body = $article['body'];
        echo "
              <div class='row'>
                <h2 style='color: blue'>{$article['title']}</h2>
                <div class='article_body'>
                    {$article['body']}
                </div>
              </div>
              <hr>
              <hr>
              ";
    }
}

?>

<section class="container">
    <div class="row">
        <h1>All Articles</h1>
    </div>
    <?php
        showArticles();
    ?>
</section>