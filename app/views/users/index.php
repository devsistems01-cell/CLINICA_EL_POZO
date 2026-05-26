<div class="card">
    <h2>Usuarios</h2>
    <a href="/users/create" class="btn btn-primary">Nuevo usuario</a>
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                    <td>
                        <a class="btn btn-secondary" href="/users/edit?id=<?= $user['id'] ?>">Editar</a>
                        <a class="btn btn-danger" href="/users/delete?id=<?= $user['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>