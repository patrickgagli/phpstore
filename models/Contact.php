<?php
require_once(dirname(__DIR__) . '/models/Database.php');

class Contact {
    public $id;
    public $name;
    public $email;
    public $message;

    public function __construct($id = null, $name = null, $email = null, $message = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public static function createContact($name, $email, $message) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $message]);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    public static function getAllContacts() {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->query("SELECT * FROM contact");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }

}

?>