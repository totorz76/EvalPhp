<main class="container my-5">
    <h1 class="mb-4 text-center">Bienvenue à la Bonne Blanquette</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
