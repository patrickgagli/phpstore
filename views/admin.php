<main>
    <div class="bs-docs-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <h1 class="text-center">Admin board</h1>
                        <div class="card mb-3">
                            <h3 class="card-header">Bienvenue, <?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></h3>
                            <!-- User list -->
                            <div class="card-body">
                                <h4 class="card-title text-info text-center">Liste des utilisateurs</h4>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nom complet</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Rôle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr class="table-dark">
                                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                                            <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Profile list -->
                            <div class="card-body">
                                <h4 class="card-title text-info text-center">Liste des Profils</h4>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Utilisateur</th>
                                        <th scope="col">Pseudo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($profiles as $profile): ?>
                                        <tr class="table-dark">
                                            <td><?php echo htmlspecialchars($profile['id']); ?></td>
                                            <td><?php echo htmlspecialchars($profile['user_id']); ?></td>
                                            <td><?php echo htmlspecialchars($profile['pseudo']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Category list -->
                            <div class="card-body">
                                <h4 class="card-title text-info text-center">Liste des catégories</h4>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category): ?>
                                        <tr class="table-dark">
                                            <td><?php echo htmlspecialchars($category['id']); ?></td>
                                            <td><?php echo htmlspecialchars($category['name']); ?></td>
                                            <td><?php echo htmlspecialchars($category['description']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Product list -->
                            <div class="card-body">
                                <h4 class="card-title text-info text-center">Liste des produits</h4>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Catégorie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product): ?>
                                        <tr class="table-dark">
                                            <td><?php echo htmlspecialchars($product['id']); ?></td>
                                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                                            <td><?php echo htmlspecialchars($product['description']); ?></td>
                                            <td><?php echo htmlspecialchars($product['price']); ?></td>
                                            <td><?php echo htmlspecialchars($product['category_id']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Article list -->
                            <div class="card-body">
                                <h4 class="card-title text-info text-center">Liste des articles</h4>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Contenu</th>
                                        <th scope="col">Auteur</th>
                                        <th scope="col">Publié le</th>
                                        <th scope="col">Modifié le</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($articles as $article): ?>
                                        <tr class="table-dark">
                                            <td><?php echo htmlspecialchars($article['id']); ?></td>
                                            <td><?php echo htmlspecialchars($article['title']); ?></td>
                                            <td><?php echo htmlspecialchars($article['content']); ?></td>
                                            <td><?php echo htmlspecialchars($article['author_name']); ?></td>
                                            <td><?php echo htmlspecialchars($article['created_at']); ?></td>
                                            <td><?php echo htmlspecialchars($article['updated_at']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Comment list -->
                            <div class="card-body">
                                <h4 class="card-title text-info text-center">Liste des commentaires</h4>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Article</th>
                                        <th scope="col">Auteur</th>
                                        <th scope="col">Contenu</th>
                                        <th scope="col">Publié le</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comments as $comment): ?>
                                        <tr class="table-dark">
                                            <td><?php echo htmlspecialchars($comment['id']); ?></td>
                                            <td><?php echo htmlspecialchars($comment['article_id']); ?></td>
                                            <td><?php echo htmlspecialchars($comment['author_id']); ?></td>
                                            <td><?php echo htmlspecialchars($comment['content']); ?></td>
                                            <td><?php echo htmlspecialchars($comment['created_at']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Contact list -->
                            <div class="card-body">
                                <h4 class="card-title text-info text-center">Liste des contacts</h4>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nom complet</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Rôle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contacts as $contact): ?>
                                        <tr class="table-dark">
                                            <td><?php echo htmlspecialchars($contact['id']); ?></td>
                                            <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                            <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                            <td><?php echo htmlspecialchars($contact['message']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Chat list -->
                            <div class="card-body">
                                <h4 class="card-title text-info text-center">Liste des chats</h4>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Chat</th>
                                        <th scope="col">Expéditeur</th>
                                        <th scope="col">Receveur</th>
                                        <th scope="col">Envoyé le</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($chats as $chat): ?>
                                        <tr class="table-dark">
                                            <td><?php echo htmlspecialchars($chat['id']); ?></td>
                                            <td><?php echo htmlspecialchars($chat['message']); ?></td>
                                            <td><?php echo htmlspecialchars($chat['sender_id']); ?></td>
                                            <td><?php echo htmlspecialchars($chat['receiver_id']); ?></td>
                                            <td><?php echo htmlspecialchars($chat['created_at']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</main>
