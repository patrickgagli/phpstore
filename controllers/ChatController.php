<?php
require_once(dirname(__DIR__) . '/models/Chat.php');
require_once(dirname(__DIR__) . '/models/User.php');
require_once(dirname(__DIR__) . '/models/Profile.php');

class ChatController {
    public function index() {
        require(dirname(__DIR__) . '/views/header.php');
        if (isset($_SESSION['user_id'])) {
            $user = User::findById($_SESSION['user_id']);
        }
        $chatId = isset($_GET['id']) ? intval($_GET['id']) : null;
        if ($chatId) {
            $chat = Chat::getChatById($chatId);
            if (!$chat) {
                echo "Chat not found!";
                return;
            }
            require(dirname(__DIR__) . '/views/chat_detail.php');
        } else {
            $chats = Chat::getAllChats(10);
            $profiles = Profile::getAllProfiles();

            $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sender_id = $_POST['sender_id'];
            $receiver_id = $_POST['receiver_id'];
            $message = $_POST['message'];

            if (empty($sender_id) || empty($receiver_id) || empty($message)) {
                $error = "All fields are required";
            } else {
                Chat::createChat($sender_id, $receiver_id, $message);
                header('Location: index.php?route=chat');
                exit();
            }
        }
            require(dirname(__DIR__) . '/views/chat_list.php');
        }
        require(dirname(__DIR__) . '/views/footer.php');
    }
}

