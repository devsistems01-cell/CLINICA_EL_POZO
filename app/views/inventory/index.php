<div class="card">
    <h2>Inventario</h2>
    <a href="/inventory/create" class="btn btn-primary">Agregar producto</a>
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= htmlspecialchars($item['category']) ?></td>
                    <td><?= htmlspecialchars($item['stock']) ?></td>
                    <td>$<?= number_format($item['price'], 2) ?></td>
                    <td>
                        <a class="btn btn-secondary" href="/inventory/edit?id=<?= $item['id'] ?>">Editar</a>
                        <a class="btn btn-danger" href="/inventory/delete?id=<?= $item['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>