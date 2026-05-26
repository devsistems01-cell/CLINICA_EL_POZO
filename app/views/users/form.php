<div class="card" style="max-width: 720px;">
    <h2><?= $user ? 'Editar usuario' : 'Nuevo usuario' ?></h2>
    <form method="post" action="<?= $action ?>">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" <?= $user ? '' : 'required' ?> placeholder="<?= $user ? 'Dejar en blanco para mantener contraseña' : '' ?>">

        <label for="role">Rol</label>
        <select id="role" name="role" required>
            <?php foreach (['admin' => 'Administrador', 'user' => 'Médico/Recepción'] as $value => $label): ?>
                <option value="<?= $value ?>" <?= ($user['role'] ?? 'user') === $value ? 'selected' : '' ?>><?= $label ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn btn-primary" style="margin-top: 16px;">Guardar</button>
    </form>
</div>