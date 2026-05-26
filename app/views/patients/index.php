<div class="card">
    <h2>Pacientes</h2>
    <a href="/patients/create" class="btn btn-primary">Registrar paciente</a>
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Fecha de nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?= htmlspecialchars($patient['name']) ?></td>
                    <td><?= htmlspecialchars($patient['email']) ?></td>
                    <td><?= htmlspecialchars($patient['phone']) ?></td>
                    <td><?= htmlspecialchars($patient['birthdate']) ?></td>
                    <td>
                        <a class="btn btn-secondary" href="/patients/edit?id=<?= $patient['id'] ?>">Editar</a>
                        <a class="btn btn-danger" href="/patients/delete?id=<?= $patient['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>