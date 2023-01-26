<?php

include "includes/autoload.inc.php";
include_once 'includes/functions.php';

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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update article</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="articles_input_form" action="includes/store_article.php" class="row">
                        <div class="mb-3" id="new_articles"></div>
                        <div class="mb-2">
                            <input type="text" id="article_title" class="w-100 form-control required_input" placeholder="Article title">
                            <label id="title_label_needed" class="text-danger msg_label d-none">title needed</label>
                        </div>
                        <div class="mb-2">
                            <select name="category" id="article_author" class="form-control required_input" required>
                                <option value="">Choose author</option>
                                <?=showWriters();?>
                            </select>
                            <label class="text-danger msg_label d-none">author needed</label>
                        </div>
                        <div class="mb-2">
                            <select name="category" id="article_category" class="form-control required_input" required>
                                <option value="">Choose category</option>
                                <?=showCategories();?>
                            </select>
                            <label class="text-danger msg_label d-none">category needed</label>
                        </div>
                        <div class="mb-2">
                            <textarea id="new_article_form"></textarea>
                            <label id="article_label_needed" class="text-danger msg_label d-none">article content needed</label>
                        </div>
                        <input type="text" id="articles_input" name="articles" hidden>
                        <!-- <div class="d-flex justify-content-end mb-2">
                            <button id="btnCancelArticle" class="btn btn-danger ms-1">cancel</button>
                            <button id="btnAddArticle" class="btn btn-success ms-1">add</button>
                            <button type="submit" id="btnSaveArticles" class="btn btn-primary ms-1">save</button>
                        </div> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="save_update" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/tinymce/tinymce.min.js"></script>
    <script>
        const deleteButtons = document.querySelectorAll('.remove_article');
        const editButtons = document.querySelectorAll('.edit_article');
        const saveUpdate = document.getElementById('save_update');
        // let myModal = new bootstrap.Modal(document.getElementById('editModal'));

        const articleTitle = document.getElementById('article_title');
        const articleAuthor = document.getElementById('article_author');
        const articleCategory = document.getElementById('article_category');
        const articleForm = document.getElementById('article_form');
        const articleNeededLabel = document.getElementById('article_label_needed');
        const articlesInput = document.getElementById('articles_input');
        const articlesInputForm = document.getElementById('articles_input_form');

        let idToUpdate = null;

        tinymce.init({
            selector: 'textarea',
            plugins: 'image',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
        });

        async function fillInputs() {
            let response = await fetch(`includes/update_article.php?get_article_data=${idToUpdate}`);
            let data = await response.json();
            articleTitle.value = data['title'];
            articleAuthor.value = data['author_id'];
            articleCategory.value = data['category_id'];
            tinymce.activeEditor.setContent(data['body']);
        }

        editButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                idToUpdate = btn.dataset.articleId;
                fillInputs();
            });
        });

        deleteButtons.forEach(btn => {
            btn.addEventListener('click', async () => {
                let formData = new FormData();
                formData.append('id', btn.dataset.articleId);
                formData.append('remove_article', '');
                let response = await fetch('includes/remove_article.php', {
                    method: 'post',
                    body: formData
                });
                location.reload();
            });
        });

        let article;
        saveUpdate.addEventListener('click', async () => {
            if (!validateInputs())
                return;
            const formData = newArticle();
            let response = await fetch('includes/update_article.php', {
                method: 'POST',
                body: formData
            });
            let r = await response.text();
            console.log(r);
            tinymce.activeEditor.setContent('');
            articleTitle.value = '';
            articleAuthor.value = '';
            articleCategory.value = '';
        });

        function validateInputs() {
            let valide = true;
            document.querySelectorAll('.required_input').forEach(input => {
                if (input.value == '') {
                    input.parentNode.querySelector('.msg_label').classList.remove('d-none');
                    valide = false;
                } else
                    input.parentNode.querySelector('.msg_label').classList.add('d-none');
            });
            if (tinymce.activeEditor.getContent() == '') {
                articleNeededLabel.classList.remove('d-none');
                valide = false;
            } else
                articleNeededLabel.classList.add('d-none');
            return valide;
        }

        function newArticle() {
            let formData = new FormData();
            formData.append('update_article', '');
            formData.append('id', idToUpdate);
            formData.append('body', tinymce.activeEditor.getContent());
            formData.append('title', articleTitle.value);
            formData.append('author_id', articleAuthor.value);
            formData.append('category_id', articleCategory.value);
            // let id = idToUpdate;
            // let body = tinymce.activeEditor.getContent();
            // let title = articleTitle.value;
            // let author_id = articleAuthor.value;
            // let category_id = articleCategory.value;
            // let update_article = '';
            // const article = {id, title, body, author_id, category_id, update_article};
            // return article;
            return formData;
        }

        function addArticleToDom(article) {
            let newArticleElem = document.createElement('button');
            newArticleElem.id = `articleN${article.id}`;
            newArticleElem.classList.add('btn', 'btn-outline-warning', 'fs-2', 'fw-bolder', 'w-100');
            newArticleElem.innerText = article.title;
            newArticles.append(newArticleElem);
            return newArticleElem;
        }
    </script>
</section>