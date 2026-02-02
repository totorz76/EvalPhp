<h1>Mon profil</h1>

<?php if(!empty($errors)): ?>
    <ul>
        <?php foreach($errors as $err): ?>
            <li><?= htmlspecialchars($err) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($cuisinier['email']) ?>" required>
    </div>

    <div>
        <label for="password">Nouveau mot de passe (laisser vide si inchangé) :</label>
        <input type="password" id="password" name="password">
    </div>

    <div>
        <label for="avatar">Avatar :</label>
        <?php if(!empty($cuisinier['avatar'])): ?>
            <img src="<?= htmlspecialchars($cuisinier['avatar']) ?>" alt="Avatar" width="100">
        <?php endif; ?>
        <input type="file" id="avatar" name="avatar" accept=".jpg,.jpeg,.png,.webp">
    </div>

    <button type="submit">Mettre à jour</button>
</form>
