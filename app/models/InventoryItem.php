<?php

class InventoryItem extends Model
{
    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM inventory_items ORDER BY name');
        return $stmt->fetchAll();
    }

    public function getLowStock(int $limit = 5): array
    {
        $stmt = $this->db->prepare('SELECT * FROM inventory_items ORDER BY stock ASC LIMIT ?');
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM inventory_items WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare('INSERT INTO inventory_items (name, category, stock, price, created_at) VALUES (?, ?, ?, ?, NOW())');
        $stmt->execute([$data['name'], $data['category'], $data['stock'], $data['price']]);
    }

    public function update($id, array $data): void
    {
        $stmt = $this->db->prepare('UPDATE inventory_items SET name = ?, category = ?, stock = ?, price = ? WHERE id = ?');
        $stmt->execute([$data['name'], $data['category'], $data['stock'], $data['price'], $id]);
    }

    public function delete($id): void
    {
        $stmt = $this->db->prepare('DELETE FROM inventory_items WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function countAll(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM inventory_items')->fetchColumn();
    }

    public function getProductsByCategory(int $limit = 6): array
    {
        $stmt = $this->db->prepare('SELECT IFNULL(category, "Sin categoría") AS category, COUNT(*) AS total, SUM(stock) AS total_stock FROM inventory_items GROUP BY category ORDER BY total DESC LIMIT ?');
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
