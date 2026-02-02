<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>404 - Page introuvable</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/slate/bootstrap.css">
</head>
<body class="bg-dark text-light d-flex flex-column min-vh-100">

    <div class="container text-center my-auto">
        <h1 class="display-3">OUPSI !</h1>
        <p class="lead">La page que vous cherchez n'existe pas.</p>
        <a href="?page=home" class="btn btn-primary mt-3">Retour à l'accueil</a>
    </div>

    <footer class="mt-auto py-3 text-center bg-primary text-light">
        &copy; <?= date('Y') ?> La Bonne Blanquette
    </footer>

</body>
</html>
