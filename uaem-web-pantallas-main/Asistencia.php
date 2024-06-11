<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./Assets/css/perfil.css" />
    <link rel="stylesheet" href="./Assets/css/styles.css" />
</head>

<body>

<?php
    include_once("conexion.php");
    $conexion = new CConexion();
    $conexion->conexionBD();
    
    ?>
    
    <div id="headerContainer"></div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
            <div class="col-lg-2">
                <ul class="list-unstyled vertical-nav">
                    <li><a href="perfil.php" class="btn btn-block my-1 menu">Perfil</a></li>
                    <li><a href="actividadformativa.php" class="btn btn-primary btn-block my-1 menu">Actividad
                            Formativa</a></li>
                    <li><a href="usuarios.php" class="btn btn-primary btn-block my-1 menu">Usuarios</a></li>
                    <li><a href="consultas.php" class="btn btn-primary btn-block my-1 menu">Consultas</a></li>
                    <li><a href="asistencia.php" class="btn btn-primary btn-block my-1 menu">Asistencia</a></li>
                    <li><a href="salir.php" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
                </ul>
            </div>
            <!-- Contenido Principal -->

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
            fetch("./templates/footer.html")
                .then((response) => response.text())
                .then((data) => {
                    document.getElementById("footer").innerHTML = data;
                });
            </script>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>