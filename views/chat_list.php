<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?route=home"><i class="bi bi-house-fill"></i>Accueil</a></li>
                    <li class="breadcrumb-item active">Chat</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Mini-Chat</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center text-muted">Liste des derniers messages postés par les différents UM connectés</p>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Chat list -->
            <div class="container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Chat</th>
                            <th scope="col">Expéditeur</th>
                            <th scope="col">Receveur</th>
                            <th scope="col">Envoyé le</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chats as $chat): ?>
                            <tr class="table-dark chat-item">
                                <td>
                                    <a href="index.php?route=chat&id=<?php echo htmlspecialchars($chat['id']);?>" style="text-decoration: none; color: white;">
                                        <?php echo htmlspecialchars($chat['id']); ?>  
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?route=chat&id=<?php echo htmlspecialchars($chat['id']);?>" style="text-decoration: none; color: white;">
                                        <i class="bi bi-chat-left"></i> <?php echo htmlspecialchars($chat['message']); ?>
                                    </a>
                                </td>
                                <td>
                                    <i class="bi bi-person-lines-fill"></i> <?php echo htmlspecialchars($chat['sender_pseudo']); ?>
                                </td>
                                <td>
                                    <i class="bi bi-person-bounding-box"></i> <?php echo htmlspecialchars($chat['receiver_pseudo']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($chat['created_at']); ?>
                                </td>     
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Chat form -->
            <div class="container">
                <div class="row justify-content-center text-center mt-5 mb-5">
                    <div class="col-lg-6">
                        <a href="#myModal" role="button" class="btn btn-dark" data-bs-toggle="modal">
                            <?php echo htmlspecialchars('Créer un Chat'); ?>
                        </a><br><br>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Nouveau chat.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="chat-form" action="" method="POST">
                                            <input type="hidden" name="sender_id" value="<?php echo $user->id; ?>">
                                            <div class="mb-3">
                                                <label for="receiver-select" class="form-label">Destinataire:</label>
                                                <select id="receiver-select" class="form-select">
                                                    <option value="">Selectionner</option>
                                                    <?php foreach ($profiles as $profile): ?>
                                                        <option value="<?php echo htmlspecialchars($profile['pseudo']); ?>">
                                                            <?php echo htmlspecialchars($profile['pseudo']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <input type="hidden" id="receiver-id" name="receiver_id" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message" class="form-label">Message:</label>
                                                <textarea id="message" class="form-control" name="message" required></textarea><br><br>
                                            </div>
                                            <input class="btn btn-primary" type="submit" value="Envoyez">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End modal -->
                    </div>
                </div>
            </div>                      
        <?php else: ?>
            <div class="container">
                <div class="row justify-content-center mt-5 mb-5">
                    <div class="col-lg-6">
                        <p class="text-center text-danger"><?php echo htmlspecialchars('Accès réservé aux membres'); ?></p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <a href="index.php?route=login" type="button" class="btn btn-dark">
                                <?php echo htmlspecialchars('Cliquez ici pour vous connecter ou vous inscrire'); ?>
                            </a>
                        </div>  
                    </div>
                </div>
            </div>                                  
        <?php endif; ?>
    </div>
</main>
