<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica El Pozo - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
            color: #333;
        }

        header {
            background: #0d6efd;
            color: #fff;
            padding: 16px;
        }

        nav a {
            color: #fff;
            margin-right: 14px;
            text-decoration: none;
        }

        .container {
            max-width: 1100px;
            margin: 24px auto;
            padding: 0 16px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 18px;
            margin-bottom: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-primary {
            background: #0d6efd;
            color: #fff;
        }

        .btn-warning {
            background: #ffc107;
            color: #212529;
        }

        .btn-danger {
            background: #dc3545;
            color: #fff;
        }

        .btn-secondary {
            background: #6c757d;
            color: #fff;
        }

        .alert {
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 18px;
        }

        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
        }

        .alert-error {
            background: #f8d7da;
            color: #842029;
        }

        form label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        form input,
        form select,
        form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <span style="font-weight:bold;">Clínica El Pozo</span>
            <?php if (!empty(authUser())): ?>
                <nav style="float:right;">
                    <a href="/dashboard">Dashboard</a>
                    <a href="/patients">Pacientes</a>
                    <a href="/appointments">Citas</a>
                    <a href="/records">Expedientes</a>
                    <a href="/inventory">Inventario</a>
                    <a href="/reports">Reportes</a>
                    <?php if (authUser()['role'] === 'admin'): ?>
                        <a href="/users">Usuarios</a>
                    <?php endif; ?>
                    <a href="/logout">Salir</a>
                </nav>
            <?php endif; ?>
        </div>
    </header>
    <div class="container">
        <?= $content ?>
    </div>
</body>

</html>