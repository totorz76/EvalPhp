<a href="?page=AddPlats">Ajouter un plat</a>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Description</th>
            <th>Cuisinier</th>
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
                    <a href="?page=EditPlats&id=<?= $plat['id'] ?>">Modifier</a>
                    <a href="?page=DeletePlats&id=<?= $plat['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>