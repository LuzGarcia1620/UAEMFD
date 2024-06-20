<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de Actividad Formativa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./Assets/css/instructor.css" />
    <link rel="stylesheet" href="./Assets/css/styles.css" />
</head>

<body>

    <?php
   include_once("conexion.php");
   $conexion = new CConexion();
   $conexion->conexionBD(); // Conectar a la base de datos
   
   /* Fetch perfil options
   $stmtPerfil = $conexion->getConnection()->query("SELECT id, nombre FROM PERFIL");
   $perfiles = $stmtPerfil->fetchAll(PDO::FETCH_ASSOC);
   
   // Fetch modalidad options
   $stmtModalidad = $conexion->getConnection()->query("SELECT id, nombre FROM MODALIDAD");
   $modalidades = $stmtModalidad->fetchAll(PDO::FETCH_ASSOC);*/
    ?>

    <div id="headerContainer"></div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
            <div class="col-lg-2">
                <ul class="list-unstyled vertical-nav">
                    <li><a href="perfil.php" class="btn btn-block my-1 menu">Perfil</a></li>
                    <li><a href="actividadformativa.php" class="btn btn-primary btn-block my-1 menu">Formulario</a></li>
                    <li><a href="usuarios.php" class="btn btn-primary btn-block my-1 menu">Lista de Asistencia</a></li>
                    <li><a href="consultas.php" class="btn btn-primary btn-block my-1 menu">Material</a></li>
                    <li><a href="salir.php" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
                </ul>
            </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10">
                <div class="contenido">
                    <h5>Datos Generales</h5>
                    <div class="line"></div>
                    <form class="form" action="procesar_formulario.php" method="POST">
                        <!-- Sección 1 -->
                        <div class="form-section">
                            <div class="input-field">
                                <input type="text" id="nombre" name="nombre" required>
                                <label for="nombre">Nombre(s)</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="apellidoPaterno" name="apellidoPaterno" required>
                                <label for="apellidoPaterno">Apellido Paterno</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="apellidoMaterno" name="apellidoMaterno" required>
                                <label for="apellidoMaterno">Apellido Materno</label>
                            </div>
                            <div class="input-field">
                                <input type="email" id="correo" name="correo" required>
                                <label for="correo">Correo Electrónico</label>
                            </div>
                            <div class="input-field">
                                <input type="tel" id="telefono" name="telefono" required>
                                <label for="telefono">Teléfono de Contacto</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="gradoAcademico" name="gradoAcademico" required>
                                <label for="gradoAcademico">Último Grado Académico</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="institucion" name="institucion" required>
                                <label for="institucion">Institución Académica del Último Grado</label>
                            </div>
                            <div class="input-field">
                                <select id="perfil" name="perfil" required>
                                    <?php foreach ($perfiles as $perfil): ?>
                                    <option value="<?php echo $perfil['id']; ?>"><?php echo $perfil['nombre']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <input type="text" id="docencia" name="docencia" required>
                                <label for="docencia">Tiempo Dedicado a la Docencia</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="areas" name="areas" required>
                                <label for="areas">Áreas de Dominio</label>
                            </div>
                            <div class="input-field">
                                <textarea id="semblanza" name="semblanza" rows="3" required></textarea>
                                <label for="semblanza">Breve Semblanza Curricular</label>
                            </div>
                            <button type="button" class="btn btn-primary botones"
                                onclick="nextStep()">Siguiente</button>
                        </div>
                        <!-- Sección 2 -->
                        <div class="form-section" style="display: none;">
                            <h4>Características de la actividad formativa</h4>
                            <h5>Modalidad de la Actividad Formativa</h5>
                            <div class="input-field">
                                <select id="modalidad" name="modalidad" required>
                                    <?php foreach ($modalidades as $modalidad): ?>
                                    <option value="<?php echo $modalidad['id']; ?>"><?php echo $modalidad['nombre']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="input-field" id="otraModalidad" style="display: none;">
                                <input type="text" id="otraModalidadTexto" name="otraModalidadTexto">
                                <label for="otraModalidadTexto">Especifique Otra Modalidad</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="nombreActividad" name="nombreActividad" required>
                                <label for="nombreActividad">Nombre de la Actividad</label>
                            </div>
                            <h5>Indique el total de horas para el desarrollo de la actividad</h5>
                            <div class="input-field">
                                <input type="number" id="presencial" name="presencial" required>
                                <label for="presencial">Presenciales</label>
                            </div>
                            <div class="input-field">
                                <input type="number" id="enLinea" name="enLinea" required>
                                <label for="enLinea">En Línea</label>
                            </div>
                            <div class="input-field">
                                <input type="number" id="independiente" name="independiente" required>
                                <label for="independiente">Trabajo Independiente</label>
                            </div>
                            <div class="input-field">
                                <input type="number" id="duracion" name="duracion" required readonly>
                                <label for="duracion">Total de la Actividad Formativa (Horas)</label>
                            </div>
                            <div class="button-group">
                                <button type="button" class="btn btn-secondary botones"
                                    onclick="prevStep()">Anterior</button>
                                <button type="button" class="btn btn-primary botones"
                                    onclick="nextStep()">Siguiente</button>
                            </div>
                        </div>
                        <!-- Sección 3 -->
                        <div class="form-section" style="display: none;">
                            <h4>Características de la actividad formativa</h4>
                            <h5>Modalidad de la Actividad Formativa</h5>
                            <div class="input-field">
                                <select id="tipo" name="tipo" required>
                                    <?php foreach ($tipos as $tipo): ?>
                                    <option value="<?php echo $tipo['id']; ?>"><?php echo $tipo['nombre']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <input type="text" id="dirigido" name="dirigido" required>
                                <label for="dirigido">Dirigido a</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="ingreso" name="ingreso" required>
                                <label for="ingreso">Perfil de ingreso</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="egreso" name="egreso" required>
                                <label for="egreso">Perfil de Egreso</label>
                            </div>
                            <h5>Clasificación de la actividad</h5>
                            <div class="input-field">
                                <select id="clasificacion" name="clasificacion" required>
                                    <?php foreach ($clasificaciones as $clasificacion): ?>
                                    <option value="<?php echo $clasificacion['id']; ?>">
                                        <?php echo $clasificacion['nombre']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                    <option value="otro">clasificacion</option>
                                </select>
                            </div>
                            <div class="button-group">
                                <button type="button" class="btn btn-secondary botones"
                                    onclick="prevStep()">Anterior</button>
                                <button type="button" class="btn btn-primary botones"
                                    onclick="nextStep()">Siguiente</button>
                            </div>
                        </div>
                </div>

                <!-- Sección 4 -->
                <div class="form-section" style="display: none;">

                </div>
                <h5>Programa general de la actividad formativa</h5>
                <div class="word-counter">
                    <label for="texto">Presentación de la actividad formativa (máximo 500 palabras):</label><br>
                    <textarea id="texto" rows="6" cols="50"></textarea>
                </div>
                <div>
                    <p>Palabras restantes: <span id="contador"></span></p>
                </div>

                <div class="input-field">
                    <input type="text" id="objetivo" name="objetivo" required>
                    <label for="objetivo">Objetivo general</label>
                </div>
                <div class="input-field">
                    <input type="text" id="temario" name="temario" required>
                    <label for="temario">Temario</label>
                </div>
                <div class="input-field">
                    <input type="text" id="Actividades" name="Actividades" required>
                    <label for="Actividades">Actividades</label>
                </div>
                <div class="button-group">
                    <button type="button" class="btn btn-secondary botones" onclick="prevStep()">Anterior</button>
                    <button type="button" class="btn btn-primary botones" onclick="nextStep()">Siguiente</button>
                </div>
            </div>
            </div>

            <!-- Sección 5 -->
            <div class="form-section" style="display: none;">
                <h5>Requerimientos para el desarrollo de la actividad</h5>

                <button type="button" class="btn btn-secondary" onclick="prevStep()">Anterior</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>

            <!-- Sección 6 -->
            <div class="form-section" style="display: none;">
                <h3>Confirmación y Envío</h3>
                <!-- Puedes agregar cualquier información adicional aquí -->
                <button type="button" class="btn btn-secondary botones" onclick="prevStep()">Anterior</button>
                <button type="submit" class="btn btn-primary botones">Enviar</button>
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

    <script>
    // Mostrar campo "Otra Modalidad" si selecciona "Otro"
    document.getElementById('modalidad').addEventListener('change', function() {
        var otraModalidad = document.getElementById('otraModalidad');
        if (this.value === 'otro') {
            otraModalidad.style.display = 'block';
        } else {
            otraModalidad.style.display = 'none';
        }
    });

    // Calcular duración total
    function calcularDuracionTotal() {
        var presencial = parseInt(document.getElementById('presencial').value) || 0;
        var enLinea = parseInt(document.getElementById('enLinea').value) || 0;
        var independiente = parseInt(document.getElementById('independiente').value) || 0;
        var duracion = presencial + enLinea + independiente;
        document.getElementById('duracion').value = duracion;
    }

    document.getElementById('presencial').addEventListener('input', calcularDuracionTotal);
    document.getElementById('enLinea').addEventListener('input', calcularDuracionTotal);
    document.getElementById('independiente').addEventListener('input', calcularDuracionTotal);

    // Manejo de la navegación entre secciones del formulario
    let currentStep = 0;
    const formSections = document.querySelectorAll('.form-section');

    function showStep(step) {
        formSections.forEach((section, index) => {
            section.style.display = index === step ? 'block' : 'none';
        });
    }

    function nextStep() {
        if (currentStep < formSections.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    }

    // Inicializar el formulario mostrando la primera sección
    showStep(currentStep);

    //contador de palabras
    document.addEventListener('DOMContentLoaded', function() {
        var textarea = document.getElementById('texto');
        var contador = document.getElementById('contador');

        textarea.addEventListener('input', function() {
            var texto = textarea.value;
            var palabras = texto.split(/\s+/); // Dividir por cualquier secuencia de espacios en blanco
            var numPalabras = palabras.length;

            if (numPalabras > 500) {
                // Si se excede el límite, se recorta
                texto = palabras.slice(0, 500).join(" ");
                textarea.value = texto;
                numPalabras = 500;
            }

            contador.textContent = 500 - numPalabras;
        });
    });



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
</body>

</html>