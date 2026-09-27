<?php
require_once(dirname(__DIR__) . '/models/Database.php');

class Product {
    public $id;
    public $name;
    public $description;
    public $price;
    public $quantity;
    public $category_id;

    public function __construct($id = null, $name = null, $description = null, $price = null, $quantity = null, $category_id = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->category_id = $category_id;
    }

    public static function createProduct($name, $description, $price, $quantity, $category_id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("INSERT INTO product (name, description, price, quantity, category_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $description, $price, $quantity, $category_id]);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    public static function getAllProducts() {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->query("SELECT * FROM product");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }
    
    public static function getProductById($id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT * FROM product WHERE id = ?");
            $stmt->execute([$id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($product) {
                return new Product($product['id'], $product['name'], $product['description'], $product['price'], $product['quantity'], $product['category_id']);
            }
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return null;
    }

    public static function getProductByCategory($category_id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT * FROM product WHERE category_id = ?");
            $stmt->execute([$category_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }
}

?>