# EDA311_Mapas_Herencia

## Gestión de estudiantes con mapas y herencia en PHP

Aplicación web desarrollada en PHP para el registro y consulta de estudiantes utilizando mapas y herencia.

## Requisitos

- XAMPP instalado.
- PHP 8 o superior.
- Navegador web.
- Git (opcional, para clonar el repositorio).

## Pasos para ejecutar el proyecto

1. Instalar y abrir XAMPP.
2. Descargar o clonar el repositorio del proyecto.
3. Copiar la carpeta `estudiantes-mapa` dentro de `C:\xampp\htdocs\`.
4. Abrir el Panel de Control de XAMPP.
5. Iniciar el servicio **Apache**. No es necesario iniciar MySQL.
6. Abrir el navegador web.
7. Ingresar a la siguiente dirección:

   `http://localhost/estudiantes-mapa/`

8. Se mostrará el formulario de registro de estudiantes.
9. Completar los datos solicitados para registrar un estudiante.
10. Utilizar las direcciones de consulta para visualizar los estudiantes registrados.

## Registro y consulta de estudiantes (GET y POST)

Para utilizar el sistema, ingresar desde el navegador a:

`http://localhost/estudiantes-mapa/`

### Registro de estudiantes (POST)

El registro se realiza desde el formulario web, completando los datos solicitados y presionando el botón de registro.

El sistema valida los datos recibidos y guarda la información del estudiante en el archivo JSON del proyecto.

### Consulta de estudiantes (GET)

Las consultas se realizan mediante las siguientes direcciones:

- **Consultar todos los estudiantes:**

  `http://localhost/estudiantes-mapa/index.php?accion=estudiantes`

- **Consultar un estudiante por código:**

  `http://localhost/estudiantes-mapa/index.php?accion=estudiantes&codigo=SIS10093072`

Las consultas GET permiten obtener la información de los estudiantes registrados en el sistema.

## Almacenamiento de datos

Los estudiantes registrados se almacenan en el archivo:

`data/estudiantes.json`

La información se mantiene guardada en el archivo JSON para futuras consultas.

## Repositorio

[EDA311_Mapas_Herencia](https://github.com/Valerfy/EDA311_Mapas_Herencia)

## Autor

**Matías Valero Fernández**

Código de estudiante: SIS10093072