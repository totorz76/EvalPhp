<main class="container my-5" style="max-width: 450px;">
    <h2 class="mb-4">Connexion</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="needs-validation" novalidate>
        <!-- CSRF token -->
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                required
            >
        </div>

        <!-- Mot de passe -->
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                required
            >
        </div>

        <!-- Bouton submit -->
        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>

    <p class="mt-3 text-center">
        Vous n'avez pas encore de compte ? 
        <a href="?page=Register">S'inscrire</a>
    </p>
</main>
