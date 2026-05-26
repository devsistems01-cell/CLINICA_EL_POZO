<?php

class Patient extends Model
{
    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM patients ORDER BY name');
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM patients WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare('INSERT INTO patients (name, email, phone, birthdate, notes, created_at) VALUES (?, ?, ?, ?, ?, NOW())');
        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['birthdate'], $data['notes']]);
    }

    public function update($id, array $data): void
    {
        $stmt = $this->db->prepare('UPDATE patients SET name = ?, email = ?, phone = ?, birthdate = ?, notes = ? WHERE id = ?');
        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['birthdate'], $data['notes'], $id]);
    }

    public function delete($id): void
    {
        $stmt = $this->db->prepare('DELETE FROM patients WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function countAll(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM patients')->fetchColumn();
    }
}
