<?php
require_once(dirname(__DIR__) . '/models/User.php');
require_once(dirname(__DIR__) . '/models/Category.php');
require_once(dirname(__DIR__) . '/models/Product.php');

session_start();

class BasketController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?route=login');
            exit();
        }
        $user = User::findById($_SESSION['user_id']);
        $categories = Category::getAllCategories();
        $products = Product::getAllProducts();

        // initialize basket session
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = [];
        }

        // add product to basket
        if (isset($_POST['add_to_basket'])) {
            $product_id = $_POST['product_id'];
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
            $product = Product::getProductById($product_id);
            if ($product) {
                $product->quantity = $quantity;
                $found = false;
                foreach ($_SESSION['basket'] as &$basket_product) {
                    if ($basket_product->id == $product_id) {
                        $basket_product->quantity += $quantity;
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $_SESSION['basket'][] = $product;
                }
            }
            header('Location: index.php?route=basket'); // Redirect to the basket page
            exit();
        }

        // remove product from basket
        if (isset($_POST['remove_from_basket'])) {
            $product_id = $_POST['product_id'];
            foreach ($_SESSION['basket'] as $key => $product) {
                if ($product->id == $product_id) {
                    unset($_SESSION['basket'][$key]);
                }
            }
            $_SESSION['basket'] = array_values($_SESSION['basket']); // Reindex array
        }

        // update basket
        if (isset($_POST['update_basket'])) {
            $basket_products = [];
            $total_price = 0;
            foreach ($_POST['quantity'] as $product_id => $quantity) {
                $product = Product::getProductById($product_id);
                if ($product) {
                    $product->quantity = $quantity;
                    $basket_products[] = $product;
                    $total_price += $product->price * $quantity;
                }
            }
            $_SESSION['basket'] = $basket_products;
        }

        // clear basket
        if (isset($_POST['clear_basket'])) {
            $_SESSION['basket'] = [];
            header('Location: index.php?route=basket');
            exit();
        }

        // save basket
        if (isset($_POST['save_basket'])) {
            $user->basket = json_encode($_SESSION['basket']);
            $user->save();
            $_SESSION['basket'] = [];
            header('Location: index.php?route=basket');
            exit();
        }

        // iterate basket products
        $basket_products = $_SESSION['basket'];

        // basket length
        $basket_length = count($basket_products);

        require_once(dirname(__DIR__) . '/views/header.php');
        require_once(dirname(__DIR__) . '/views/basket.php');
        require_once(dirname(__DIR__) . '/views/footer.php');
    }
}