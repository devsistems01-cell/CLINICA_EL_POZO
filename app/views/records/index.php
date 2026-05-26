<div class="card">
    <h2>Expedientes Clínicos</h2>
    <a href="/records/create" class="btn btn-primary">Nuevo expediente</a>
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Diagnóstico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <td><?= htmlspecialchars($record['patient_name']) ?></td>
                    <td><?= htmlspecialchars($record['record_date']) ?></td>
                    <td><?= htmlspecialchars($record['diagnosis']) ?></td>
                    <td>
                        <a class="btn btn-secondary" href="/records/edit?id=<?= $record['id'] ?>">Editar</a>
                        <a class="btn btn-danger" href="/records/delete?id=<?= $record['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>