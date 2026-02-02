<main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Mes plats</h2>
        <a href="?page=AddPlats" class="btn btn-primary">Ajouter un plat</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Cuisinier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($platsArray as $plat): ?>
                    <tr>
                        <td><?= htmlspecialchars($plat['nom']) ?></td>
                        <td><?= htmlspecialchars($plat['type']) ?></td>
                        <td><?= htmlspecialchars($plat['description']) ?></td>
                        <td><?= htmlspecialchars($plat['cuisinier']) ?></td>
                        <td>
                            <?php if ($plat['cuisinier_id'] == $_SESSION['cuisinier_id']): ?>
                                <a href="?page=EditPlats&id=<?= $plat['id'] ?>" class="btn btn-sm btn-warning me-1">Modifier</a>
                                <a href="?page=DeletePlats&id=<?= $plat['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce plat ?');">Supprimer</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
