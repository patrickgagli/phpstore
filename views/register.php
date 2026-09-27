<main>
    <div class="bs-docs-section">
        <div class="container">
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-md-6">
                    <?php if (!empty($error)): ?>
                        <p style='color: red;'><?php echo htmlspecialchars($error); ?></p>
                    <?php endif; ?>
                    <form method="post" action="">
                        <fieldset>
                            <legend>Créer un Compte</legend>
                            <div class="form-group">
                                <label for="inputDefault" class="form-label mt-4">Nom Complet</label>
                                <input type="text" class="form-control" id="inputDefault" name="full_name"  placeholder="Vos Prénom et Nom" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label mt-4">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Votre Email" required>
                                <small id="emailHelp" class="form-text text-muted">Entrer un email valide.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label mt-4">Mot de Passe</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Votre Mot de Passe" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label mt-4">Mot de Passe</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password2" placeholder="Confirmer Mot de Passe" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </fieldset>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small text-danger" href="?route=login">Déja un compte? Vous connecter!</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</main>




