<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?route=home"><i class="bi bi-house-fill"></i>Accueil</a></li>
                    <li class="breadcrumb-item"><a href="index.php?route=blog">Blog</a></li>
                    <li class="breadcrumb-item active"><?php if (!empty($article)): ?><?php echo $article['title']; ?><?php else: ?><p>Aucun Article</p><?php endif; ?> </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <!-- Blog detail -->
        <div class="container">
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-lg-8">
                    <?php if (!empty($article)): ?>
                        <div class="card mb-3">
                            <h3 class="card-header"><?php echo $article['title']; ?></h3>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <h6 class="card-subtitle text-muted"></h6>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo htmlspecialchars($article['content']); ?>
                                    
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Auteur: <em class="text-muted"><?php echo htmlspecialchars($article['author_name']); ?></em></li>
                                <li class="list-group-item">Publié le: <em class="text-muted"><?php echo htmlspecialchars($article['created_at']); ?></em></li>
                                <li class="list-group-item">Modifié le: <em class="text-muted"><?php echo htmlspecialchars($article['updated_at']); ?></em></li>

                                <?php foreach ($comments as $comment): ?> 
                                    <li class="list-group-item">Comentaire de <?php echo htmlspecialchars($comment['author_name']); ?>: 
                                        <br><em class="text-muted"><i class="bi bi-chat"></i> <?php echo htmlspecialchars($comment['content']); ?></em>
                                    </li>
                                <?php endforeach; ?>
                                
                            </ul>
                            <div class="card-footer text-muted">
                                <?php echo number_format($article['id'], 2); ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>Aucun Article!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>  
    </div>
</main>

 
