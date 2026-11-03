<?php
declare(strict_types=1);

class JsonView
{
    public static function render(int $codigoHttp, array $datos): void
    {
        http_response_code($codigoHttp);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($datos, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
