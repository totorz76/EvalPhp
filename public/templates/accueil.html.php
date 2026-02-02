<h1>Bienvenue à la Bonne Blanquette</h1>
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
                <td><?= $plat['nom'] ?></td>
                <td><?= $plat['type'] ?></td>
                <td><?= $plat['description'] ?></td>
                <td><?= $plat['cuisinier'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>