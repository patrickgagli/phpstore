<?php
require_once(dirname(__DIR__) . '/models/User.php');

class UserController {
    public function index() {
        if (isset($_SESSION['user_id'])) {
            $user = User::findById($_SESSION['user_id']);
            if ($user) {
                require_once(dirname(__DIR__) . '/views/header.php');
                require_once(dirname(__DIR__) . '/views/user.php');
                require_once(dirname(__DIR__) . '/views/footer.php');
            } else {
                header('Location: index.php?route=login');
                exit();
            }
        } else {
            header('Location: index.php?route=login');
            exit();
        }
    }
}
?>
