<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?route=home"><i class="bi bi-house-fill"></i>Accueil</a></li>
                    <li class="breadcrumb-item"><a href="index.php?route=chat">Chat</a></li>
                    <li class="breadcrumb-item active"><?php if (!empty($chat)): ?><?php echo $chat['id']; ?><?php else: ?><p>Aucun Chat</p><?php endif; ?> </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <!-- Blog detail -->
        <div class="container">
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-lg-8">
                    <?php if (!empty($chat)): ?>
                        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto"><i class="bi bi-person-lines-fill"></i> <?php echo htmlspecialchars($chat['sender_pseudo']); ?></strong>
                                <small><?php echo $chat['created_at']; ?></small>
                            </div>
                            <div class="toast-body">
                                <?php echo $chat['message']; ?>
                            </div>
                        </div>    
                    <?php else: ?>
                        <p>Aucun Article!</p>
                    <?php endif; ?>
                </div>
                <br><div class="col-lg-4"></div>
            </div>
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-lg-8"></div><br>
                <div class="col-lg-4">
                    <strong class="me-auto text-muted"><i class="bi bi-person-bounding-box"></i> <?php echo htmlspecialchars($chat['receiver_pseudo']); ?></strong>
                    <p class="text-muted"><i class="bi bi-chat-right-dots-fill"></i> en train d'ecrire...</p>
                </div>
            </div>
        </div>  
    </div>
</main>

 
