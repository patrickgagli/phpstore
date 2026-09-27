<?php
require_once(dirname(__DIR__) . '/models/Database.php');

class Category {
    public $id;
    public $name;
    public $description;

    public function __construct($id = null, $name = null, $description = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public static function createCategory($name, $description) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("INSERT INTO category (name, description) VALUES (?, ?)");
            $stmt->execute([$name, $description]);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    public static function getAllCategories() {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->query("SELECT * FROM category");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }

    public static function getCategoryById($id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT * FROM category WHERE id = ?");
            $stmt->execute([$id]);
            $category = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($category) {
                return new Category($category['id'], $category['name'], $category['description']);
            }
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return null;
    }
}

?>