<?php
require_once(dirname(__DIR__) . '/models/Database.php');

class Comment {
    public $id;
    public $article_id;
    public $comment_author_id;
    public $content;
    public $created_at;

    public function __construct($id = null, $article_id = null, $comment_author_id = null, $content = null, $created_at = null) {
        $this->id = $id;
        $this->article_id = $article_id;
        $this->comment_author_id = $comment_author_id;
        $this->content = $content;
        $this->created_at = $created_at;
    }

    public static function createComment($article_id, $comment_author_id, $content, $created_at) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("INSERT INTO comment (article_id, comment_author_id, content, created_at) VALUES (?, ?, ?, ?)");
            $stmt->execute([$article_id, $comment_author_id, $content, $created_at]);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }
    
    public static function getAllComments() {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->query("SELECT * FROM comment");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }

    public static function getCommentsByArticleId($article_id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT comment.*, user.full_name AS author_name FROM comment JOIN user ON comment.comment_author_id = user.id WHERE comment.article_id = ?");
            $stmt->execute([$article_id]);
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $comments;
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }

}