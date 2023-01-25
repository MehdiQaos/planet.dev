<?php

include "includes/autoload.inc.php";

function showArticles()
{
    $articleController = new ArticleContr();
    $articles = $articleController->getArticlesInfo();
    foreach ($articles as $article) {
        $author = $article['firstname'] . $article['lastname'];
        echo "<tr>
                <td class='text-dark text-center'>{$article['title']}</td>
                <td class='text-dark text-center'>$author</td>
                <td class='text-dark text-center'>{$article['categoryname']}</td>
                <td class='text-dark text-center'>
                    <button data-article-id='{$article['id']}' class='btn mycolor button1 rounded-pill' data-bs-toggle='modal' data-bs-target='#editModal'><i class='mycolor uil uil-pen pe-1'></i>Edit</button>
                    <button data-article-id='{$article['id']}' class='btn mycolor button1 rounded-pill remove_article'><i class='mycolor uil uil-trash pe-1'></i>Delete</button>
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
        <table class="table table-light" style="border: 0.5px solid rgb(230, 229, 229);border-radius: 20px;">
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
    <!-- Modal -->
    <div class="modal modal-xl fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const deleteButtons = document.querySelectorAll('.remove_article');
        deleteButtons.forEach(btn => {
            btn.addEventListener('click', async () => {
                let formData = new FormData();
                formData.append('id', btn.dataset.articleId);
                formData.append('remove_article', '');
                let response = await fetch('includes/remove_article.php', {
                    method: 'post',
                    body: formData
                });
                // let result = await response.json();
                // console.log(result);
                location.reload();
            });
        });
    </script>
</section>