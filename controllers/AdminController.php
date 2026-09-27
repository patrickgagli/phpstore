<?php
require_once(dirname(__DIR__) . '/models/User.php');
require_once(dirname(__DIR__) . '/models/Profile.php');
require_once(dirname(__DIR__) . '/models/Contact.php');
require_once(dirname(__DIR__) . '/models/Category.php');
require_once(dirname(__DIR__) . '/models/Product.php');
require_once(dirname(__DIR__) . '/models/Article.php');
require_once(dirname(__DIR__) . '/models/Chat.php');
require_once(dirname(__DIR__) . '/models/Comment.php');

class AdminController {
    public function index() {
        if ($_SESSION['user_role'] !== 'admin') {
            header('Location: index.php?route=admin');
            exit();
        }
        
        $user = User::findById($_SESSION['user_id']);
        $users = User::getAllUsers();
        $profiles = Profile::getAllProfiles(); 
        $contacts = Contact::getAllContacts();
        $categories = Category::getAllCategories();
        $products = Product::getAllProducts();
        $articles = Article::getAllArticles();
        $comments = Comment::getAllComments();
        $chats = Chat::getAllChats();
        
        require_once 'views/header.php';
        require_once 'views/admin.php';
        require_once 'views/footer.php';
    }
}
?>
