<?php

class MedicalRecord extends Model
{
    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT r.*, p.name AS patient_name FROM medical_records r LEFT JOIN patients p ON p.id = r.patient_id ORDER BY r.record_date DESC');
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM medical_records WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare('INSERT INTO medical_records (patient_id, record_date, diagnosis, treatment, notes, created_at) VALUES (?, ?, ?, ?, ?, NOW())');
        $stmt->execute([$data['patient_id'], $data['record_date'], $data['diagnosis'], $data['treatment'], $data['notes']]);
    }

    public function update($id, array $data): void
    {
        $stmt = $this->db->prepare('UPDATE medical_records SET patient_id = ?, record_date = ?, diagnosis = ?, treatment = ?, notes = ? WHERE id = ?');
        $stmt->execute([$data['patient_id'], $data['record_date'], $data['diagnosis'], $data['treatment'], $data['notes'], $id]);
    }

    public function delete($id): void
    {
        $stmt = $this->db->prepare('DELETE FROM medical_records WHERE id = ?');
        $stmt->execute([$id]);
    }
}
