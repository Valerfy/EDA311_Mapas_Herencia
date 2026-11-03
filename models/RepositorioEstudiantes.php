<?php
declare(strict_types=1);

class RepositorioEstudiantes
{
    private string $archivo;

    public function __construct(string $archivo)
    {
        $this->archivo = $archivo;
    }

    public static function estudianteInicial(): Estudiante
    {
        return new Estudiante('Juan', 'Pérez', 20, '123456', 'Ingeniería de Sistemas');
    }

    public function cargar(): MapaEstudiantes
    {
        $mapa = new MapaEstudiantes();
        $mapa->agregar(self::estudianteInicial());

        if (is_file($this->archivo)) {
            $lista = json_decode((string) file_get_contents($this->archivo), true);
            if (is_array($lista)) {
                foreach ($lista as $d) {
                    $mapa->agregar(new Estudiante(
                        (string) $d['nombre'],
                        (string) $d['apellido'],
                        (int) $d['edad'],
                        (string) $d['codigo'],
                        (string) $d['carrera']
                    ));
                }
            }
        }
        return $mapa;
    }

    public function guardar(MapaEstudiantes $mapa): void
    {
        $codigoInicial = self::estudianteInicial()->getCodigo();
        $lista = [];
        foreach ($mapa->todos() as $estudiante) {
            if ($estudiante->getCodigo() !== $codigoInicial) {
                $lista[] = $estudiante->toArray();
            }
        }
        file_put_contents(
            $this->archivo,
            json_encode($lista, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
            LOCK_EX
        );
    }
}
