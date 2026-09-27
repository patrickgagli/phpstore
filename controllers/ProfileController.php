<?php
require_once(dirname(__DIR__) . '/models/User.php');
require_once(dirname(__DIR__) . '/models/Profile.php');

class ProfileController {
    public function index() {
        if (isset($_SESSION['user_id'])) {
            $user = User::findById($_SESSION['user_id']);
            $profile = Profile::getProfileById($_SESSION['user_id']);
            if ($profile) {
                require_once(dirname(__DIR__) . '/views/header.php');
                require_once(dirname(__DIR__) . '/views/profile.php');
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