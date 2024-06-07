<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./Assets/css/usuarios.css" />
    <link rel="stylesheet" href="./Assets/css/styles.css" />
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
                    <li><a href="login.php" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
                </ul>
            </div>

            <!-- Contenido Principal -->
            <div class="col-lg-10 min mv-10">
                <br>
                <div class="botones">
                    <div class="titulo">Usuarios</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="group">
                            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                                <g>
                                    <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                                </g>
                            </svg>
                            <input placeholder="Search" type="search" class="input">
                        </div>
                        <img src="Assets/img/anadir.png" alt="Agregar Usuarios" id="agregarUserBtn" class="img-fluid" style="cursor: pointer; width: 70px;">
                    </div>
                </div>

                <!-- Modal para agregar usuarios -->
                <div id="agregarUsuariosModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuarios</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Contenido del modal -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del modal -->

                <div>
                    <div class="divider-line"></div>
                    <div class="card-container d-flex justify-content-around">
                        <div class="card">
                            <div class="name">María Gonzalez</div>
                            <div class="label">Correo:</div>
                            <div class="email">mariagonzalez@uaem.mx</div>
                            <div class="role">instructor</div>
                            <div class="button-container">
                                <div class="button edit-btn">Editar</div>
                                <div class="button deactivate-btn">Desactivar</div>
                                <div class="button delete-btn">Eliminar</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="name">Carlos Lopez</div>
                            <div class="label">Correo:</div>
                            <div class="email">carloslopez@uaem.mx</div>
                            <div class="role">instructor</div>
                            <div class="button-container">
                                <div class="button edit-btn">Editar</div>
                                <div class="button deactivate-btn">Desactivar</div>
                                <div class="button delete-btn">Eliminar</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="name">Ana Martinez</div>
                            <div class="label">Correo:</div>
                            <div class="email">anamartinez@uaem.mx</div>
                            <div class="role">instructor</div>
                            <div class="button-container">
                                <div class="button edit-btn">Editar</div>
                                <div class="button deactivate-btn">Desactivar</div>
                                <div class="button delete-btn">Eliminar</div>
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

            $(document).ready(function() {
                $('#agregarUserBtn').click(function() {
                    $('#agregarUsuariosModal').modal('show');
                });
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>
</html>
