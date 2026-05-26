# Clínica El Pozo - Sistema de Administración

Sistema PHP para farmacia y consultorio médico con módulos de:
- Gestión de citas
- Inventario de medicamentos y productos
- Expedientes clínicos
- Reportes estratégicos

## Requisitos
- PHP 8+
- MySQL/MariaDB
- Servidor web Apache o PHP Built-in

## Instalación
1. Configurar `config/database.php` con tus credenciales.
2. Crear la base de datos y las tablas usando `database.sql`.
3. Iniciar el servidor desde la carpeta del proyecto:
   - `php -S localhost:8000 -t public`
4. Abrir `http://localhost:8000/login`

## Usuario inicial
La tabla `users` incluye un usuario administrador generado por el script SQL.

- Email: `admin@clinica.local`
- Contraseña: `admin123`
- Rol: `admin`

## Estructura
- `public/` - Front controller
- `app/controllers/` - Lógica de controladores
- `app/models/` - Modelos de datos
- `app/views/` - Vistas y plantillas
- `config/` - Configuración de base de datos

## Módulos
- `Pacientes`
- `Citas`
- `Inventario`
- `Expedientes clínicos`
- `Reportes`
