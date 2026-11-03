<?php
declare(strict_types=1);

class Estudiante extends Persona
{
    public function __construct(
        string $nombre,
        string $apellido,
        int $edad,
        private string $codigo,
        private string $carrera
    ) {
        parent::__construct($nombre, $apellido, $edad);
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function getCarrera(): string
    {
        return $this->carrera;
    }

    public function toArray(): array
    {
        return [
            'codigo' => $this->codigo,
            'nombre' => $this->getNombre(),
            'apellido' => $this->getApellido(),
            'edad' => $this->getEdad(),
            'carrera' => $this->carrera,
        ];
    }
}
