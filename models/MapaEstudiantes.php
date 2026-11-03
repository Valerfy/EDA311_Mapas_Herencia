<?php
declare(strict_types=1);

class MapaEstudiantes
{
    private array $estudiantes = [];
    private string $codigoInicial;

    public function __construct(private string $archivo)
    {
        $inicial = new Estudiante('Matias', 'Valero', 19, 'SIS10093072', 'Ingeniería de Sistemas');
        $this->codigoInicial = $inicial->getCodigo();
        $this->agregar($inicial);

        if (is_file($archivo)) {
            $lista = json_decode(file_get_contents($archivo), true) ?? [];
            foreach ($lista as $d) {
                $this->agregar(new Estudiante(
                    $d['nombre'],
                    $d['apellido'],
                    (int) $d['edad'],
                    $d['codigo'],
                    $d['carrera']
                ));
            }
        }
    }

    public function agregar(Estudiante $estudiante): void
    {
        $codigo = $estudiante->getCodigo();
        if (isset($this->estudiantes[$codigo])) {
            throw new DomainException("Ya existe un estudiante con el código $codigo.");
        }
        $this->estudiantes[$codigo] = $estudiante;
    }

    public function obtener(string $codigo): ?Estudiante
    {
        return $this->estudiantes[$codigo] ?? null;
    }

    public function todos(): array
    {
        return array_values($this->estudiantes);
    }

    public function guardar(): void
    {
        $lista = [];
        foreach ($this->estudiantes as $codigo => $estudiante) {
            if ((string) $codigo !== $this->codigoInicial) {
                $lista[] = $estudiante->toArray();
            }
        }
        file_put_contents($this->archivo, json_encode($lista, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}
