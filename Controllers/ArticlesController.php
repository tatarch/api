<?php

namespace App\Controllers;

use App\Repositories\ArticlesRepository;

class ArticlesController
{
    private $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticlesRepository();
    }

    public function getAllArticles(): void
    {
        $articles = $this->articleRepository->getAllArticles();
        echo json_encode($articles);
    }

    public function getById(int $id): void
    {
        $article = $this->articleRepository->getById($id);
        echo json_encode($article);
    }

    public function addArticle(string $postData): void
    {
        $data = json_decode($postData, true);
        $title = $data['title'];
        $text = $data['text'];
        if (!$data['date']) {
            $date = date('Y-m-d H:i:s');
        } else {
            $date = $data['date'];
        }
        $this->articleRepository->addArticle($title, $text, $date);
    }

    public function updateArticle(int $id, string $postData): void
    {
        $data = json_decode($postData, true);
        $title = $data['title'];
        $text = $data['text'];
        if (!$data['date']) {
            $date = date('Y-m-d H:i:s');
        } else {
            $date = $data['date'];
        }

        $this->articleRepository->updateArticle($id, $title, $text, $date);
    }

    public function deleteArticle(int $id): void
    {
        $this->articleRepository->deleteArticle($id);
    }

}