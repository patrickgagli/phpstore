<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?route=home"><i class="bi bi-house-fill"></i>Accueil</a></li>
                    <li class="breadcrumb-item"><a href="index.php?route=shop">Boutique</a></li>
                    <li class="breadcrumb-item active"><?php if (!empty($product)): ?><?php echo $product->name; ?><?php else: ?><p>Aucun Produit</p><?php endif; ?> </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
    <!-- Product detail -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6">
                <img src="https://via.placeholder.com/300" class="img-fluid" alt="Product Image">
            </div>
            <div class="col-md-6">
                <?php if (!empty($product)): ?>
                    <h1 class="display-5"><?php echo $product->name; ?></h1>
                    <p class="lead"><?php echo $product->description; ?></p>
                    <h2 class="text-primary"><?php echo number_format($product->price, 2); ?>  €</h2>
                    <form action="index.php?route=basket" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                        <div class="form-group">
                            <label for="quantity">Quantité:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="10">
                        </div>
                        <button type="submit" name="add_to_basket" class="btn btn-success btn-lg">Ajouter au Panier</button>
                    </form>
                <?php else: ?>
                    <p>Aucun Produit!</p>
                <?php endif; ?>     
            </div>
        </div>
    </div>  
</div>
</main>