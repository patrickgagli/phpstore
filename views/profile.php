<main>
    <div class="bs-docs-section">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#profile" aria-selected="true" role="tab">Profil</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#orders" aria-selected="false" tabindex="-1" role="tab">Commandes</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#messages" aria-selected="false" tabindex="-1" role="tab">Messages</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                    <!-- Main content -->
                    <div class="container-fluid mb-5">
                        <div class="row">
                            <!-- sidebar nav tab -->
                            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                                <div class="sidebar-sticky">
                                    <img src="https://via.placeholder.com/200" class="img-fluid" alt="Profil Image">
                                    <br>
                                    <a class="alert-link" href="">Modifier la photo</a>
                                </div>
                            </nav>
                            <!-- End sidebar nav tab -->

                            <!-- main display -->
                            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2">Bienvenue, <?php echo htmlspecialchars($user->full_name, ENT_QUOTES, 'UTF-8'); ?></h1>
                                    <div class="btn-toolbar mb-2 mb-md-0">
                                        <div class="btn-group mr-2">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Partager</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Exporter</button>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                            Autres options
                                        </button>
                                    </div>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <!-- Profile -->
                                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Email</th>
                                                        <th>Pseudo</th>
                                                        <th>Adresse</th>
                                                        <th>Code Postal</th>
                                                        <th>Ville</th>
                                                        <th>Date de Naissance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($user->full_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($profile['pseudo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($profile['address'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($profile['postcode'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($profile['city'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($profile['dob'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <!-- Display a message if the profile has not been modified -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin'): ?>
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-primary form-control" href="{% url 'admin:index' %}">
                                                    <i class="bi bi-columns"></i>
                                                    Admin
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <!-- End profile -->
                                </div>
                            </main>
                            <!-- End main display -->
                        </div>
                    </div>
                    <!-- End main content -->
                </div>
                <div class="tab-pane fade" id="orders" role="tabpanel">
                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR.</p>
                </div>
                <div class="tab-pane fade" id="messages" role="tabpanel">
                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit.</p>
                </div>
            </div>
        </div>
    </div>
</main>
