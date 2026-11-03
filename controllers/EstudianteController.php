<?php
declare(strict_types=1);

class EstudianteController
{
    private MapaEstudiantes $mapa;

    public function __construct()
    {
        $this->mapa = new MapaEstudiantes(__DIR__ . '/../data/estudiantes.json');
    }

    public function formulario(): void
    {
        require __DIR__ . '/../views/formulario.php';
    }

    public function listar(): void
    {
        $estudiantes = array_map(fn(Estudiante $e) => $e->toArray(), $this->mapa->todos());
        $this->responder(200, ['exito' => true, 'total' => count($estudiantes), 'estudiantes' => $estudiantes]);
    }

    public function ver(string $codigo): void
    {
        $estudiante = $this->mapa->obtener($codigo);
        if ($estudiante === null) {
            $this->responder(404, ['exito' => false, 'mensaje' => 'Estudiante no encontrado.']);
            return;
        }
        $this->responder(200, ['exito' => true, 'estudiante' => $estudiante->toArray()]);
    }

    public function registrar(): void
    {
        $datos = [];
        foreach (['nombre', 'apellido', 'edad', 'codigo', 'carrera'] as $campo) {
            $datos[$campo] = trim((string) ($_POST[$campo] ?? ''));
        }

        $errores = $this->validar($datos);
        if (!empty($errores)) {
            $this->responder(400, ['exito' => false, 'mensaje' => 'Datos inválidos.', 'errores' => $errores]);
            return;
        }

        $estudiante = new Estudiante(
            $datos['nombre'],
            $datos['apellido'],
            (int) $datos['edad'],
            $datos['codigo'],
            $datos['carrera']
        );

        try {
            $this->mapa->agregar($estudiante);
        } catch (DomainException $e) {
            $this->responder(409, ['exito' => false, 'mensaje' => $e->getMessage()]);
            return;
        }

        $this->mapa->guardar();
        $this->responder(201, [
            'exito' => true,
            'mensaje' => 'Estudiante registrado correctamente.',
            'estudiante' => $estudiante->toArray(),
        ]);
    }

    private function validar(array $datos): array
    {
        $errores = [];

        if (!preg_match('/^[\p{L} ]{2,50}$/u', $datos['nombre'])) {
            $errores['nombre'] = 'El nombre es obligatorio, solo letras y espacios (2 a 50 caracteres).';
        }
        if (!preg_match('/^[\p{L} ]{2,50}$/u', $datos['apellido'])) {
            $errores['apellido'] = 'El apellido es obligatorio, solo letras y espacios (2 a 50 caracteres).';
        }
        if (!ctype_digit($datos['edad']) || (int) $datos['edad'] < 15 || (int) $datos['edad'] > 100) {
            $errores['edad'] = 'La edad es obligatoria y debe ser un número entero entre 15 y 100.';
        }
        if (!preg_match('/^[A-Za-z0-9-]{3,15}$/', $datos['codigo'])) {
            $errores['codigo'] = 'El código es obligatorio, solo letras, números o guion (3 a 15 caracteres).';
        }
        if (!preg_match('/^[\p{L} ]{3,60}$/u', $datos['carrera'])) {
            $errores['carrera'] = 'La carrera es obligatoria, solo letras y espacios (3 a 60 caracteres).';
        }

        return $errores;
    }

    private function responder(int $codigoHttp, array $datos): void
    {
        http_response_code($codigoHttp);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($datos, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
