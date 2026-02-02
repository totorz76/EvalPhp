<main class="container my-5">
    <h2>Modifier le plat</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" class="needs-validation" novalidate>
        <!-- CSRF -->
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <!-- Nom du plat -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du plat</label>
            <input
                type="text"
                id="nom"
                name="nom"
                class="form-control"
                required
                minlength="3"
                value="<?= htmlspecialchars($plat['nom']) ?>"
            >
        </div>

        <!-- Type -->
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select name="type_id" id="type_id" class="form-select" required>
                <option value="">-- Choisir --</option>
                <?php foreach ($categories as $categorie): ?>
                    <option
                        value="<?= $categorie['id'] ?>"
                        <?= $categorie['id'] == $plat['type_id'] ? 'selected' : '' ?>
                    >
                        <?= htmlspecialchars($categorie['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                name="description"
                id="description"
                rows="5"
                class="form-control"
                required
            ><?= htmlspecialchars($plat['description']) ?></textarea>
        </div>

        <!-- Bouton -->
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="?page=ListPlats" class="btn btn-secondary ms-2">Retour à la liste</a>
    </form>
</main>
