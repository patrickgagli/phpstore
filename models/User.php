<?php
require_once(dirname(__DIR__) . '/models/Database.php');

class User {
    public $id;
    public $email;
    public $password;
    public $full_name;
    public $role;

    public function __construct($id = null, $email = null, $full_name = null, $password = null, $role = 'user') {
        $this->id = $id;
        $this->email = $email;
        $this->full_name = $full_name;
        $this->password = $password;
        $this->role = $role;
    }

    public static function createUser($full_name, $email, $password, $role = 'user') {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $connection->prepare("INSERT INTO user (full_name, email, password, role) VALUES (?, ?, ?, ?)");
            $stmt->execute([$full_name, $email, $hashed_password, $role]);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    public static function getAllUsers() {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->query("SELECT * FROM user");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }

    public static function findById($id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT * FROM user WHERE id = ?");
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return new User($user['id'], $user['email'], $user['full_name'], $user['password'], $user['role']);
            }
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return null;
    }
    
    public static function findByEmail($email) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return new User($user['id'], $user['email'], $user['full_name'], $user['password'], $user['role']);
            }
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return null; 
    }

    public function authenticate($password) {
        if (password_verify($password, $this->password)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
