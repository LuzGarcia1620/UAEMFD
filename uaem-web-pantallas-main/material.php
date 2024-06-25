<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de Actividad Formativa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./Assets/css/material.css" />
    <link rel="stylesheet" href="./Assets/css/styles.css" />
</head>

<body>

    <?php
   include_once("conexion.php");
   $conexion = new CConexion();
   $conexion->conexionBD(); // Conectar a la base de datos

    ?>

    <div id="headerContainer"></div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
            <div class="col-lg-2">
                <ul class="list-unstyled vertical-nav">
                    <li><a href="perfil.php" class="btn btn-block my-1 menu">Perfil</a></li>
                    <li><a href="instructor.php" class="btn btn-primary btn-block my-1 menu">Formulario</a></li>
                    <li><a href="Asistencia.php" class="btn btn-primary btn-block my-1 menu">Lista de Asistencia</a>
                    </li>
                    <li><a href="material.php" class="btn btn-primary btn-block my-1 menu">Material</a></li>
                    <li><a href="salir.php" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
                </ul>
            </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10 d-flex justify-content-center align-items-center">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Sube un archivo</h2>
                        <p class="card-text">Adjunte el archivo a continuación</p>
                        <button class="upload-area">
                            <div class="img">
                                <img src="./Assets/img/upload.png" alt="upload">
                            </div>
                            <span class="upload-area-title">Arrastre los archivos aquí para cargarlos.</span>
                            <span class="upload-area-description">
                                Alternativamente, puede seleccionar un archivo <br /><strong>clic aquí</strong>
                            </span>
                        </button>
                        <div class="text-right mt-3">
                            <button class="btn btn-primary ml-2">Subir archivos</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <footer class="footer">
                <p>Departamento de Formación Docente</p>
                <p>Av. Universidad 1001 Col. Chamilpa C.P. 62209, Cuernavaca, Morelos</p>
            </footer>

            <script>
            fetch("./templates/header.html")
                .then((response) => response.text())
                .then((data) => {
                    document.getElementById("headerContainer").innerHTML = data;
                });
            fetch("./templates/menu.html")
                .then((response) => response.text())
                .then((data) => {
                    document.getElementById("menuContainer").innerHTML = data;
                });
            </script>
</body>

</html>