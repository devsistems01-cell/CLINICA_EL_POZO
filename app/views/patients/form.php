<div class="card" style="max-width: 720px;">
    <h2><?= $patient ? 'Editar paciente' : 'Nuevo paciente' ?></h2>
    <form method="post" action="<?= $action ?>">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($patient['name'] ?? '') ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($patient['email'] ?? '') ?>">

        <label for="phone">Teléfono</label>
        <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($patient['phone'] ?? '') ?>">

        <label for="birthdate">Fecha de nacimiento</label>
        <input type="date" id="birthdate" name="birthdate" value="<?= htmlspecialchars($patient['birthdate'] ?? '') ?>">

        <label for="notes">Notas</label>
        <textarea id="notes" name="notes" rows="4"><?= htmlspecialchars($patient['notes'] ?? '') ?></textarea>

        <button type="submit" class="btn btn-primary" style="margin-top: 16px;">Guardar</button>
    </form>
</div>