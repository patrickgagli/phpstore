<?php
require_once(dirname(__DIR__) . '/models/User.php');

class RegisterController {
    public function index() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if (empty($full_name) || empty($email) || empty($password) || empty($password2)) {
                $error = "All fields are required";
            } elseif ($password !== $password2) {
                $error = "Passwords do not match";
            } else {
                $existingUser = User::findByEmail($email);
                if ($existingUser) {
                    $error = "Email already exists";
                } else {
                    User::createUser($full_name, $email, $password);
                    header('Location: index.php?route=login');
                    exit();
                }
            }
        }
        require_once 'views/header.php';
        require_once 'views/register.php';
        require_once 'views/footer.php';
    }
}
?>

