<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de estudiantes</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="contenedor">
    <h1>Registro de estudiantes</h1>
    <p class="subtitulo">EDA-311 Estructura de Datos</p>

    <div class="tarjeta">
      <h2>Nuevo estudiante</h2>
      <form method="post" action="index.php?accion=estudiantes">
        <div class="campo">
          <label for="nombre">Nombre</label>
          <input id="nombre" name="nombre" required minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñÜü ]{2,50}" title="Solo letras y espacios (2 a 50 caracteres)">
        </div>
        <div class="campo">
          <label for="apellido">Apellido</label>
          <input id="apellido" name="apellido" required minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñÜü ]{2,50}" title="Solo letras y espacios (2 a 50 caracteres)">
        </div>
        <div class="campo">
          <label for="edad">Edad</label>
          <input id="edad" name="edad" type="number" required min="15" max="100" step="1" title="Número entero entre 15 y 100">
        </div>
        <div class="campo">
          <label for="codigo">Código</label>
          <input id="codigo" name="codigo" required minlength="3" maxlength="15" pattern="[A-Za-z0-9\-]{3,15}" title="Letras, números o guion (3 a 15 caracteres)">
        </div>
        <div class="campo">
          <label for="carrera">Carrera</label>
          <input id="carrera" name="carrera" required minlength="3" maxlength="60" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñÜü ]{3,60}" title="Solo letras y espacios (3 a 60 caracteres)">
        </div>
        <div class="botones">
          <button type="submit" class="btn-post">Registrar (POST)</button>
          <a class="btn-get" href="index.php?accion=estudiantes">Consultar (GET)</a>
        </div>
      </form>
    </div>

  </div>

</body>
</html>
