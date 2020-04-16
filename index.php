<?php

require 'vendor/autoload.php';

$url = str_replace('?', '/', $_SERVER['REQUEST_URI']);
$url = trim($url, '/');
$url = explode('/', $url);
$method = $_SERVER['REQUEST_METHOD'];
if ($url[0] == 'articles') {
    $controller = new \App\Controllers\ArticlesController();

    if ($method == 'GET') {
        if (count($url) == 2) {
            $controller->getAllArticles();
        } elseif (count($url) == 3) {
            $controller->getById($url[1]);
        }
    }

    if ($method == 'POST' && count($url) == 2) {
        $postData = file_get_contents('php://input');
        $controller->addArticle($postData);
    }

    if ($method == 'PUT' && count($url) == 3) {
        $articleId = $url[1];
        $postData = file_get_contents('php://input');
        $controller->updateArticle($articleId, $postData);
    }

    if ($method == 'DELETE' && count($url) == 3) {
        $articleId = $url[1];
        $controller->deleteArticle($articleId);
    }
}



