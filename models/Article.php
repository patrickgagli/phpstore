<?php
require_once(dirname(__DIR__) . '/models/Database.php');

class Article {
    public $id;
    public $title;
    public $content;
    public $article_author_id;
    public $created_at;
    public $updated_at;

    public function __construct($id = null, $title = null, $content = null, $article_author_id = null, $created_at = null, $updated_at = null) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->article_author_id = $article_author_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function createArticle($title, $content, $article_author_id, $created_at = null, $updated_at = null) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            if ($created_at === null) {
                $created_at = date('Y-m-d H:i:s');
            }
            if ($updated_at === null) {
                $updated_at = date('Y-m-d H:i:s');
            }
            $stmt = $connection->prepare("INSERT INTO article (title, content, article_author_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $content, $article_author_id, $created_at, $updated_at]);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }
    
    public static function getAllArticles() {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->query(
                "SELECT article.*, user.full_name AS author_name FROM article JOIN user ON article.article_author_id = user.id"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }

    public static function getArticleById($id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT article.*, user.full_name AS author_name FROM article JOIN user ON article.article_author_id = user.id WHERE article.id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }

    public static function updateArticle($id, $title, $content, $author_id, $created_at, $updated_at) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("UPDATE article SET title = ?, content = ?, article_author_id = ?, created_at = ?, updated_at = ? WHERE id = ?");
            $stmt->execute([$title, $content, $author_id, $created_at, $id]);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    public static function deleteArticle($id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("DELETE FROM article WHERE id = ?");
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    public static function getArticlesByAuthor($author_id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT * FROM article WHERE article_author_id = ?");
            $stmt->execute([$author_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }
}