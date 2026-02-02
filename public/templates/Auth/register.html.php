<h1>Inscription Cuisinier</h1>

<?php if(!empty($errors)): ?>
    <ul>
        <?php foreach($errors as $err): ?>
            <li><?= htmlspecialchars($err) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" required>
    </div>

    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
    </div>

    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <label for="avatar">Avatar :</label>
        <input type="file" id="avatar" name="avatar" accept=".jpg,.jpeg,.png,.webp">
    </div>

    <div>
        <label for="specialite">Spécialité :</label>
        <input type="text" id="specialite" name="specialite" value="<?= htmlspecialchars($_POST['specialite'] ?? '') ?>">
    </div>

    <button type="submit">S’inscrire</button>
</form>
