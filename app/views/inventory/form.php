<div class="card" style="max-width: 720px;">
    <h2><?= $item ? 'Editar producto' : 'Nuevo producto' ?></h2>
    <form method="post" action="<?= $action ?>">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($item['name'] ?? '') ?>" required>

        <label for="category">Categoría</label>
        <input type="text" id="category" name="category" value="<?= htmlspecialchars($item['category'] ?? '') ?>">

        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" value="<?= htmlspecialchars($item['stock'] ?? '0') ?>" required>

        <label for="price">Precio</label>
        <input type="number" step="0.01" id="price" name="price" value="<?= htmlspecialchars($item['price'] ?? '0.00') ?>" required>

        <button type="submit" class="btn btn-primary" style="margin-top: 16px;">Guardar</button>
    </form>
</div>