<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon site cuisine</title>
</head>
<body>
<header>
    <nav>
        <?php if(isset($_SESSION['cuisinier_id'])): ?>
            <span>Bonjour <?= htmlspecialchars($_SESSION['cuisinier_nom']) ?></span>
            <a href="?page=ListPlats">Plats</a>
            <?php else: ?>
                <a href="?page=Logout">Déconnexion</a>
            <a href="?page=Login">Connexion</a>
            <a href="?page=Register">Inscription</a>
        <?php endif; ?>
    </nav>
</header>
<main>
