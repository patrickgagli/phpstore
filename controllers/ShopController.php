<?php
require_once(dirname(__DIR__) . '/models/Category.php');
require_once(dirname(__DIR__) . '/models/Product.php');

class ShopController {
    public function index() {
        require(dirname(__DIR__) . '/views/header.php');

        if (isset($_GET['product_id'])) {
            $product = Product::getProductById($_GET['product_id']);
            if ($product) {
                $category = Category::getCategoryById($product->category_id);
                require(dirname(__DIR__) . '/views/shop_detail.php');
            } else {
                $this->listProducts();
            }
        } else {
            $this->listProducts();
        }

        require(dirname(__DIR__) . '/views/footer.php');
    }

    private function listProducts() {
        $categories = Category::getAllCategories();
        if (isset($_GET['category_id'])) {
            $products = Product::getProductByCategory($_GET['category_id']);
        }
        require(dirname(__DIR__) . '/views/shop_list.php');
    }
}
?>