<div class="card">
    <h2>Citas</h2>
    <a href="/appointments/create" class="btn btn-primary">Nueva cita</a>
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= htmlspecialchars($appointment['patient_name']) ?></td>
                    <td><?= htmlspecialchars(formatDate($appointment['scheduled_at'])) ?></td>
                    <td><?= htmlspecialchars($appointment['status']) ?></td>
                    <td>
                        <a class="btn btn-secondary" href="/appointments/edit?id=<?= $appointment['id'] ?>">Editar</a>
                        <a class="btn btn-danger" href="/appointments/delete?id=<?= $appointment['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>