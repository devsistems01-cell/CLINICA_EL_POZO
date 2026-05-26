<div class="card" style="max-width: 720px;">
    <h2><?= $record ? 'Editar expediente' : 'Nuevo expediente' ?></h2>
    <form method="post" action="<?= $action ?>">
        <label for="patient_id">Paciente</label>
        <select id="patient_id" name="patient_id" required>
            <option value="">Seleccione un paciente</option>
            <?php foreach ($patients as $patient): ?>
                <option value="<?= $patient['id'] ?>" <?= $record && $record['patient_id'] == $patient['id'] ? 'selected' : '' ?>><?= htmlspecialchars($patient['name']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="record_date">Fecha</label>
        <input type="date" id="record_date" name="record_date" value="<?= htmlspecialchars($record['record_date'] ?? date('Y-m-d')) ?>" required>

        <label for="diagnosis">Diagnóstico</label>
        <textarea id="diagnosis" name="diagnosis" rows="3"><?= htmlspecialchars($record['diagnosis'] ?? '') ?></textarea>

        <label for="treatment">Tratamiento</label>
        <textarea id="treatment" name="treatment" rows="3"><?= htmlspecialchars($record['treatment'] ?? '') ?></textarea>

        <label for="notes">Notas</label>
        <textarea id="notes" name="notes" rows="4"><?= htmlspecialchars($record['notes'] ?? '') ?></textarea>

        <button type="submit" class="btn btn-primary" style="margin-top: 16px;">Guardar</button>
    </form>
</div>