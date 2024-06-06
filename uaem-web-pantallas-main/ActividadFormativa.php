<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Assets/css/ActividadFormativa.css" />
    <link rel="stylesheet" href="Assets/css/styles.css" />
</head>

<body>
    <div id="headerContainer"></div>
    <div class="container-fluid d-flex flex-column min-vh-100">
        <div class="row flex-grow-1">
            <!-- Navegación Vertical -->
            <div class="col-md-2">
                <div class="conte">
                    <ul class="list-unstyled vertical-nav">
                        <li><a href="perfil.php" class="btn btn-block my-1 menu">Perfil</a></li>
                        <li><a href="actividadformativa.php" class="btn btn-primary btn-block my-1 menu">Actividad Formativa</a></li>
                        <li><a href="usuarios.php" class="btn btn-primary btn-block my-1 menu">Usuarios</a></li>
                        <li><a href="consultas.php" class="btn btn-primary btn-block my-1 menu">Consultas</a></li>
                        <li><a href="asistencia.php" class="btn btn-primary btn-block my-1 menu">Asistencia</a></li>
                        <li><a href="salir.php" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
                    </ul>
                </div>
            </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10">
                <br>
                <div class="titulo">Actividades</div>
                <div>
                    <button class="actividad">
                        <img src="Assets/img/agregar.png" alt="Imagen" class="icono">
                        Nueva actividad
                    </button>
                </div>
                <div class="divider-line"></div>
                <br>
                <div class="tabla">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Status</th>
                                <th>Gestión</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Actividad 1</td>
                                <td>Completado</td>
                                <td>
                                    <div class="img-container">
                                        <img src="Assets/img/lupa.png" alt="ver" onclick="openModal('modal1')" />
                                        <img src="Assets/img/editar.png" alt="editar" onclick="openModal('modal2')" />
                                        <img src="Assets/img/borrar.png" alt="borrar" id="deleteActivityImage" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer mt-auto">
            <p>Departamento de Formación Docente</p>
            <p>Av. Universidad 1001 Col. Chamilpa C.P. 62209, Cuernavaca, Morelos</p>
        </footer>
    </div>

    <!-- Modales -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="modal-body-content">
                <div class="modal-footer-title">Ver Actividad</div>
                <div class="divider-line"></div>
                <div class="modal-body-title">Desarrollo de actividades dentro del aula</div>
                <p>Dirigido: personal académico de la UAEM</p>
                <p>Objetivo: Reconocer la utilidad y pertinencia de diversas<br />herramientas didácticas aplicables a
                    la
                    planeación didáctica</p>
                <p>Imparte: Dra. Paulina Lizette Toscano Arenas, Docente de la UAEM</p>
                <p>Modalidad: En línea</p>
                <p>Duración: 20 horas distribuidas en 5 horas sincrónicas y 15 horas asincrónicas.</p>
                <p>Fecha: 22 al 26 de enero de 2024</p>
                <p>Horario: 9:00 a 10:00 h</p>

                <div class="button-container">
                    <div>
                        <button class="blue-button" onclick="closeModal('modal1')">Regresar</button>
                    </div>
                    <div>
                        <button class="green-button">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div id="modal2" class="modal">
        <div class="modal-content">
            <div class="tarjeta">
                <div class="modal-footer-title">Editar Actividad</div>
                <div class="divider-line"></div>
                <form class="formulario">
                    <div class="grupo">
                        <label for="nombre">Nombre de la Actividad</label>
                        <input placeholder="" type="text" id="nombre" name="nombre" required="">
                    </div>
                    <div class="grupo">
                        <label for="dirigido">A quién va dirigido</label>
                        <input placeholder="" type="text" id="dirigido" name="dirigido" required="">
                    </div>
                    <div class="grupo">
                        <label for="objetivo">Objetivo</label>
                        <textarea placeholder="" id="objetivo" name="objetivo" rows="5" required=""></textarea>
                    </div>
                    <div class="grupo">
                        <label for="Instructor">Instructor</label>
                        <select id="Instructor" name="Instructor" required="">
                            <option value="" disabled selected>Selecciona un instructor</option>
                            <!-- Aquí se agregarán las opciones dinámicamente desde el servidor -->
                        </select>
                    </div>
                    <div class="grupo">
                        <label for="Modalidad">Modalidad</label>
                        <select id="Modalidad" name="Modalidad" required="">
                            <option value="" disabled selected>Selecciona una modalidad</option>
                            <option value="Presencial">Presencial</option>
                            <option value="En línea">En línea</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Híbrida">Híbrida</option>
                        </select>
                    </div>
                    <div class="grupo">
                        <label for="Fecha">Fecha</label>
                        <input type="text" id="Fecha" name="Fecha" required="">
                    </div>
                    <div class="grupo">
                        <label for="Duracion">Duración</label>
                        <input placeholder="" id="Duracion" name="Duracion" required="">
                    </div>
                    <div class="grupo">
                        <label for="Horario">Horario</label>
                        <input placeholder="" id="Horario" name="Horario" required="">
                    </div>
                </form>
            </div>

            <div class="button-container">
                <div>
                    <button class="blue-button" onclick="closeModal('modal2')">Regresar</button>
                </div>
                <div>
                    <button class="green-button">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = "block";
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = "none";
        }

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

        // Función para cerrar el modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // SweetAlert para eliminar la actividad al hacer clic en la imagen
        document.getElementById('deleteActivityImage').addEventListener('click', function () {
            Swal.fire({
                title: "¿Está seguro que desea eliminar",
                text: "No podrá deshacer esta acción.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lógica para eliminar la actividad
                    Swal.fire("Eliminado!", "La actividad ha sido eliminada.", "success");
                }
            });
        });
    </script>
</body>

</html>
