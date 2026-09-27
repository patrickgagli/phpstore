<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?route=home"><i class="bi bi-house-fill"></i>Accueil</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Contact</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center text-muted">Veuillez remplir le formulaire</p>
                </div>
            </div>
        </div>
        <!-- Contact form -->
        <div class="container">
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-lg-6">
                    <?php if (!empty($error)): ?>
                        <p style='color: red;'><?php echo htmlspecialchars($error); ?></p>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['contact_created']) && $_SESSION['contact_created']): ?>
                        <p style='color: blue;'>Votre message a été bien envoyé</p>
                        <?php unset($_SESSION['contact_created']); ?>
                    <?php endif; ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="email-help">
                            <div id="name-help" class="form-text">Votre Nom Complet.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
                            <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Votre message</label>
                            <textarea class="form-control" placeholder="Exprimez vous" id="message" name="message"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="screenshot" class="form-label">Votre capture d'écran</label>
                            <input type="file" class="form-control" id="screenshot" name="screenshot" />
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</main>
