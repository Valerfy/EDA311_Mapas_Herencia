<?php
declare(strict_types=1);

require_once __DIR__ . '/models/Persona.php';
require_once __DIR__ . '/models/Estudiante.php';
require_once __DIR__ . '/models/MapaEstudiantes.php';
require_once __DIR__ . '/controllers/EstudianteController.php';

$controlador = new EstudianteController();
$accion = $_GET['accion'] ?? 'formulario';

if ($accion === 'estudiantes') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controlador->registrar();
    } elseif (isset($_GET['codigo'])) {
        $controlador->ver((string) $_GET['codigo']);
    } else {
        $controlador->listar();
    }
} else {
    $controlador->formulario();
}
