<section id="new_article_container" class="container">
    <div class="row container" id="new_articles"></div>
    <div class="row">
        <label for="article_title">Article title</label>
        <input type="text" id="article_title">
    </div>
    <div class="row">
        <textarea id="new_article_form"></textarea>
    </div>
    <div class="row">
        <button id="btnAddArticle" class="btn btn-success">add</button>
        <button id="btnSaveArticles" class="btn btn-primary">add</button>
        <button id="btnCancelArticle" class="btn btn-danger">cancel</button>
    </div>
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
        const articleForm = document.getElementById('article_form');
        const newArticles = document.getElementById('new_articles');

        const allArticles = [];
        nextId = 1;

        function addNewArticle(title, content) {
            const article = {
                title: articleTitle.value,
                body: content,
                id: nextId++,
            };
            allArticles.push(article);

            let newArticleElem = document.createElement('h2');
            newArticleElem.id = `articleN${article.id}`;
        }

        addButton.addEventListener('click', async () => {
            let content = tinymce.activeEditor.getContent();
            let formData = new FormData();
            formData.append('title', articleTitle.value);
            formData.append('content', content);

            console.log(typeof content);
            console.log(content);

            let response = await fetch('includes/store_article.php', {
                method: 'POST',
                body: formData
            });

            let result = await response.json();

            console.log(result.msg);
            console.log(result.err);
        });

        saveButton.addEventListener('click', async () => {
            let content = tinymce.activeEditor.getContent();
            let formData = new FormData();
            formData.append('title', articleTitle.value);
            formData.append('content', content);

            console.log(typeof content);
            console.log(content);

            let response = await fetch('includes/store_article.php', {
                method: 'POST',
                body: formData
            });

            let result = await response.json();

            console.log(result.msg);
            console.log(result.err);
        });
    </script>
</section>