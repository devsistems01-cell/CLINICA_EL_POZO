<?php

class Appointment extends Model
{
    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT a.*, p.name AS patient_name FROM appointments a LEFT JOIN patients p ON p.id = a.patient_id ORDER BY a.scheduled_at DESC');
        return $stmt->fetchAll();
    }

    public function getUpcoming(int $limit = 5): array
    {
        $stmt = $this->db->prepare('SELECT a.*, p.name AS patient_name FROM appointments a LEFT JOIN patients p ON p.id = a.patient_id WHERE a.scheduled_at >= NOW() ORDER BY a.scheduled_at ASC LIMIT ?');
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM appointments WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare('INSERT INTO appointments (patient_id, scheduled_at, status, notes, created_at) VALUES (?, ?, ?, ?, NOW())');
        $stmt->execute([$data['patient_id'], $data['scheduled_at'], $data['status'], $data['notes']]);
    }

    public function update($id, array $data): void
    {
        $stmt = $this->db->prepare('UPDATE appointments SET patient_id = ?, scheduled_at = ?, status = ?, notes = ? WHERE id = ?');
        $stmt->execute([$data['patient_id'], $data['scheduled_at'], $data['status'], $data['notes'], $id]);
    }

    public function delete($id): void
    {
        $stmt = $this->db->prepare('DELETE FROM appointments WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function countAll(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM appointments')->fetchColumn();
    }
}
