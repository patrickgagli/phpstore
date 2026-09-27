<?php
require_once(dirname(__DIR__) . '/models/User.php');

class LoginController {
    public function index() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                $error = "Email and password are required";
            } else {
                $user = User::findByEmail($email);

                if ($user && $user->authenticate($password)) {
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['user_role'] = $user->role;
                    header('Location: index.php?route=home');
                    exit();
                } else {
                    $error = "Invalid email or password";
                }
            }
        }

        require_once(dirname(__DIR__) . '/views/header.php');
        require_once(dirname(__DIR__) . '/views/login.php');
        require_once(dirname(__DIR__) . '/views/footer.php');
    }
}
?>
