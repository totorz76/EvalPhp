<main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Ajouter un nouveau plat</h2>
    </div>

    <?php if (!empty($errors['sql'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($errors['sql']) ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="needs-validation" novalidate>
        <!-- CSRF -->
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <!-- Cuisinier connecté -->
        <p><strong>Cuisinier :</strong> <?= htmlspecialchars($_SESSION['cuisinier_nom']) ?></p>

        <!-- Nom du plat -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du plat</label>
            <input
                type="text"
                id="nom"
                name="nom"
                class="form-control"
                value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
                required
                minlength="3"
            >
            <?php if (!empty($errors['nom'])): ?>
                <div class="text-danger mt-1"><?= htmlspecialchars($errors['nom']) ?></div>
            <?php endif; ?>
        </div>

        <!-- Type / Catégorie -->
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select id="type_id" name="type_id" class="form-select" required>
                <option value="">-- Choisir --</option>
                <?php foreach ($categories as $categorie): ?>
                    <option
                        value="<?= $categorie['id'] ?>"
                        <?= (($_POST['type_id'] ?? '') == $categorie['id']) ? 'selected' : '' ?>
                    >
                        <?= htmlspecialchars($categorie['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['type'])): ?>
                <div class="text-danger mt-1"><?= htmlspecialchars($errors['type']) ?></div>
            <?php endif; ?>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                id="description"
                name="description"
                class="form-control"
                required
                minlength="3"
                rows="5"
            ><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
            <?php if (!empty($errors['description'])): ?>
                <div class="text-danger mt-1"><?= htmlspecialchars($errors['description']) ?></div>
            <?php endif; ?>
        </div>

        <!-- Bouton -->
        <button type="submit" class="btn btn-primary">Ajouter le plat</button>
        <a href="?page=ListPlats" class="btn btn-secondary ms-2">Retour à la liste</a>
    </form>
</main>
