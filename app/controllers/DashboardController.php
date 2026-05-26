<?php

class DashboardController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();

        $appointmentModel = new Appointment();
        $inventoryModel = new InventoryItem();
        $patientModel = new Patient();
        $userModel = new User();

        $this->view('dashboard/index', [
            'user' => authUser(),
            'appointments' => $appointmentModel->getUpcoming(5),
            'lowStock' => $inventoryModel->getLowStock(5),
            'patientCount' => $patientModel->countAll(),
            'userCount' => $userModel->countAll(),
            'categoryStats' => $inventoryModel->getProductsByCategory(6),
        ]);
    }
}
