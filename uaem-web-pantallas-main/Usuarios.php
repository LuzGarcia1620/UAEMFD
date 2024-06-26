<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/usuarios.css">
    <link rel="stylesheet" href="./Assets/css/styles.css">
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
                                    <path
                                        d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                    </path>
                                </g>
                            </svg>
                            <input id="buscarInput" placeholder="Buscar" type="text" class="input">
                        </div>
                        <img src="Assets/img/anadir.png" alt="Agregar Usuarios" id="agregarUserBtn" class="img-fluid"
                            style="cursor: pointer; width: 70px;">
                    </div>
                </div>
                <!-- Botón y Modal para agregar usuarios -->

                <div>
                    <div class="divider-line"></div>
                    <div class="card-container d-flex justify-content-around">
                        <div class="card">
                            <div class="name">María Gonzalez</div>
                            <div class="label">Correo:</div>
                            <div class="email">mariagonzalez@uaem.mx

                            </div>
                            <div class="role">Administrador</div>
                            <div class="button-container">
                                <div class="button edit-btn" data-toggle="modal" data-target="#editarUsuarioModal">
                                    Editar</div>
                                <div class="button deactivate-btn" onclick="desactivarUsuario('María Gonzalez')">
                                    Desactivar</div>
                                <div class="button delete-btn" onclick="eliminarUsuario('María Gonzalez')">Eliminar
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="name">Carlos Lopez</div>
                            <div class="label">Correo:</div>
                            <div class="email">carloslopez@uaem.mx</div>
                            <div class="role">instructor</div>
                            <div class="button-container">
                                <div class="button edit-btn" data-toggle="modal" data-target="#editarUsuarioModal">
                                    Editar</div>
                                <div class="button deactivate-btn" onclick="desactivarUsuario('Carlos Lopez')">
                                    Desactivar</div>
                                <div class="button delete-btn" onclick="eliminarUsuario('Carlos Lopez')">Eliminar
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="name">Ana Martinez</div>
                            <div class="label">Correo:</div>
                            <div class="email">anamartinez@uaem.mx</div>
                            <div class="role">instructor</div>
                            <div class="button-container">
                                <div class="button edit-btn" data-toggle="modal" data-target="#editarUsuarioModal">
                                    Editar</div>
                                <div class="button deactivate-btn" onclick="desactivarUsuario('Ana Martinez')">
                                    Desactivar</div>
                                <div class="button delete-btn" onclick="eliminarUsuario('Ana Martinez')">Eliminar
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para agregar usuarios -->
        <div class="modal fade" id="agregarUsuariosModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="campo">
                            <input type="text" id="nombre" name="nombre" required>
                            <label for="nombre">Nombre(s)</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="apellidoPaterno" name="apellidoPaterno" required>
                            <label for="apellidoPaterno">Apellido Paterno</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="apellidoMaterno" name="apellidoMaterno" required>
                            <label for="apellidoMaterno">Apellido Materno</label>
                        </div>
                        <div class="campo">
                            <input type="grado" id="grado" name="grado" required>
                            <label for="Último grado académico">Último grado académico</label>
                        </div>
                        <div class="campo">
                            <input type="Institucion" id="Institucion" name="Institucion" required>
                            <label for="Institucion">Institución</label>
                        </div>
                        <div class="campo">
                            <input type="tel" id="telefono" name="telefono" required>
                            <label for="telefono">Teléfono</label>
                        </div>
                        <div class="campo">
                            <input type="email" id="correo" name="correo" required>
                            <label for="correo">Correo Electrónico</label>
                        </div>
                        <div class="campo">
                            <input type="password" id="password" name="password" required>
                            <label for="password">Contraseña</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin del modal -->

        <!-- MODAL PARA EDITAR USUARIOS -->
        <div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenido del modal -->
                        <div class="campo">
                            <input type="text" id="nombre" name="nombre" required>
                            <label for="nombre">Nombre(s)</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="apellidoPaterno" name="apellidoPaterno" required>
                            <label for="apellidoPaterno">Apellido Paterno</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="apellidoMaterno" name="apellidoMaterno" required>
                            <label for="apellidoMaterno">Apellido Materno</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="grado" name="grado" required>
                            <label for="Último grado académico">Último grado académico</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="institucion" name="institucion" required>
                            <label for="institucion">Institución</label>
                        </div>
                        <div class="campo">
                            <input type="tel" id="telefono" name="telefono" required>
                            <label for="telefono">Teléfono</label>
                        </div>
                        <div class="campo">
                            <input type="email" id="correo" name="correo" required>
                            <label for="correo">Correo Electrónico</label>
                        </div>
                        <div class="campo">
                            <input type="password" id="password" name="password" required>
                            <label for="password">Contraseña</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>Departamento de Formación Docente</p>
            <p>Av. Universidad 1001 Col. Chamilpa C.P. 62209, Cuernavaca, Morelos</p>
        </footer>

        <!-- Scripts al final del cuerpo para mejorar el rendimiento de carga -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
        fetch("./templates/header.html")
            .then(response => response.text())
            .then(data => {
                document.getElementById("headerContainer").innerHTML = data;
            });

        // JavaScript para mostrar el modal
        document.getElementById("agregarUserBtn").addEventListener("click", function() {
            $('#agregarUsuariosModal').modal('show');
        });

        // SweetAlert2 con botones de Bootstrap
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        // Función para desactivar usuarios
        function desactivarUsuario(nombreUsuario) {
            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, desactivar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aquí puedes implementar la lógica para desactivar el usuario
                    swalWithBootstrapButtons.fire({
                        title: 'Desactivado',
                        text: `El usuario ${nombreUsuario} ha sido desactivado.`,
                        icon: 'success'
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: 'Cancelado',
                        text: 'Tu usuario está seguro :)',
                        icon: 'error'
                    });
                }
            });
        }

        // Función para eliminar usuarios
        function eliminarUsuario(nombreUsuario) {
            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aquí implementar lógica para eliminar el usuario
                    swalWithBootstrapButtons.fire({
                        title: 'Eliminado',
                        text: `El usuario ${nombreUsuario} ha sido eliminado.`,
                        icon: 'success'
                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: 'Cancelado',
                        text: 'Tu usuario está seguro :)',
                        icon: 'error'
                    });
                }
            });
        }

         // Función para filtrar las tarjetas de usuario
    function filtrarUsuarios() {
        var input = document.getElementById('buscarInput');
        var filter = input.value.toUpperCase();
        var cards = document.getElementsByClassName('card');

        for (var i = 0; i < cards.length; i++) {
            var name = cards[i].getElementsByClassName('name')[0];
            var email = cards[i].getElementsByClassName('email')[0];

            if (name.innerHTML.toUpperCase().indexOf(filter) > -1 || email.innerHTML.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }

    // Evento para ejecutar la función de filtrado cuando se escribe en el input
    document.getElementById('buscarInput').addEventListener('keyup', filtrarUsuarios);
        </script>
    </div>
</body>

</html>