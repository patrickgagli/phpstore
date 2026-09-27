<main>
    <div class="bs-docs-section">
        <div class="container">
            <div class="row justify-content-center mt-3 mb-5">
                <div class="col-lg-8">
                    <h1 class="text-center">Profil</h1>
                    <div class="card mb-3">
                        <h3 class="card-header">Bienvenue, <?php echo htmlspecialchars($user->full_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                        <div class="card-body">
                            <h5 class="card-title">Informations du Profil</h5>
                            <h6 class="card-subtitle text-muted"><strong>Email:</strong> <?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></h6>
                            <h6 class="card-subtitle text-muted"><strong>Role:</strong> <?php echo htmlspecialchars($user->role, ENT_QUOTES, 'UTF-8'); ?></h6>
                        </div>

                        <div class="card-body">
                            <p class="card-text"></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></li>
                            <li class="list-group-item"><strong>Role:</strong> <?php echo htmlspecialchars($user->role, ENT_QUOTES, 'UTF-8'); ?></li>
                            <li class="list-group-item"></li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link"></a>
                            <a href="#" class="card-link"></a>
                        </div>
                        <div class="card-footer text-muted"></div>
                            <a href="#" class="card-link">Modifier le Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</main>