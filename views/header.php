<!DOCTYPE html>
<html>
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Patrick GAGLI">
    <meta name="keywords" content="MINI-CHAT, BLOG/NEWS, ACHAT DE MATERIELS">
    <meta name="description" content="plateforme pour échanger et découvrir du contenu intéressant, trouver des informations et acheter des materiels">
    <!-- title -->
    <title>Php Store</title>
    <!-- Favicon -->
    <link href="/../assets/img/favicon.ico" rel="icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap Theme Darkly Css -->
    <link rel="stylesheet" href="/../assets/css/bootstrap.css">
    <link rel="stylesheet" href="/../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/../assets/css/prism-okaidia.css">
    <link rel="stylesheet" href="/../assets/css/custom.min.css">
    <link rel="stylesheet" href="/../assets/css/style.css">
</head>
<body>
    <header>
        <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
            <div class="container">
                <a href="/../index.php" class="navbar-brand">PHP STORE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="?route=home">
                                <i class="bi bi-house-fill"></i>
                                Accueil
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?route=blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?route=shop">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?route=chat">Chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?route=contact">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-md-auto">
                        <?php if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?route=basket" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Voir Panier">
                                    <i class="bi bi-cart4"></i>
                                    <span class="badge rounded-circle bg-danger" style="position: relative; top: -10px; right: 10px;" id="basket-length">
                                        <?php if (count($_SESSION['basket']) != 0): ?>
                                            <?php echo count($_SESSION['basket']); ?>
                                        <?php endif; ?>
                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <?php if ($_SESSION['user_role'] == 'admin'): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?route=admin"><i class="bi bi-person-circle"></i>Admin</a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="?route=profile" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Voir Profil"><i class="bi bi-person-circle"></i> Profil</a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?route=logout" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Vous deconnecter">
                                    <i class="bi bi-box-arrow-in-left"></i>
                                    Logout
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?route=login" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Vous connecter">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                    Login
                                </a>
                            </li>
                        <?php endif; ?>            
                    </ul>
                </div>
            </div>
        </div>
    </header>