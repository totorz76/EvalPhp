<h2>Ajouter un nouveau plat</h2>

<?php if (!empty($errors['sql'])): ?>
    <p><?= htmlspecialchars($errors['sql']) ?></p>
<?php endif; ?>

<form method="POST" action="">
    <!-- Cuisinier connecté (affichage uniquement) -->
    <p>
        <strong>Cuisinier :</strong>
        <?= htmlspecialchars($_SESSION['cuisinier_nom']) ?>
    </p>

    <!-- Nom du plat -->
    <div>
        <label for="nom">Nom :</label>
        <input
            type="text"
            id="nom"
            name="nom"
            value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
            required
            minlength="3"
        >
        <?php if (!empty($errors['nom'])): ?>
            <p><?= htmlspecialchars($errors['nom']) ?></p>
        <?php endif; ?>
    </div>

    <!-- Type (Catégorie) -->
    <div>
        <label for="type_id">Type :</label>
        <select id="type_id" name="type_id" required>
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
            <p><?= htmlspecialchars($errors['type']) ?></p>
        <?php endif; ?>
    </div>

    <!-- Description -->
    <div>
        <label for="description">Description :</label>
        <textarea
            id="description"
            name="description"
            required
            minlength="3"
        ><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
        <?php if (!empty($errors['description'])): ?>
            <p><?= htmlspecialchars($errors['description']) ?></p>
        <?php endif; ?>
    </div>

    <button type="submit">Ajouter le plat</button>
</form>
