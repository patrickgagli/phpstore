<?php

require_once(__DIR__ . '/controllers/HomeController.php');
require_once(__DIR__ . '/controllers/AdminController.php');
require_once(__DIR__ . '/controllers/RegisterController.php');
require_once(__DIR__ . '/controllers/LoginController.php');
require_once(__DIR__ . '/controllers/LogoutController.php');
require_once(__DIR__ . '/controllers/UserController.php');
require_once(__DIR__ . '/controllers/ProfileController.php');
require_once(__DIR__ . '/controllers/BlogController.php');
require_once(__DIR__ . '/controllers/ShopController.php');
require_once(__DIR__ . '/controllers/BasketController.php');
require_once(__DIR__ . '/controllers/ChatController.php');
require_once(__DIR__ . '/controllers/ContactController.php');

$homeController = new HomeController();
$adminController = new AdminController();
$registerController = new RegisterController();
$loginController = new LoginController();
$logoutController = new LogoutController();
$userController = new UserController();
$profileController = new ProfileController();
$blogController = new BlogController();
$shopController = new ShopController();
$basketController = new BasketController();
$chatController = new ChatController();
$contactController = new ContactController();

$route = isset($_GET['route']) ? $_GET['route'] : '';
switch ($route) {
    case 'home':
        $homeController->index();
        break;
    case 'admin':
        $adminController->index();
        break;
    case 'register':
        $registerController->index();
        break;
    case 'login':
        $loginController->index();
        break;
    case 'logout':
        $logoutController->index();
        break;
    case 'user':
        $userController->index();
        break;
    case 'profile':
        $profileController->index();
        break;
    case 'blog':
        $blogController->index();
        break;
    case 'shop':
        $shopController->index();
        break;
    case 'basket':
        $basketController->index();
        break;
    case 'chat':
        $chatController->index();
        break;
    case 'contact':
        $contactController->index();
        break;
    default:
        // Default to home page
        $homeController->index();
        break;
}
?>
