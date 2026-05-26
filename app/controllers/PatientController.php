<?php

class PatientController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $patients = (new Patient())->getAll();
        $this->view('patients/index', [
            'patients' => $patients,
            'message' => flash('success'),
        ]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $this->view('patients/form', [
            'patient' => null,
            'action' => '/patients/create',
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();
        (new Patient())->create([
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'phone' => trim($_POST['phone']),
            'birthdate' => $_POST['birthdate'],
            'notes' => $_POST['notes'],
        ]);
        flash('success', 'Paciente registrado correctamente.');
        $this->redirect('/patients');
    }

    public function edit(): void
    {
        $this->requireLogin();
        $patient = (new Patient())->find($_GET['id'] ?? null);
        $this->view('patients/form', [
            'patient' => $patient,
            'action' => '/patients/edit?id=' . ($_GET['id'] ?? null),
        ]);
    }

    public function update(): void
    {
        $this->requireLogin();
        (new Patient())->update($_GET['id'] ?? null, [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'phone' => trim($_POST['phone']),
            'birthdate' => $_POST['birthdate'],
            'notes' => $_POST['notes'],
        ]);
        flash('success', 'Paciente actualizado.');
        $this->redirect('/patients');
    }

    public function delete(): void
    {
        $this->requireLogin();
        (new Patient())->delete($_GET['id'] ?? null);
        flash('success', 'Paciente eliminado.');
        $this->redirect('/patients');
    }
}
