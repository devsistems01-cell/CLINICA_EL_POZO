<?php

class User extends Model
{
    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM users ORDER BY name');
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(array $data): void
    {
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $this->db->prepare('INSERT INTO users (name, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())');
        $stmt->execute([$data['name'], $data['email'], $passwordHash, $data['role']]);
    }

    public function update($id, array $data): void
    {
        if (!empty($data['password'])) {
            $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
            $stmt = $this->db->prepare('UPDATE users SET name = ?, email = ?, password = ?, role = ? WHERE id = ?');
            $stmt->execute([$data['name'], $data['email'], $passwordHash, $data['role'], $id]);
        } else {
            $stmt = $this->db->prepare('UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?');
            $stmt->execute([$data['name'], $data['email'], $data['role'], $id]);
        }
    }

    public function delete($id): void
    {
        $stmt = $this->db->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function countAll(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM users')->fetchColumn();
    }
}
