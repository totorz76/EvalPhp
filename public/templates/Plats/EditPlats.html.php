<h1>Modifier le plat</h1>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <div>
        <label for="nom">Nom du plat</label>
        <input
            type="text"
            id="nom"
            name="nom"
            required
            minlength="3"
            value="<?= htmlspecialchars($plat['nom']) ?>"
        >
    </div>

    <div>
        <label for="type_id">Type</label>
        <select name="type_id" id="type_id" required>
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

    <div>
        <label for="description">Description</label>
        <textarea
            name="description"
            id="description"
            rows="5"
            required
        ><?= htmlspecialchars($plat['description']) ?></textarea>
    </div>

    <!-- sécurité : cuisinier_id vient de la session, pas d'un input -->
    <button type="submit">Mettre à jour</button>
</form>

<a href="?page=ListPlats">Retour à la liste</a>
