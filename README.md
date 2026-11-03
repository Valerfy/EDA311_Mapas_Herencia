# EDA311_Mapas_Herencia

## Gestión de estudiantes con mapas y herencia en PHP

**Asignatura:** EDA-311 Estructura de Datos

## 1. Descripción y objetivo del proyecto

Aplicación web desarrollada en PHP para registrar y consultar estudiantes mediante una estructura de datos tipo mapa (arreglo asociativo), utilizando el código del estudiante como clave.

El proyecto aplica herencia mediante las clases `Persona` y `Estudiante`, encapsulamiento mediante atributos privados y tipado estricto con `declare(strict_types=1);`.

**Objetivo:** desarrollar un sistema que permita registrar y consultar estudiantes, aplicando mapas y herencia en PHP.

## 2. Requisitos

Para ejecutar el proyecto se necesita:

- XAMPP instalado.
- PHP 8.0 o superior.
- Servidor Apache.
- Navegador web.
- Git (opcional, para clonar el repositorio).

No es necesario iniciar MySQL, ya que los datos se almacenan en un archivo JSON.

## 3. Instalación y ejecución en XAMPP

1. Descargar el proyecto desde GitHub o clonarlo utilizando el siguiente comando:

   ```bash
   git clone https://github.com/Valerfy/EDA311_Mapas_Herencia.git
   ```

2. Colocar la carpeta `EDA311_Mapas_Herencia` dentro de:

   `C:\xampp\htdocs\`

3. Si se descarga el proyecto como ZIP, extraerlo y colocar la carpeta dentro de `htdocs`. Renombrar la carpeta `EDA311_Mapas_Herencia-main` a `EDA311_Mapas_Herencia`.

4. Abrir el Panel de Control de XAMPP.

5. Iniciar el servicio **Apache**.

6. Abrir el navegador web e ingresar a:

   `http://localhost/EDA311_Mapas_Herencia/`

7. Se mostrará el formulario web para registrar y consultar estudiantes.

## 4. Ubicación de los archivos

El proyecto debe encontrarse en la siguiente ubicación:

`C:\xampp\htdocs\EDA311_Mapas_Herencia\`

La estructura de carpetas es la siguiente:

```text
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
```

## 5. Peticiones GET y POST

El sistema utiliza peticiones HTTP para consultar y registrar estudiantes.

### 5.1. Consulta de estudiantes (GET)

La petición GET permite obtener la información de los estudiantes registrados.

**Consultar todos los estudiantes:**

```text
http://localhost/EDA311_Mapas_Herencia/index.php?accion=estudiantes
```

**Consultar un estudiante por código:**

```text
http://localhost/EDA311_Mapas_Herencia/index.php?accion=estudiantes&codigo=CODIGO
```

Para buscar un estudiante específico, reemplazar `CODIGO` por el código correspondiente.

Las consultas devuelven la información en formato JSON.

### 5.2. Registro de estudiantes (POST)

La petición POST permite registrar nuevos estudiantes mediante el envío de sus datos al servidor.

**Dirección para realizar el registro:**

```text
http://localhost/EDA311_Mapas_Herencia/index.php?accion=estudiantes
```

Los datos que se deben enviar son:

| Campo | Descripción | Ejemplo |
|---|---|---|
| nombre | Nombre del estudiante | Mat |
| apellido | Apellido del estudiante | Lopez |
| edad | Edad del estudiante | 25 |
| codigo | Código del estudiante | 1234 |
| carrera | Carrera que estudia | MED |

**Ejemplo de datos enviados mediante POST:**

```text
nombre: Mat
apellido: Lopez
edad: 25
codigo: 1234
carrera: MED
```

El sistema valida la información recibida y registra al estudiante si los datos son correctos. La respuesta del servidor se devuelve en formato JSON.

## 6. Uso del formulario web

El proyecto incluye un formulario web que permite realizar el registro y la consulta de estudiantes.

Para utilizarlo:

1. Ingresar a `http://localhost/EDA311_Mapas_Herencia/`.
2. Completar los campos de nombre, apellido, edad, código y carrera.
3. Presionar el botón **Registrar (POST)** para enviar los datos y registrar al estudiante.
4. Presionar el botón **Consultar (GET)** para obtener la información de los estudiantes registrados.
5. Revisar la respuesta que devuelve el sistema en formato JSON.

## 7. Almacenamiento de datos

Los estudiantes registrados se almacenan en el archivo:

`data/estudiantes.json`

Este archivo permite conservar los registros para futuras consultas, incluso después de cerrar y volver a abrir el navegador.

## 8. Repositorio

[EDA311_Mapas_Herencia en GitHub](https://github.com/Valerfy/EDA311_Mapas_Herencia)

## 9. Autor

**Matías Valero Fernández**

**Código de estudiante:** SIS10093072