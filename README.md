# Gestión de estudiantes con mapas y herencia en PHP (MVC)

**Asignatura:** EDA-311 Estructura de Datos

## Descripción y objetivo

Aplicación en PHP que registra y consulta estudiantes mediante peticiones GET y POST. Los estudiantes se almacenan en una estructura tipo mapa (arreglo asociativo) cuya clave es el código del estudiante. Aplica herencia (`Estudiante` hereda de `Persona`), encapsulamiento (atributos privados con getters) y tipos estrictos (`declare(strict_types=1);`), con el patrón Modelo-Vista-Controlador.

El estudiante inicial se define en `models/MapaEstudiantes.php` y está disponible al ejecutar la aplicación. Los estudiantes nuevos se guardan en `data/estudiantes.json` para que persistan entre peticiones.

## Requisitos

- XAMPP con PHP 8.0 o superior y Apache.
- Navegador web (opcionalmente Postman).

## Instalación y ejecución en XAMPP

1. Copiar la carpeta `estudiantes-mapa` en `C:\xampp\htdocs\`.
2. Abrir el XAMPP Control Panel e iniciar Apache.
3. Abrir `http://localhost/estudiantes-mapa/`.

## Ubicación de los archivos

```
C:\xampp\htdocs\estudiantes-mapa\
├── index.php
├── css\         styles.css
├── models\        Persona.php, Estudiante.php, MapaEstudiantes.php
├── views\         formulario.php
├── controllers\   EstudianteController.php
├── data\          estudiantes.json
└── README.md
```

## Peticiones

URL base: `http://localhost/estudiantes-mapa/index.php?accion=estudiantes`

**GET (todos):**

```
http://localhost/estudiantes-mapa/index.php?accion=estudiantes
```

**GET (por código):**

```
http://localhost/estudiantes-mapa/index.php?accion=estudiantes&codigo=CAMBIAR-CODIGO
```

**POST (registrar):** enviar los campos `nombre`, `apellido`, `edad`, `codigo` y `carrera` como `form-data` o `x-www-form-urlencoded`.

```bash
curl -X POST "http://localhost/estudiantes-mapa/index.php?accion=estudiantes" \
  -d "nombre=Ana&apellido=Rojas&edad=19&codigo=654321&carrera=Ingenieria Civil"
```

Respuesta correcta (201):

```json
{
    "exito": true,
    "mensaje": "Estudiante registrado correctamente.",
    "estudiante": {
        "codigo": "654321",
        "nombre": "Ana",
        "apellido": "Rojas",
        "edad": 19,
        "carrera": "Ingenieria Civil"
    }
}
```

Respuestas de error: 400 (datos faltantes o inválidos), 404 (código no encontrado), 409 (código duplicado).

## Validaciones

El formulario valida en el navegador y el servidor vuelve a validar cada dato en el controlador.

| Campo | Regla |
|-------|-------|
| nombre | Obligatorio, solo letras y espacios, 2 a 50 caracteres |
| apellido | Obligatorio, solo letras y espacios, 2 a 50 caracteres |
| edad | Obligatoria, número entero entre 15 y 100 |
| codigo | Obligatorio, letras, números o guion, 3 a 15 caracteres, único |
| carrera | Obligatoria, solo letras y espacios, 3 a 60 caracteres |

Si algún dato es inválido, la respuesta es 400 con el detalle de cada error en `errores`:

```json
{
    "exito": false,
    "mensaje": "Datos inválidos.",
    "errores": {
        "edad": "La edad es obligatoria y debe ser un número entero entre 15 y 100."
    }
}
```

## Formulario web

1. Abrir `http://localhost/estudiantes-mapa/`.
2. Completar los campos y pulsar **Registrar (POST)**. El navegador muestra la respuesta JSON del servidor.
3. Volver atrás y pulsar **Consultar (GET)** para ver los estudiantes registrados.

El formulario es HTML y PHP puros, sin JavaScript.
