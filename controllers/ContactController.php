<?php
require_once(dirname(__DIR__) . '/models/Contact.php');

class ContactController {
    public function index() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            if (empty($name) || empty($email) || empty($message)) {
                $error = "All fields are required";
            } else {
                Contact::createContact($name, $email, $message);
                $_SESSION['contact_created'] = true;
                header('Location: index.php?route=contact');
                exit();
            }
        }
    
        require_once(dirname(__DIR__) . '/views/header.php');
        require_once(dirname(__DIR__) . '/views/contact.php');
        require_once(dirname(__DIR__) . '/views/footer.php');
    }
}

