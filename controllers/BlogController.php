<?php
require_once(dirname(__DIR__) . '/models/Article.php');
require_once(dirname(__DIR__) . '/models/Comment.php');
require_once(dirname(__DIR__) . '/models/User.php');

class BlogController {

    public function index() {
        require(dirname(__DIR__) . '/views/header.php');
        if (isset($_SESSION['user_id'])) {
            $user = User::findById($_SESSION['user_id']);
        }
        $articleId = isset($_GET['id']) ? intval($_GET['id']) : null;
        if ($articleId) {
            $article = Article::getArticleById($articleId);
            $comments = Comment::getCommentsByArticleId($articleId);
            if (!$article) {
                echo "Product not found!";
                return;
            }
            require(dirname(__DIR__) . '/views/blog_detail.php');
        } else {
            $articles = Article::getAllArticles();
            $users = User::getAllUsers();

            $error = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $article_author_id = $_POST['article_author_id'];

                if (empty($title) || empty($content) || empty($article_author_id)) {
                    $error = "All fields are required";
                } else {
                    Article::createArticle($title, $content, $article_author_id);
                    header('Location: index.php?route=blog');
                    exit();
                }
            }
            require(dirname(__DIR__) . '/views/blog_list.php');
        }
        require(dirname(__DIR__) . '/views/footer.php');
    }
}
?>
