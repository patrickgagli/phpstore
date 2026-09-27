<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?route=home"><i class="bi bi-house-fill"></i>Accueil</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Blog/News</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center text-muted">Découvrez les dernières actualités, les articles de blog et les nouveautés sur notre site.</p>
                </div>
            </div>
        </div>
        <!-- Blog list -->
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Publié le</th>
                        <th scope="col">Modifié le</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr class="table-dark article-item">
                            <td>
                                <a href="index.php?route=blog&id=<?php echo htmlspecialchars($article['id']);?>">
                                    <?php echo htmlspecialchars($article['title']); ?>
                                </a>
                            </td>
                            <td>
                                <a href="index.php?route=blog&id=<?php echo htmlspecialchars($article['id']);?>">
                                    <?php echo htmlspecialchars($article['content']); ?>
                                </a>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($article['author_name']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($article['created_at']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($article['updated_at']); ?>
                            </td>     
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Blog form -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="container">
                <div class="row justify-content-center mt-5 mb-5">
                    <div class="col-lg-6">
                        <h2 class="text-center">Ajouter un article</h2>
                        <form action="" method="POST">
                            <input type="hidden" name="article_author_id" value="<?php echo $user->id; ?>">
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre:</label>
                                <input type="text" class="form-control" id="title" name="title" required><br><br>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Contenu:</label>
                                <textarea id="content" class="form-control" name="content" required></textarea><br><br>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Envoyez">
                        </form>
                    </div>
                </div>
            </div>                 
        <?php else: ?>
            <div class="container">
                <div class="row justify-content-center mt-5 mb-5">
                    <div class="col-lg-6">
                        <p class="text-center text-danger"><?php echo htmlspecialchars('Fonctionnalité pour créer un article réservé aux membres'); ?></p>
                        <div class="row justify-content-center mb-5">
                            <a href="index.php?route=login" type="button" class="btn btn-dark btn-lg">
                                <?php echo htmlspecialchars('Cliquez ici pour vous connecter ou vous inscrire'); ?>
                            </a>
                        </div>  
                    </div>
                </div>
            </div>                          
        <?php endif; ?>
    </div>
</main>

