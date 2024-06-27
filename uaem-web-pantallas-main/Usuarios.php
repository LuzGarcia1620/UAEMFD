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
    $pdo = $conexion->conexionBD();
    
    // Manejo de solicitudes
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $accion = $_POST['accion'];
        $nombre = $_POST['nombre'] ?? null;
        $apellidoPaterno = $_POST['apellidoPaterno'] ?? null;
        $apellidoMaterno = $_POST['apellidoMaterno'] ?? null;
        $usuario = $_POST['usuario'] ?? null;
        $correo = $_POST['correo'] ?? null;
        $password = $_POST['password'] ?? null;
        $rol = $_POST['rol'] ?? null;
        $idUsuario = $_POST['idUsuario'] ?? null;
    
        try {
            if ($accion == 'agregar') {
                $sql = "INSERT INTO USUARIO (nombre, paterno, materno, usuario, correo, password, idRol) VALUES (:nombre, :apellidoPaterno, :apellidoMaterno, :usuario, :correo, :password, :rol)";
                $stmt = $pdo->prepare($sql);
                $resultado = $stmt->execute([
                    ':nombre' => $nombre,
                    ':apellidoPaterno' => $apellidoPaterno,
                    ':apellidoMaterno' => $apellidoMaterno,
                    ':usuario' => $usuario,
                    ':correo' => $correo,
                    ':password' => $password,
                    ':rol' => $rol
                ]);
    
                if ($resultado) {
                    echo json_encode(['success' => true, 'message' => 'Usuario agregado exitosamente.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error al agregar el usuario.']);
                }
            } elseif ($accion == 'editar') {
                $sql = "UPDATE USUARIO SET nombre = :nombre, paterno = :apellidoPaterno, materno = :apellidoMaterno, usuario = :usuario, correo = :correo, idRol = :rol WHERE idUsuario = :idUsuario";
                $stmt = $pdo->prepare($sql);
                $resultado = $stmt->execute([
                    ':nombre' => $nombre,
                    ':apellidoPaterno' => $apellidoPaterno,
                    ':apellidoMaterno' => $apellidoMaterno,
                    ':usuario' => $usuario,
                    ':correo' => $correo,
                    ':rol' => $rol,
                    ':idUsuario' => $idUsuario
                ]);
    
                if ($resultado) {
                    echo json_encode(['success' => true, 'message' => 'Usuario editado exitosamente.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error al editar el usuario.']);
                }
            } elseif ($accion == 'eliminar') {
                $sql = "DELETE FROM USUARIO WHERE idUsuario = :idUsuario";
                $stmt = $pdo->prepare($sql);
                $resultado = $stmt->execute([':idUsuario' => $idUsuario]);
    
                if ($resultado) {
                    echo json_encode(['success' => true, 'message' => 'Usuario eliminado exitosamente.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar el usuario.']);
                }
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Error en la solicitud: ' . $e->getMessage()]);
        }
    }

    // Roles
    $sql = "SELECT id, nombre FROM ROL";
    $stmt = $pdo->query($sql);
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $options = "";
    foreach ($resultado as $fila) {
        $options .= "<option value='{$fila['id']}'>{$fila['nombre']}</option>";
    }
    ?>

    <div id="headerContainer"></div>
    <div class="container-fluid">
        <div class="row">
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

                <div>
                    <div class="divider-line"></div>
                    <div class="card-container d-flex justify-content-around">
                        <!-- Aquí se mostrarán las tarjetas de usuarios -->
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
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="agregarUsuarioForm">
                            <div class="form-group">
                                <label for="nombre">Nombre(s)</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidoPaterno">Apellido Paterno</label>
                                <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="apellidoMaterno">Apellido Materno</label>
                                <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" id="usuario" name="usuario" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo Electrónico</label>
                                <input type="email" id="correo" name="correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select id="rol" name="rol" class="form-control" required>
                                    <?php echo $options; ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para editar usuarios -->
        <div class="modal fade" id="editarUsuariosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form id="editarUsuarioForm">
                            <input type="hidden" id="idUsuarioEditar" name="idUsuario">
                            <div class="form-group">
                                <label for="nombreEditar">Nombre(s)</label>
                                <input type="text" id="nombreEditar" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidoPaternoEditar">Apellido Paterno</label>
                                <input type="text" id="apellidoPaternoEditar" name="apellidoPaterno"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidoMaternoEditar">Apellido Materno</label>
                                <input type="text" id="apellidoMaternoEditar" name="apellidoMaterno"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="usuarioEditar">Usuario</label>
                                <input type="text" id="usuarioEditar" name="usuario" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="correoEditar">Correo Electrónico</label>
                                <input type="email" id="correoEditar" name="correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="rolEditar">Rol</label>
                                <select id="rolEditar" name="rol" class="form-control" required>
                                    <?php echo $options; ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <p>Departamento de Formación Docente</p>
            <p>Av. Universidad 1001 Col. Chamilpa C.P. 62209, Cuernavaca, Morelos</p>
        </footer>

        <!-- Scripts -->
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

        document.addEventListener('DOMContentLoaded', function() {
            const agregarUserBtn = document.getElementById('agregarUserBtn');
            const agregarUsuarioForm = document.getElementById('agregarUsuarioForm');
            const editarUsuarioForm = document.getElementById('editarUsuarioForm');
            const buscarInput = document.getElementById('buscarInput');
            const cardContainer = document.querySelector('.card-container');

            // Mostrar el modal para agregar usuario
            agregarUserBtn.addEventListener('click', function() {
                $('#agregarUsuariosModal').modal('show');
            });

            // Envío del formulario para agregar usuario
            agregarUsuarioForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(agregarUsuarioForm);
                formData.append('accion', 'agregar');

                fetch('', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Éxito', 'Usuario agregado exitosamente.', 'success');
                            $('#agregarUsuariosModal').modal('hide');
                            // Actualizar la lista de usuarios
                            actualizarListaUsuarios();
                        } else {
                            Swal.fire('Error', 'Error al agregar el usuario.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error', 'Error en la solicitud.', 'error');
                    });
            });

            // Envío del formulario para editar usuario
            editarUsuarioForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(editarUsuarioForm);
                formData.append('accion', 'editar');

                fetch('', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Éxito', 'Usuario editado exitosamente.', 'success');
                            $('#editarUsuariosModal').modal('hide');
                            // Actualizar la lista de usuarios
                            actualizarListaUsuarios();
                        } else {
                            Swal.fire('Error', 'Error al editar el usuario.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error', 'Error en la solicitud.', 'error');
                    });
            });

            // filtrar tarjetas de usuario
            function filtrarTarjetas() {
                const filtro = buscarInput.value.toLowerCase();
                const tarjetas = cardContainer.getElementsByClassName('card');

                for (let i = 0; i < tarjetas.length; i++) {
                    let card = tarjetas[i];
                    const texto = card.innerText.toLowerCase();
                    if (texto.includes(filtro)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                }
            }

            // ejecutar la función de filtrado cuando se escribe en el input
            buscarInput.addEventListener('input', filtrarTarjetas);
        });
        </script>
    </div>
</body>

</html>