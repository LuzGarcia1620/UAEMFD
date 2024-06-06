<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/consultas.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
    <div id="headerContainer"></div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
            <div class="col-lg-2">
                <ul class="list-unstyled vertical-nav">
                    <li><a href="perfil.php" class="btn btn-block my-1 menu">Perfil</a></li>
                    <li><a href="actividadformativa.php" class="btn btn-primary btn-block my-1 menu">Actividad Formativa</a></li>
                    <li><a href="usuarios.php" class="btn btn-primary btn-block my-1 menu">Usuarios</a></li>
                    <li><a href="consultas.php" class="btn btn-primary btn-block my-1 menu">Consultas</a></li>
                    <li><a href="asistencia.php" class="btn btn-primary btn-block my-1 menu">Asistencia</a></li>
                    <li><a href="salir.php" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
                </ul>
            </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10">
                <div class="containercons">
                    <div class="btn-group mb-3">
                        <button id="yearBtn" class="btn btn-secondary" onclick="showInput('year')">Por año</button>
                        <button id="instructorBtn" class="btn btn-secondary" onclick="showInput('instructor')">Por instructor</button>
                        <button id="unitBtn" class="btn btn-secondary" onclick="showInput('unit')">Unidad Académica</button>
                        <button id="teacherBtn" class="btn btn-secondary" onclick="showInput('teacher')">Por Docente</button>
                        <button id="genderBtn" class="btn btn-secondary" onclick="showInput('gender')">Por Género</button>
                    </div>
                    <div class="divider"></div>
                    <div id="yearInput" class="input-container" style="display: none;">
                        <select class="form-control" style="width: 300px;">
                            <option value="">Seleccione el año</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div id="instructorInput" class="input-container" style="display: none;">
                        <select class="form-control" style="width: 300px;">
                            <option value="">Seleccione el instructor</option>
                            <option value="Instructor1">Instructor 1</option>
                            <option value="Instructor2">Instructor 2</option>
                            <option value="Instructor3">Instructor 3</option>
                        </select>
                    </div>
                    <div id="unitInput" class="input-container" style="display: none;">
                        <select class="form-control" style="width: 300px;">
                            <option value="">Seleccione la unidad académica</option>
                            <option value="Unidad1">Unidad 1</option>
                            <option value="Unidad2">Unidad 2</option>
                            <option value="Unidad3">Unidad 3</option>
                        </select>
                    </div>
                    <div id="teacherInput" class="input-container" style="display: none;">
                        <select class="form-control" style="width: 300px;">
                            <option value="">Seleccione el docente</option>
                            <option value="Docente1">Docente 1</option>
                            <option value="Docente2">Docente 2</option>
                            <option value="Docente3">Docente 3</option>
                        </select>
                    </div>
                    <div id="genderInput" class="input-container" style="display: none;">
                        <select class="form-control" style="width: 300px;">
                            <option value="">Seleccione el género</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
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
            // Ocultar todos los contenedores de input
            var inputContainers = document.querySelectorAll('.input-container');
            inputContainers.forEach(function(container) {
                container.style.display = 'none';
            });

            // Desactivar todos los botones
            var buttons = document.querySelectorAll('.btn-group button');
            buttons.forEach(function(button) {
                button.classList.remove('btn-primary');
                button.classList.add('btn-secondary');
            });

            // Mostrar el contenedor de input correspondiente y activar el botón
            var selectedInput = document.getElementById(type + 'Input');
            var selectedButton = document.getElementById(type + 'Btn');
            selectedInput.style.display = 'block';
            selectedButton.classList.remove('btn-secondary');
            selectedButton.classList.add('btn-primary');
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
