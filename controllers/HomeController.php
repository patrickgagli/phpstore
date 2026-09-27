<?php
require_once(__DIR__ . '/UserController.php');
require_once(__DIR__ . '/ProfileController.php');

class HomeController {
    public function index() {
        if (isset($_SESSION['user_id'])) {
            $user = User::findById($_SESSION['user_id']);
            $profile = Profile::getProfileById($_SESSION['user_id']); 

            $cookieName = 'Visit_' . $_SESSION['user_id'];

            if(!isset($_COOKIE[$cookieName])) {
                $nVisit=1;
                $msg="Vous êtes nouveau, merci pour votre première visite";
            }
            else{
                $nVisit=$_COOKIE[$cookieName]+1;
                $msg="Merci pour votre visite n°$nVisit";
            }

            // Set the cookie with a lifetime of 24 hours
            setcookie($cookieName, $nVisit, time()+24*3600, "/", "", false, true);
        }

        require(dirname(__DIR__) . '/views/header.php');
        require(dirname(__DIR__) . '/views/home.php');
        require(dirname(__DIR__) . '/views/footer.php');
    }
}
?>