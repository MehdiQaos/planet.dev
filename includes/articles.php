<?php

require 'includes/database.php';

function showArticles() {
    $db = new Dbh;
    $pdo = $db->connect();
    $sql = 'SELECT title, firstname, lastname, Categories.name as categoryname, Articles.id as id
            FROM Articles
            JOIN Users ON Users.id = Articles.author_id
            JOIN Categories ON Articles.category_id = Categories.id
            ;';
    $result = $pdo->query($sql);
    foreach ($result->fetchAll() as $article) {
        $author = $article['firstname'] . $article['lastname'];
        echo "<tr>
                <td class='text-dark text-center'>{$article['title']}</td>
                <td class='text-dark text-center'>$author</td>
                <td class='text-dark text-center'>{$article['categoryname']}</td>
                <td class='text-dark text-center'>
                    <button data-article-id='{$article['id']}' class='btn mycolor button1 rounded-pill'><i class='mycolor uil uil-pen pe-1'></i>Edit</button>
                    <button data-article-id='{$article['id']}' class='btn mycolor button1 rounded-pill'><i class='mycolor uil uil-trash pe-1'></i>Delete</button>
                </td>
            </tr>";
    }
}
?>

<section class="content_section" id="doctor_sessions_section">
    <div class="row my-3 ms-0 fs-4 fw-bold">Articles</div>
    <div class="w-100 my-4 d-flex justify-content-around border align-items-center py-2 shadow-sm">
        <div class="w-75">
            <!-- <label for="session-date">Search : </label> -->
            <input type="text" class="rounded px-5 py-1 border-0 button1 w-100 ms-2" placeholder="search" name="session-date">
        </div>
        <button class="btn mycolor button1 px-5 rounded-pill"><i class="uil uil-filter me-2 mycolor"></i></i>Filter</button>
    </div>
    <!-- table -->
    <div class="table-responsive my-4" style="overflow: scroll;">
        <table class="table table-light"
            style="border: 0.5px solid rgb(230, 229, 229);border-radius: 20px;">
            <tr class="" style="border-bottom: 2px #007A69 solid;">
                <th class="mycolor fw-bold text-center">Article title</th>
                <!-- <th class="mycolor fw-bold text-center">date of creation</th> -->
                <th class="mycolor fw-bold text-center">Author</th>
                <th class="mycolor fw-bold text-center">Category</th>
                <th class="mycolor fw-bold text-center">Actions</th>
            </tr>
            <?= showArticles() ?>
        </table>
    </div>
    <!-- End table -->
</section>