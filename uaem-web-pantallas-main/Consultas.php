<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./Assets/css/consultas.css" />
    <link rel="stylesheet" href="./Assets/css/styles.css" />
</head>

<body>

    <?php
    include_once("conexion.php");

    // Crear una instancia de la clase y llamar al método
    $conexion = new CConexion();
    $conexion->conexionBD();
    ?>

    <div id="headerContainer"></div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
            <div class="col-lg-2">
                <div class="backg">
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

            </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10 d-flex justify-content-center align-items-center" style="height: 50vh;">
                <div class="containercons text-center">

                    <div class="titulo">Consultas</div>

                    <div class="btn-group mb-3">
                        <button id="yearBtn" class="btn btn-primary" onclick="showInput('year')">Por año</button>
                        <button id="instructorBtn" class="btn btn-primary" onclick="showInput('instructor')">Por
                            instructor</button>
                        <button id="unitBtn" class="btn btn-primary" onclick="showInput('unit')">Unidad
                            Académica</button>
                        <button id="teacherBtn" class="btn btn-primary" onclick="showInput('teacher')">Por
                            Docente</button>
                        <button id="genderBtn" class="btn btn-primary" onclick="showInput('gender')">Por Género</button>
                    </div>

                    <!-- Año -->
                    <div class="d-flex justify-content-center align-items-center ">
                        <div id="yearInput" class="input-container">
                            <select class="form-control" style="width: 300px;">
                                <option value="">Seleccione el año</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>

                        <!-- Instructor -->
                        <div id="instructorInput" class="input-container">
                            <select class="form-control" style="width: 300px;">
                                <option value="">Seleccione el instructor</option>
                                <option value="Instructor1">Instructor 1</option>
                                <option value="Instructor2">Instructor 2</option>
                                <option value="Instructor3">Instructor 3</option>
                            </select>
                        </div>

                        <!-- Unidad Academica -->
                        <div id="unitInput" class="input-container">
                            <select class="form-control" style="width: 300px;">
                                <option value="">Seleccione la unidad académica</option>
                                <option value="Unidad1">Unidad 1</option>
                                <option value="Unidad2">Unidad 2</option>
                                <option value="Unidad3">Unidad 3</option>
                            </select>
                        </div>

                        <!-- docente -->
                        <div id="teacherInput" class="input-container">
                            <select class="form-control" style="width: 300px;">
                                <option value="">Seleccione el docente</option>
                                <option value="Docente1">Docente 1</option>
                                <option value="Docente2">Docente 2</option>
                                <option value="Docente3">Docente 3</option>
                            </select>
                        </div>

                        <!-- genero -->
                        <div id="genderInput" class="input-container">
                            <select class="form-control" style="width: 300px;">
                                <option value="">Seleccione el género</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                        </div>

                        <!-- Botón de búsqueda -->
                        <div id="searchBtnContainer" class="ml-3">
                            <button id="searchBtn" class="btn btn-primary searchBtn"
                                onclick="showResults()">Buscar</button>
                        </div>
                    </div>

                    <div class="divider-line"></div>
                    <br>

                    <input placeholder="Buscar" type="search" class="input">
                    <br>

                    <!-- Tabla de resultados -->
                    <div>
                        <div id="resultTable" class="table-responsive mt-4" style="display: none;">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Instructor</th>
                                        <th>Fecha</th>
                                        <th>Duración</th>
                                        <th>Categoría</th>
                                        <th>Tipo</th>
                                        <th>N° Participantes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Desarrollo de actividades dentro del aula</td>
                                        <td>María Delgado Méndez</td>
                                        <td>10 de enero de 2024</td>
                                        <td>15 hrs</td>
                                        <td>Capacitación</td>
                                        <td>Taller</td>
                                        <td>86</td>
                                    </tr>
                                    <!-- Más registros aquí -->
                                </tbody>
                            </table>
                        </div>
                    </div>

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

    fetch("./templates/footer.html")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("footer").innerHTML = data;
        });

    function showInput(type) {
        var inputContainers = document.querySelectorAll('.input-container');
        inputContainers.forEach(function(container) {
            container.style.display = 'none';
        });

        var buttons = document.querySelectorAll('.btn-group button');
        buttons.forEach(function(button) {
            button.classList.remove('btn-primary');
            button.classList.add('btn-secondary');
        });

        var selectedInput = document.getElementById(type + 'Input');
        var selectedButton = document.getElementById(type + 'Btn');
        selectedInput.style.display = 'block';
        selectedButton.classList.remove('btn-secondary');
        selectedButton.classList.add('btn-primary');

        document.getElementById("searchBtnContainer").style.display = 'block';
    }

    function showResults() {
        document.getElementById("resultTable").style.display = 'block';
    }

    document.addEventListener("DOMContentLoaded", function() {
        var inputContainers = document.querySelectorAll('.input-container');
        inputContainers.forEach(function(container) {
            container.style.display = 'none';
        });
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>