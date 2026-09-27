<?php
require_once(dirname(__DIR__) . '/models/Database.php');

class Profile {
    public $id;
    public $pseudo;
    public $address;
    public $postcode;
    public $city;
    public $dob;
    public $image;
    public $user_id;

    public function __construct($id = null, $pseudo = null, $address = null, $postcode = null, $city = null, $dob = null, $image = null, $user_id = null) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->address = $address;
        $this->postcode = $postcode;
        $this->city = $city;
        $this->dob = $dob;
        $this->image = $image;
        $this->user_id = $user_id;
    }

    public static function createProfile($pseudo, $address, $postcode, $city, $dob, $image, $user_id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("INSERT INTO profile (pseudo, address, postcode, city, dob, image, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$pseudo, $address, $postcode, $city, $dob, $image, $user_id]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getAllProfiles() {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->query("SELECT * FROM profile");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return [];
    }

    public static function getProfileById($id) {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT * FROM profile WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return [];
    }

}

?>

