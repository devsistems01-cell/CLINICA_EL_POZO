<?php

class ReportController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();

        $appointmentModel = new Appointment();
        $inventoryModel = new InventoryItem();
        $userModel = new User();

        $this->view('reports/index', [
            'upcoming' => $appointmentModel->getUpcoming(10),
            'lowStock' => $inventoryModel->getLowStock(10),
            'categoryStats' => $inventoryModel->getProductsByCategory(8),
            'totalAppointments' => $appointmentModel->countAll(),
            'totalProducts' => $inventoryModel->countAll(),
            'totalUsers' => $userModel->countAll(),
        ]);
    }
}
