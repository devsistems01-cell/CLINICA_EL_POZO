<div class="card" style="max-width: 720px;">
    <h2><?= $appointment ? 'Editar cita' : 'Nueva cita' ?></h2>
    <form method="post" action="<?= $action ?>">
        <label for="patient_id">Paciente</label>
        <select id="patient_id" name="patient_id" required>
            <option value="">Seleccione un paciente</option>
            <?php foreach ($patients as $patient): ?>
                <option value="<?= $patient['id'] ?>" <?= $appointment && $appointment['patient_id'] == $patient['id'] ? 'selected' : '' ?>><?= htmlspecialchars($patient['name']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="scheduled_at">Fecha y hora</label>
        <input type="datetime-local" id="scheduled_at" name="scheduled_at" value="<?= isset($appointment['scheduled_at']) ? str_replace(' ', 'T', $appointment['scheduled_at']) : '' ?>" required>

        <label for="status">Estado</label>
        <select id="status" name="status">
            <?php foreach (['Programada', 'Confirmada', 'Atendida', 'Cancelada'] as $status): ?>
                <option value="<?= $status ?>" <?= $appointment && $appointment['status'] === $status ? 'selected' : '' ?>><?= $status ?></option>
            <?php endforeach; ?>
        </select>

        <label for="notes">Notas</label>
        <textarea id="notes" name="notes" rows="4"><?= htmlspecialchars($appointment['notes'] ?? '') ?></textarea>

        <button type="submit" class="btn btn-primary" style="margin-top: 16px;">Guardar</button>
    </form>
</div>