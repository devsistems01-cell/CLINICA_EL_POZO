<?php

class InventoryController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $items = (new InventoryItem())->getAll();
        $this->view('inventory/index', [
            'items' => $items,
            'message' => flash('success'),
        ]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $this->view('inventory/form', [
            'item' => null,
            'action' => '/inventory/create',
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();
        (new InventoryItem())->create([
            'name' => trim($_POST['name']),
            'stock' => intval($_POST['stock']),
            'price' => floatval($_POST['price']),
            'category' => trim($_POST['category']),
        ]);
        flash('success', 'Producto agregado al inventario.');
        $this->redirect('/inventory');
    }

    public function edit(): void
    {
        $this->requireLogin();
        $item = (new InventoryItem())->find($_GET['id'] ?? null);
        $this->view('inventory/form', [
            'item' => $item,
            'action' => '/inventory/edit?id=' . ($_GET['id'] ?? null),
        ]);
    }

    public function update(): void
    {
        $this->requireLogin();
        (new InventoryItem())->update($_GET['id'] ?? null, [
            'name' => trim($_POST['name']),
            'stock' => intval($_POST['stock']),
            'price' => floatval($_POST['price']),
            'category' => trim($_POST['category']),
        ]);
        flash('success', 'Producto actualizado.');
        $this->redirect('/inventory');
    }

    public function delete(): void
    {
        $this->requireLogin();
        (new InventoryItem())->delete($_GET['id'] ?? null);
        flash('success', 'Producto eliminado.');
        $this->redirect('/inventory');
    }
}
