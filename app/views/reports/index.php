<div class="card">
    <h2>Reportes estratégicos</h2>
    <h3>Resumen</h3>
    <p><strong>Total citas:</strong> <?= $totalAppointments ?></p>
    <p><strong>Total productos en inventario:</strong> <?= $totalProducts ?></p>
    <p><strong>Total usuarios:</strong> <?= $totalUsers ?></p>
</div>

<div class="card">
    <h3>Productos por categoría</h3>
    <?php if (empty($categoryStats)): ?>
        <p>No hay datos de categorías.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Productos</th>
                    <th>Stock total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categoryStats as $category): ?>
                    <tr>
                        <td><?= htmlspecialchars($category['category']) ?></td>
                        <td><?= htmlspecialchars($category['total']) ?></td>
                        <td><?= htmlspecialchars($category['total_stock']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<div class="card">
    <h3>Próximas citas</h3>
    <?php if (empty($upcoming)): ?>
        <p>No hay próximas citas.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($upcoming as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['patient_name']) ?></td>
                        <td><?= htmlspecialchars(formatDate($item['scheduled_at'])) ?></td>
                        <td><?= htmlspecialchars($item['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<div class="card">
    <h3>Productos con bajo stock</h3>
    <?php if (empty($lowStock)): ?>
        <p>No hay productos en alerta de stock.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lowStock as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['stock']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>