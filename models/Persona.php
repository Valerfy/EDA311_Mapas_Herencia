<?php
declare(strict_types=1);

class Persona
{
    public function __construct(
        private string $nombre,
        private string $apellido,
        private int $edad
    ) {
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }
}
