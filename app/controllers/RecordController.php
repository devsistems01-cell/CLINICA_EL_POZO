<?php

class RecordController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $records = (new MedicalRecord())->getAll();
        $patients = (new Patient())->getAll();
        $this->view('records/index', [
            'records' => $records,
            'patients' => $patients,
            'message' => flash('success'),
        ]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $patients = (new Patient())->getAll();
        $this->view('records/form', [
            'record' => null,
            'patients' => $patients,
            'action' => '/records/create',
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();
        (new MedicalRecord())->create([
            'patient_id' => $_POST['patient_id'],
            'record_date' => $_POST['record_date'],
            'diagnosis' => trim($_POST['diagnosis']),
            'treatment' => trim($_POST['treatment']),
            'notes' => trim($_POST['notes']),
        ]);
        flash('success', 'Expediente clínico guardado.');
        $this->redirect('/records');
    }

    public function edit(): void
    {
        $this->requireLogin();
        $record = (new MedicalRecord())->find($_GET['id'] ?? null);
        $patients = (new Patient())->getAll();
        $this->view('records/form', [
            'record' => $record,
            'patients' => $patients,
            'action' => '/records/edit?id=' . ($_GET['id'] ?? null),
        ]);
    }

    public function update(): void
    {
        $this->requireLogin();
        (new MedicalRecord())->update($_GET['id'] ?? null, [
            'patient_id' => $_POST['patient_id'],
            'record_date' => $_POST['record_date'],
            'diagnosis' => trim($_POST['diagnosis']),
            'treatment' => trim($_POST['treatment']),
            'notes' => trim($_POST['notes']),
        ]);
        flash('success', 'Expediente actualizado.');
        $this->redirect('/records');
    }

    public function delete(): void
    {
        $this->requireLogin();
        (new MedicalRecord())->delete($_GET['id'] ?? null);
        flash('success', 'Expediente eliminado.');
        $this->redirect('/records');
    }
}
