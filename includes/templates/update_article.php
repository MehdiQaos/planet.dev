<?php

include_once "includes/autoload.inc.php";

function showCategories() {
    $categoryContr = new CategoryContr();
    $categories = $categoryContr->getCategories();
    foreach ($categories as $category) {
        echo "<option value='{$category['id']}'>{$category['name']}</option>\n";
    }
}

function showWriters() {
    $userContr = new UserContr();
    $writers = $userContr->getWriters();
    foreach ($writers as $writer) {
        echo "<option value='{$writer['id']}'>{$writer['fullname']}</option>\n";
    }
}

?>

<section id="new_article_container" class="container">
    <form method="POST" id="articles_input_form" action="includes/store_article.php" class="row">
        <div class="mb-3" id="new_articles"></div>
        <div class="mb-2">
            <input type="text" id="article_title" class="w-100 form-control required_input" placeholder="Article title">
            <label id="title_label_needed" class="text-danger msg_label d-none">title needed</label>
        </div>
        <div class="mb-2">
            <!-- <input type="text" id="article_author" class="w-100 form-control required_input" placeholder="Article author"> -->
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
        <div class="d-flex justify-content-end mb-2">
            <button id="btnCancelArticle" class="btn btn-danger ms-1">cancel</button>
            <button id="btnAddArticle" class="btn btn-success ms-1">add</button>
            <button type="submit" id="btnSaveArticles" class="btn btn-primary ms-1">save</button>
        </div>
    </form>
    <script src="assets/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            // plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            plugins: 'image',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
        });

        const addButton = document.getElementById('btnAddArticle');
        const saveButton = document.getElementById('btnSaveArticles');
        const cancelButton = document.getElementById('btnCancelArticle');
        const articleTitle = document.getElementById('article_title');
        const articleAuthor = document.getElementById('article_author');
        const articleCategory = document.getElementById('article_category');
        const articleForm = document.getElementById('article_form');
        const newArticles = document.getElementById('new_articles');
        const titleNeededLabel = document.getElementById('title_label_needed'); //delete
        const articleNeededLabel = document.getElementById('article_label_needed');  //delete
        const articlesInput = document.getElementById('articles_input');
        const articlesInputForm = document.getElementById('articles_input_form');


        const allArticles = [];
        nextId = 1;

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
            let body = tinymce.activeEditor.getContent();
            let title = articleTitle.value;
            let author_id = articleAuthor.value;
            let category = articleCategory.value;
            let id = nextId++;
            const article = {title, body, author_id, category};
            allArticles.push(article);
            return article;
        }

        function addArticleToDom(article) {
            let newArticleElem = document.createElement('button');
            newArticleElem.id = `articleN${article.id}`;
            newArticleElem.classList.add('btn', 'btn-outline-warning', 'fs-2', 'fw-bolder', 'w-100');
            newArticleElem.innerText = article.title;
            newArticles.append(newArticleElem);
            return newArticleElem;
        }

        addButton.addEventListener('click', async (e) => {
            e.preventDefault();
            if (!validateInputs())
                return;
            let article = newArticle();
            addArticleToDom(article);
            tinymce.activeEditor.setContent('');
            articleTitle.value = '';
        });

        saveButton.addEventListener('click', async (e) => {
            e.preventDefault();
            if (validateInputs())
                newArticle();
            
            if (allArticles.length == 0)
                return;
            articlesInput.value = JSON.stringify(allArticles);
            articlesInputForm.submit();
        });
    </script>
</section>
