# EDA311_Mapas_Herencia

## Gestión de estudiantes con mapas y herencia en PHP

**Asignatura:** EDA-311 Estructura de Datos

## 1. Descripción y objetivo del proyecto

Aplicación web desarrollada en PHP para registrar y consultar estudiantes mediante una estructura de datos tipo mapa (arreglo asociativo), utilizando el código del estudiante como clave.

El proyecto aplica herencia mediante las clases `Persona` y `Estudiante`, encapsulamiento mediante atributos privados y tipado estricto con `declare(strict_types=1);`.

**Objetivo:** desarrollar un sistema que permita registrar y consultar estudiantes, utilizando mapas y herencia en PHP.

## 2. Requisitos

- XAMPP instalado.
- PHP 8.0 o superior.
- Servidor Apache.
- Navegador web.
- Git (opcional, para clonar el repositorio).

No es necesario iniciar MySQL, ya que los datos se almacenan en un archivo JSON.

## 3. Instalación y ejecución en XAMPP

1. Descargar el proyecto desde GitHub o clonarlo con el siguiente comando:

   `git clone https://github.com/Valerfy/EDA311_Mapas_Herencia.git`

2. Colocar la carpeta `EDA311_Mapas_Herencia` dentro de:

   `C:\xampp\htdocs\`

   Si se descarga como ZIP, extraer el contenido y colocar la carpeta del proyecto dentro de `htdocs`. En ese caso, renombrar la carpeta extraída `EDA311_Mapas_Herencia-main` a `EDA311_Mapas_Herencia`.

3. Abrir el Panel de Control de XAMPP.
4. Iniciar el servicio **Apache**.
5. Abrir el navegador web.
6. Ingresar a la siguiente dirección:

   `http://localhost/EDA311_Mapas_Herencia/`

7. Se mostrará el formulario de registro de estudiantes.

## 4. Ubicación de los archivos

El proyecto debe encontrarse en la siguiente ubicación:

`C:\xampp\htdocs\EDA311_Mapas_Herencia\`

Su estructura es la siguiente:

EDA311_Mapas_Herencia/
│
├── index.php
│
├── controllers/
│   └── EstudianteController.php
│
├── models/
│   ├── Persona.php
│   ├── Estudiante.php
│   └── MapaEstudiantes.php
│
├── views/
│   └── formulario.php
│
├── css/
│   └── styles.css
│
├── data/
│   └── estudiantes.json
│
└── README.md

## 5. Peticiones GET y POST

Las peticiones se realizan mediante el siguiente punto de acceso:

`http://localhost/EDA311_Mapas_Herencia/index.php?accion=estudiantes`

### 5.1. Consulta de estudiantes (GET)

Permite obtener la información de los estudiantes registrados.

**Consultar todos los estudiantes:**

`http://localhost/EDA311_Mapas_Herencia/index.php?accion=estudiantes`

**Consultar un estudiante por código:**

`http://localhost/EDA311_Mapas_Herencia/index.php?accion=estudiantes&codigo=CODIGO`

En la segunda consulta se debe reemplazar `CODIGO` por el código del estudiante que se desea buscar.

Las respuestas se muestran en formato JSON.

### 5.2. Registro de estudiantes (POST)

Permite registrar un nuevo estudiante enviando los datos mediante una petición HTTP POST.

La dirección para realizar el registro es:

`http://localhost/EDA311_Mapas_Herencia/index.php?accion=estudiantes`

Los datos que se deben enviar son:

| Campo   | Descripción            | Ejemplo |

| nombre  | Nombre del estudiante  | Mat     |
| apellido| Apellido del estudiante| Lopez   | 
| edad    | Edad del estudiante    | 25      |
| codigo  | Código del estudiante  | 1234    |
| carrera | Carrera que estudia    | MED     |

**Ejemplo de datos enviados mediante POST:**

nombre: Mat
apellido: Lopez
edad: 25
codigo: 1234
carrera: MED


Al registrar correctamente al estudiante, el servidor devuelve una respuesta JSON con el mensaje de confirmación y los datos registrados. El código de respuesta HTTP es 201.

## 6. Uso del formulario web

El proyecto incluye un formulario web para realizar el registro y la consulta de estudiantes.

Para utilizarlo:

1. Ingresar a `http://localhost/EDA311_Mapas_Herencia/`.
2. Completar los campos de nombre, apellido, edad, código y carrera.
3. Presionar **Registrar (POST)** para enviar los datos y registrar al estudiante.
4. Para consultar los estudiantes, presionar **Consultar (GET)**.
5. El sistema mostrará la respuesta del servidor en formato JSON.

## 7. Almacenamiento de datos

Los estudiantes registrados se almacenan en el archivo:

`data/estudiantes.json`

Este archivo permite conservar los registros para futuras consultas, incluso después de cerrar y volver a abrir el navegador.

## 8. Repositorio

[EDA311_Mapas_Herencia en GitHub](https://github.com/Valerfy/EDA311_Mapas_Herencia)

## 9. Autor

**Matías Valero Fernández**

Código de estudiante: SIS10093072