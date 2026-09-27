<?php
require_once(dirname(__DIR__) . '/models/Database.php');
class Chat {
    public $id;
    public $sender_id;
    public $receiver_id;
    public $message;
    public $created_at;

    public function __construct($id = null, $sender_id = null, $receiver_id = null, $message = null, $created_at = null) {
        $this->id = $id;
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->message = $message;
        $this->created_at = $created_at;
    }

    public static function createChat($sender_id, $receiver_id ,$message, $created_at = null) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            if ($created_at === null) {
                $created_at = date('Y-m-d H:i:s');
            }
            $stmt = $connection->prepare("INSERT INTO chat (sender_id, receiver_id, message, created_at) VALUES (?, ?, ?, ?)");
            $stmt->execute([$sender_id, $receiver_id ,$message, $created_at]);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    public static function getAllChats() {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->query(
                "SELECT chat.*, sender.pseudo AS sender_pseudo, receiver.pseudo AS receiver_pseudo
                FROM chat
                JOIN profile AS sender ON chat.sender_id = sender.id
                JOIN profile AS receiver ON chat.receiver_id = receiver.id
                WHERE sender.pseudo != receiver.pseudo"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }

    public static function getChatById($id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare(
                "SELECT chat.*, sender.pseudo AS sender_pseudo, receiver.pseudo AS receiver_pseudo
                FROM chat
                JOIN profile AS sender ON chat.sender_id = sender.id
                JOIN profile AS receiver ON chat.receiver_id = receiver.id
                WHERE sender.pseudo != receiver.pseudo 
                AND chat.id = ?"
            );
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
        return [];
    }
}

?>