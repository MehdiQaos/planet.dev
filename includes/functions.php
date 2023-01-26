<?php

include_once 'includes/autoload.inc.php';

function allArticlesNumber() {
    $articleController = new ArticleContr();
    $articles = $articleController->getArticlesInfo();
    echo count($articles);
}

function allWritersNumber() {
    $userContr = new UserContr();
    $writers = $userContr->getWriters();
    echo count($writers);
}

function allUsersNumber() {
    $usrC = new UserContr;
    $count = count($usrC->getAdmins());
    $count += count($usrC->getWriters());
    $count += count($usrC->getReaders());

    return $count;
}

function allCatNumber() {
    $catCon = new CategoryContr;
    $count = count($catCon->getCategories());
    return $count;
}

function showArticles()
{
    $articleController = new ArticleContr();
    $articles = $articleController->getArticlesInfo();
    foreach ($articles as $article) {
        echo "<tr class='table-data-row'>
                <td class='text-dark text-center'>{$article['title']}</td>
                <td class='text-dark text-center'>{$article['fullname']}</td>
                <td class='text-dark text-center'>{$article['categoryname']}</td>
                <td class='text-dark text-center'>
                    <button data-article-id='{$article['id']}' class='btn mycolor button1 rounded-pill edit_article' data-bs-toggle='modal' data-bs-target='#editModal'><i class='mycolor uil uil-pen pe-1'></i>Edit</button>
                    <button data-article-id='{$article['id']}' class='btn mycolor button1 rounded-pill remove_article'><i class='mycolor uil uil-trash pe-1'></i>Delete</button>
                </td>
            </tr>";
    }
}

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