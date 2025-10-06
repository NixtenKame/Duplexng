<?php
class PostController {
    public function index() {
        $posts = [
            ['title' => 'Post 1', 'image' => 'cat1.png'],
            ['title' => 'Post 2', 'image' => 'dog2.png']
        ];
        include __DIR__ . '/../views/posts/index.php';
    }
}

// Simple router (front controller)
if ($_SERVER['REQUEST_URI'] === '/posts') {
    $controller = new PostController();
    $controller->index();
}