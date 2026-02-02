<main class="container my-5">
    <h1 class="mb-4 text-center">Mon profil</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" id="email" name="email" class="form-control" 
                   value="<?= htmlspecialchars($cuisinier['email']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nouveau mot de passe (laisser vide si inchangé) :</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar :</label><br>
            <?php if (!empty($cuisinier['avatar'])): ?>
                <img src="<?= htmlspecialchars($cuisinier['avatar']) ?>" alt="Avatar" width="100" class="mb-2 rounded">
            <?php endif; ?>
            <input type="file" id="avatar" name="avatar" class="form-control" accept=".jpg,.jpeg,.png,.webp">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</main>

<!-- Optionnel : script de validation Bootstrap -->
<script>
    // Exemple simple pour validation client
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
