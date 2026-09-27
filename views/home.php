<main>
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Accueil</h1>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-info text-center">Bienvenue sur notre site web</h2>
                    <p class="text-muted text-center">
                        La destination privilégiée pour des services diversifiés et de qualité.<br>  
                        Vous trouverez ici tout ce dont vous avez besoin pour satisfaire vos envies et besoins numériques.<br>
                        Découvrez nos services et produits, et rejoignez notre communauté dès aujourd'hui.<br>
                        Que vous soyez un utilisateur membre (UM) ou non-membre (UNM), vous êtes les bienvenus.<br>
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <h2>Nos Services</em></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <strong>Blog/News</strong>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Restez informé des dernières nouvelles et tendances grâce à notre blog. Des articles variés sur la technologie, les dernières innovations, et des conseils pratiques sont à votre disposition.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <strong>Vente de Matériels</strong>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    Découvrez notre espace de vente où nous proposons une large gamme de matériels informatiques, de livres, et hi-fi. Que vous soyez à la recherche d'un nouvel ordinateur, de périphériques, de livres ou d'accessoires, nous avons ce qu'il vous faut.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <strong>Mini-Chat</strong>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Discutez en temps réel avec d'autres utilisateurs dans notre mini-chat convivial. Partagez vos idées, posez des questions et faites connaissance avec des personnes partageant les mêmes intérêts.
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </div>
            </div>
        </div>

        <div class="container text-center">
            <div class="row mt-5 mb-5">
                <div class="col-lg-12">
                    <h4 class="text-success">Profil Utilisateur (UM)</h4>
                    <p class="text-muted">
                        Accédez et modifiez les informations de votre profil en toute simplicité.<br> 
                        Créer un nouveau chat et envoyez des messages à d'autres utilisateurs.
                    </p>
                    <p class="text-secondary">Et plus encore...</p>
                    <!-- UM -->
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <h3 class="card-header">Bienvenue sur notre site, <?php echo htmlspecialchars($user->full_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                        <!-- Cookie message -->
                        <?php print("<H4>$msg</H4>") ?>
                        <!--User profile information-->
                        <h6 class="card-subtitle text-muted"><strong>Email:</strong> <?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></h6>
                        <h6 class="card-subtitle text-muted"><strong>Pseudo:</strong> <?php echo htmlspecialchars($profile['pseudo'], ENT_QUOTES, 'UTF-8'); ?></h6>
                        <h6 class="card-subtitle text-muted"><strong>Adresse:</strong> <?php echo htmlspecialchars($profile['address'], ENT_QUOTES, 'UTF-8'); ?></h6>
                        <h6 class="card-subtitle text-muted"><strong>Code Postal:</strong> <?php echo htmlspecialchars($profile['postcode'], ENT_QUOTES, 'UTF-8'); ?></h6>
                        <h6 class="card-subtitle text-muted"><strong>Ville:</strong> <?php echo htmlspecialchars($profile['city'], ENT_QUOTES, 'UTF-8'); ?></h6>
                        <h6 class="card-subtitle text-muted"><strong>Date de Naissance:</strong> <?php echo htmlspecialchars($profile['dob'], ENT_QUOTES, 'UTF-8'); ?></h6>
                    <!--UNM-->
                    <?php else: ?>
                        <p class="text-danger"><?php echo htmlspecialchars('Accès réservé aux membres'); ?></p>
                        <a href="#myModal" role="button" class="btn btn-dark" data-bs-toggle="modal">
                            <?php echo htmlspecialchars('Cliquez ici pour vous connecter ou vous inscrire'); ?>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Connexion / Inscription pour accéder aux fonctionnalités.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <div class="d-grid gap-2 auth">
                                                <button class="btn btn-lg btn-primary" type="button"><a href="index.php?route=login"><?php echo htmlspecialchars('Vous Connecter'); ?></a></button>
                                                <button class="btn btn-lg btn-primary" type="button"><a href="index.php?route=register"><?php echo htmlspecialchars('Vous inscrire'); ?></a></button>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End modal -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main><br><br><br>

