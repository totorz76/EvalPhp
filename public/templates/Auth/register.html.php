<main class="container my-5" style="max-width: 500px;">
    <h2 class="mb-4">Inscription Cuisinier</h2>

    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <!-- CSRF token -->
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <!-- Nom -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input 
                type="text" 
                id="nom" 
                name="nom" 
                class="form-control" 
                value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" 
                required
            >
        </div>

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
            <div class="form-text">
                Minimum 8 caractères.
            </div>
        </div>

        <!-- Avatar -->
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input 
                type="file" 
                id="avatar" 
                name="avatar" 
                class="form-control" 
                accept=".jpg,.jpeg,.png,.webp"
            >
        </div>

        <!-- Spécialité -->
        <div class="mb-3">
            <label for="specialite" class="form-label">Spécialité</label>
            <input 
                type="text" 
                id="specialite" 
                name="specialite" 
                class="form-control" 
                value="<?= htmlspecialchars($_POST['specialite'] ?? '') ?>"
            >
        </div>

        <!-- Bouton submit -->
        <button type="submit" class="btn btn-primary w-100">S’inscrire</button>
    </form>

    <p class="mt-3 text-center">
        Déjà inscrit ? <a href="?page=Login">Se connecter</a>
    </p>
</main>
