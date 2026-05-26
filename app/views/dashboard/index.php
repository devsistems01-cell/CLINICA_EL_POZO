<div class="card">
    <h2>Bienvenido, <?= htmlspecialchars($user['name']) ?> </h2>
    <p>Panel de administración para citas, inventario, expedientes clínicos y reportes.</p>
</div>

<div class="card">
    <h3>Resumen rápido</h3>
    <p><strong>Total de pacientes:</strong> <?= $patientCount ?></p>
    <p><strong>Total de usuarios:</strong> <?= $userCount ?></p>
    <p><strong>Categorías en inventario:</strong></p>
    <?php if (empty($categoryStats)): ?>
        <p>No hay categorías registradas.</p>
    <?php else: ?>
        <div style="display:grid; gap:12px;">
            <?php foreach ($categoryStats as $category): ?>
                <div style="padding:12px; border:1px solid #ddd; border-radius:8px; background:#f9f9f9;">
                    <strong><?= htmlspecialchars($category['category']) ?></strong>
                    <p><?= $category['total'] ?> productos · <?= $category['total_stock'] ?> unidades</p>
                    <div style="background:#e9ecef; border-radius:8px; height:12px; overflow:hidden;">
                        <div style="width:<?= min(100, max(10, $category['total_stock'])) ?>%; background:#0d6efd; height:100%;"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<div class="card">
    <h3>Próximas citas</h3>
    <?php if (empty($appointments)): ?>
        <p>No hay citas próximas.</p>
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
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?= htmlspecialchars($appointment['patient_name']) ?></td>
                        <td><?= htmlspecialchars(formatDate($appointment['scheduled_at'])) ?></td>
                        <td><?= htmlspecialchars($appointment['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<div class="card">
    <h3>Productos con bajo stock</h3>
    <?php if (empty($lowStock)): ?>
        <p>No hay productos con bajo stock.</p>
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