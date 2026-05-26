<?php
session_start();

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/config/database.php';
require BASE_PATH . '/app/helpers/functions.php';
require BASE_PATH . '/app/Core/Router.php';
require BASE_PATH . '/app/Core/Controller.php';
require BASE_PATH . '/app/Core/Model.php';
require BASE_PATH . '/app/Core/View.php';

require BASE_PATH . '/app/models/User.php';
require BASE_PATH . '/app/models/Patient.php';
require BASE_PATH . '/app/models/Appointment.php';
require BASE_PATH . '/app/models/InventoryItem.php';
require BASE_PATH . '/app/models/MedicalRecord.php';

require BASE_PATH . '/app/controllers/AuthController.php';
require BASE_PATH . '/app/controllers/DashboardController.php';
require BASE_PATH . '/app/controllers/UserController.php';
require BASE_PATH . '/app/controllers/AppointmentController.php';
require BASE_PATH . '/app/controllers/InventoryController.php';
require BASE_PATH . '/app/controllers/PatientController.php';
require BASE_PATH . '/app/controllers/RecordController.php';
require BASE_PATH . '/app/controllers/ReportController.php';

$router = new Router();

$router->get('/', 'DashboardController@index');
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@loginPost');
$router->get('/logout', 'AuthController@logout');

$router->get('/dashboard', 'DashboardController@index');

$router->get('/appointments', 'AppointmentController@index');
$router->get('/appointments/create', 'AppointmentController@create');
$router->post('/appointments/create', 'AppointmentController@store');
$router->get('/appointments/edit', 'AppointmentController@edit');
$router->post('/appointments/edit', 'AppointmentController@update');
$router->get('/appointments/delete', 'AppointmentController@delete');

$router->get('/inventory', 'InventoryController@index');
$router->get('/inventory/create', 'InventoryController@create');
$router->post('/inventory/create', 'InventoryController@store');
$router->get('/inventory/edit', 'InventoryController@edit');
$router->post('/inventory/edit', 'InventoryController@update');
$router->get('/inventory/delete', 'InventoryController@delete');

$router->get('/patients', 'PatientController@index');
$router->get('/patients/create', 'PatientController@create');
$router->post('/patients/create', 'PatientController@store');
$router->get('/patients/edit', 'PatientController@edit');
$router->post('/patients/edit', 'PatientController@update');
$router->get('/patients/delete', 'PatientController@delete');

$router->get('/users', 'UserController@index');
$router->get('/users/create', 'UserController@create');
$router->post('/users/create', 'UserController@store');
$router->get('/users/edit', 'UserController@edit');
$router->post('/users/edit', 'UserController@update');
$router->get('/users/delete', 'UserController@delete');

$router->get('/records', 'RecordController@index');
$router->get('/records/create', 'RecordController@create');
$router->post('/records/create', 'RecordController@store');
$router->get('/records/edit', 'RecordController@edit');
$router->post('/records/edit', 'RecordController@update');
$router->get('/records/delete', 'RecordController@delete');

$router->get('/reports', 'ReportController@index');

$router->dispatch();
