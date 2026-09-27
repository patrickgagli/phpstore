<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?route=home"><i class="bi bi-house-fill"></i>Accueil</a></li>
                    <li class="breadcrumb-item"><a href="index.php?route=shop">Boutique</a></li>
                    <li class="breadcrumb-item active">Panier</li>
                </ol>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['basket']) && count($_SESSION['basket']) == 0): ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <h4 class="alert-heading">Warning!</h4>
                        <p class="mb-0">
                            Votre panier est vide! 
                            <a href="?route=shop" class="alert-link">Ajoutez des produits</a> 
                            pour continuer vos achats.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['basket']) && count($_SESSION['basket']) > 0): ?>
        <div class="bs-docs-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center">Panier</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-center text-muted">Consultez les produits ajoutés à votre panier.</p>
                    </div>
                </div>
            </div>
            
            <!-- Basket list -->
            <div class="container mb-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['basket'] as $product): ?>
                            <tr class="table-dark">
                                <td>
                                    <?php echo htmlspecialchars($product->name); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($product->description); ?>
                                </td>
                                <td>
                                    <?php echo number_format($product->price, 2); ?> €
                                </td>
                                <td>
                                    <form method="POST" action="">
                                        <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                                        <button type="submit" name="remove_from_basket" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-center">Total: <?php echo number_format(array_sum(array_column($_SESSION['basket'], 'price')), 2); ?> €</h2>
                        </div>
                    </div>
                </div>
                <div class="container mb-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="?route=shop" type="button" class="btn btn-secondary btn-lg">Continuer Shopping</a>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <a href="#" type="button" class="btn btn-success btn-lg">Commander</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br>
    <?php endif; ?>
</main>