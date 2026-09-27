<?php
class LogoutController {
    public function index() {
        session_destroy();
        header('Location: index.php?route=login');
        exit();
    }
}
?>

