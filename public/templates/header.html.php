<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon site cuisine</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/slate/bootstrap.css">
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- Logo / Nom du site -->
            <a class="navbar-brand" href="?page=home">LBB</a>

            <!-- Bouton hamburger pour mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Liens de navigation -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=home">Accueil</a>
                    </li>

                    <?php if (isset($_SESSION['cuisinier_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=ListPlats">Mes Plats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=Logout">Déconnexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=Login">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=Register">Inscription</a>
                        </li>
                    <?php endif; ?>
                </ul>

                <?php if (isset($_SESSION['cuisinier_id'])): ?>
                    <!-- Section utilisateur connecté à droite -->
                    <span class="navbar-text me-3">
                        Bonjour, <?= htmlspecialchars($_SESSION['cuisinier_nom']) ?>
                    </span>
                    <a class="btn btn-outline-light" href="?page=Profil">Profil</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

<!-- Pense à ajouter le script JS de Bootstrap à la fin du body pour le collapse -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <main>
        !