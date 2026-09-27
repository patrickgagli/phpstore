<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?route=home"><i class="bi bi-house-fill"></i>Accueil</a></li>
                    <li class="breadcrumb-item active">Boutique</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Boutique</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center text-muted">Découvrez le catalogue nos produits </p>
                </div>
            </div>
            <!-- Product list by category -->
            <div class="row mb-5 mt-3">
                <?php foreach ($categories as $category): ?>
                    <div class="col-lg-4"> 
                        <?php 
                            $products = Product::getProductByCategory($category['id']);
                            if ($products):
                        ?>
                            <div class="card border-secondary mb-3" style="max-width: 20rem;">
                                <div class="card-header"><?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?></div>
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text">
                                        <?php echo htmlspecialchars($category['description'], ENT_QUOTES, 'UTF-8'); ?>
                                        <ul class="list-group">
                                            <?php foreach ($products as $product): ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center product-item">
                                                    <a href="index.php?route=shop&product_id=<?php echo $product['id']; ?>">
                                                        <?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </a>
                                                    <span class="badge badge-primary badge-pill"><?php echo htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8'); ?> €</span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </p>   
                                </div>
                            </div>
                        <?php else: ?>
                            <p>Aucun Produit.</p>
                        <?php endif; ?>
                    </div> 
                <?php endforeach; ?>
            </div> 
        </div>
    </div>    
</main>



