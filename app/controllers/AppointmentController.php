<?php

class AppointmentController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $appointments = (new Appointment())->getAll();
        $patients = (new Patient())->getAll();

        $this->view('appointments/index', [
            'appointments' => $appointments,
            'patients' => $patients,
            'message' => flash('success'),
        ]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $patients = (new Patient())->getAll();
        $this->view('appointments/form', [
            'patients' => $patients,
            'action' => '/appointments/create',
            'appointment' => null,
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();
        $model = new Appointment();
        $model->create([
            'patient_id' => $_POST['patient_id'],
            'scheduled_at' => $_POST['scheduled_at'],
            'status' => $_POST['status'] ?: 'Programada',
            'notes' => $_POST['notes'],
        ]);
        flash('success', 'Cita creada correctamente.');
        $this->redirect('/appointments');
    }

    public function edit(): void
    {
        $this->requireLogin();
        $id = $_GET['id'] ?? null;
        $appointment = (new Appointment())->find($id);
        $patients = (new Patient())->getAll();
        $this->view('appointments/form', [
            'patients' => $patients,
            'appointment' => $appointment,
            'action' => '/appointments/edit?id=' . $id,
        ]);
    }

    public function update(): void
    {
        $this->requireLogin();
        $id = $_GET['id'] ?? null;
        $model = new Appointment();
        $model->update($id, [
            'patient_id' => $_POST['patient_id'],
            'scheduled_at' => $_POST['scheduled_at'],
            'status' => $_POST['status'],
            'notes' => $_POST['notes'],
        ]);
        flash('success', 'Cita actualizada correctamente.');
        $this->redirect('/appointments');
    }

    public function delete(): void
    {
        $this->requireLogin();
        $id = $_GET['id'] ?? null;
        (new Appointment())->delete($id);
        flash('success', 'Cita eliminada.');
        $this->redirect('/appointments');
    }
}
