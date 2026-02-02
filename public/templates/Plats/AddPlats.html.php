<h2>Ajouter un nouveau plat</h2>

<?php if (!empty($errors['sql'])): ?>
    <p><?= htmlspecialchars($errors['sql']) ?></p>
<?php endif; ?>

<form method="POST" action="">
    <!-- Nom du plat -->
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" 
               value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" 
               required minlength="3">
        <?php if (!empty($errors['nom'])): ?>
            <p><?= $errors['nom'] ?></p>
        <?php endif; ?>
    </div>

    <!-- Type (Catégorie) -->
    <div>
        <label for="type_id">Type :</label>
        <select id="type_id" name="type_id" required>
            <option value="">-- Choisir --</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie['id'] ?>" 
                    <?= (($_POST['type_id'] ?? '') == $categorie['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($categorie['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['type'])): ?>
            <p><?= $errors['type'] ?></p>
        <?php endif; ?>
    </div>

    <!-- Description -->
    <div>
        <label for="description">Description :</label>
        <textarea id="description" name="description" required minlength="3"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
        <?php if (!empty($errors['description'])): ?>
            <p><?= $errors['description'] ?></p>
        <?php endif; ?>
    </div>

    <!-- Cuisinier -->
    <div>
        <label for="cuisinier_id">Cuisinier :</label>
        <select id="cuisinier_id" name="cuisinier_id" required>
            <option value="">-- Choisir --</option>
            <?php foreach ($cuisiniers as $cuisinier): ?>
                <option value="<?= $cuisinier['id'] ?>" 
                    <?= (($_POST['cuisinier_id'] ?? '') == $cuisinier['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cuisinier['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['cuisinier'])): ?>
            <p><?= $errors['cuisinier'] ?></p>
        <?php endif; ?>
    </div>

    <button type="submit">Ajouter le plat</button>
</form>
