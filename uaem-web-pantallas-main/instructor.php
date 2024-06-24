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
   
   $perfiles = obtenerPerfiles();
   $modalidades = obtenerModalidades();
   $clasificaciones = obtenerClasificaciones();
   $tipos = obtenerTipos();

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
                <div class="contenido mx-auto" style="max-width:800px;">
                    <h4 id="section-title">Datos Generales</h4>
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
                            <!-- PERFIL SELECTS DESDE LA BD-->
                            <div class="input-field">
                                <select id="perfil" name="perfil" required>
                                    <option value="" disabled selected>Selecciona un perfil</option>
                                    <?php foreach ($perfiles as $perfil): ?>
                                    <option value="<?php echo htmlspecialchars($perfil['id']); ?>">
                                        <?php echo htmlspecialchars($perfil['nombre']); ?>
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
                                <input type="text" id="semblanza" name="semblanza" required></input>
                                <label for="semblanza">Breve Semblanza Curricular</label>
                            </div>
                            <button type="button" class="btn btn-primary botones btn-right"
                                onclick="nextStep()">Siguiente</button>
                        </div>

                        <!-- Sección 2 -->
                        <div class="form-section" style="display: none;">
                            <h5 class="titulos">Modalidad de la Actividad Formativa</h5>
                            <!-- MODALIDAD SELECTS DESDE LA BD-->
                            <div class="input-field">
                                <select id="modalidad" name="modalidad" required onchange="toggleOtraModalidad(this)">
                                    <option value="" disabled selected>Selecciona una modalidad</option>
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
                            <h5 class="titulos">Indique el total de horas para el desarrollo de la actividad</h5>
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
                                <p>Total de la actividad (horas): </p>
                                <input type="number" id="duracion" name="duracion" required readonly>
                            </div>
                            <div class="button-group">
                                <button type="button" class="btn btn-secondary botones btn-left"
                                    onclick="prevStep()">Anterior</button>
                                <button type="button" class="btn btn-primary botones btn-right"
                                    onclick="nextStep()">Siguiente</button>
                            </div>
                        </div>

                        <!-- Sección 3 -->
                        <div class="form-section" style="display: none;">

                            <!-- TIPO SELECTS DESDE LA BD-->
                            <div class="input-field">
                                <select id="tipo" name="tipo" required>
                                    <?php foreach ($tipos as $tipo): ?>
                                    <option value="<?php echo $tipo['id']; ?>"><?php echo $tipo['nombre']; ?></option>
                                    <?php endforeach; ?>
                                    <option value="otro">Otro</option>
                                </select>
                                
                            </div>

                            <div class="input-field" id="otroTipo" style="display: none;">
                                <input type="text" id="otroTipoTexto" name="otroTipoTexto">
                                <label for="otroTipoTexto">Especifique Otro Tipo de Actividad</label>
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
                                <label for="egreso">Perfil de egreso</label>
                            </div>
                            <!-- CLASIFICACION SELECTS DESDE LA BD-->
                            <h5 class="titulos">Clasificación de la actividad</h5>
                            <div class="input-field">
                                <select id="clasificacion" name="clasificacion" required>
                                    <?php foreach ($clasificaciones as $clasificacion): ?>
                                    <option value="<?php echo $clasificacion['id']; ?>">
                                        <?php echo $clasificacion['nombre']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <br>
                                <p>Presentación de la actividad formativa (Máximo 500 palabras)</p>
                                <textarea id="presentacion" name="presentacion" rows="2" cols="50" required
                                    oninput="countWords()"></textarea>
                                <p id="wordCountDisplay">Palabras: 0 / 500</p>
                            </div>
                            <h5 id="section-title">Duración de la Actividad Formativa</h5>
                            <div class="input-field">
                                <input type="text" id="objetivo" name="objetivo" required>
                                <label for="objetivo">Objetivo general</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="temario" name="temario" required>
                                <label for="temario">Temario</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="actividad" name="actividad" required>
                                <label for="actividad">Actividades</label>
                            </div>
                            <div class="button-group">
                                <button type="button" class="btn btn-secondary botones btn-left"
                                    onclick="prevStep()">Anterior</button>
                                <button type="button" class="btn btn-primary botones btn-right"
                                    onclick="nextStep()">Siguiente</button>
                            </div>
                        </div>

                        <!-- Sección 4 -->
                        <div class="form-section" style="display: none;">
                            <h5 class="titulos">Tipo de recurso que requiere (Marque la casilla con la opción deseada)
                            </h5>

                            <div class="checkbox-wrapper-46">
                                <input type="checkbox" id="cbx-46-1" class="inp-cbx" />
                                <label for="cbx-46-1" class="cbx">
                                    <span>
                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg>
                                    </span>
                                    <span>Apertura de Aula virtual en plataforma de aprendizaje Moodle</span>
                                </label>
                            </div>
                            <div class="checkbox-wrapper-46">
                                <input type="checkbox" id="cbx-46-2" class="inp-cbx" />
                                <label for="cbx-46-2" class="cbx">
                                    <span>
                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg>
                                    </span>
                                    <span>Apertura de Aula virtual en plataforma de aprendizaje Microsoft Teams</span>
                                </label>
                            </div>
                            <div class="checkbox-wrapper-46">
                                <input type="checkbox" id="cbx-46-3" class="inp-cbx" />
                                <label for="cbx-46-3" class="cbx">
                                    <span>
                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg>
                                    </span>
                                    <span>Apoyo para la elaboración de recursos digitales como videos, entre
                                        otros</span>
                                </label>
                            </div>
                            <div class="checkbox-wrapper-46">
                                <input type="checkbox" id="cbx-46-4" class="inp-cbx" />
                                <label for="cbx-46-4" class="cbx">
                                    <span>
                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg>
                                    </span>
                                    <span>Apoyo técnico de transmisiones en vivo en plataforma: Google Meet, Zoom o
                                        Microsoft</span>
                                </label>
                            </div>
                            <div class="checkbox-wrapper-46">
                                <input type="checkbox" id="cbx-46-5" class="inp-cbx" />
                                <label for="cbx-46-5" class="cbx">
                                    <span>
                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg>
                                    </span>
                                    <span>Apoyo técnico para montaje de la actividad formativa en plataforma de
                                        aprendizaje Moodle</span>
                                </label>
                            </div>
                            <div class="button-group">
                                <button type="button" class="btn btn-secondary botones btn-left"
                                    onclick="prevStep()">Anterior</button>
                                <button type="submit" class="btn btn-primary enviar">Enviar</button>
                            </div>
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
    function toggleOtraModalidad(select) {
        var otraModalidad = document.getElementById("otraModalidad");
        if (select.value === "otro") {
            otraModalidad.style.display = "block";
        } else {
            otraModalidad.style.display = "none";
        }
    }

    // Mostrar campo "Otro " si selecciona "Otro"


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
    const sectionTitles = [
        'Datos Generales',
        'Características de la Actividad Formativa',
        'Modalidad',
        'Requerimientos para el Desarrollo de la Actividad'
    ];

    function showStep(step) {
        formSections.forEach((section, index) => {
            section.style.display = index === step ? 'block' : 'none';
        });
        document.getElementById('section-title').textContent = sectionTitles[step];
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
    function countWords() {
        const textInput = document.getElementById('presentacion');
        const wordCountDisplay = document.getElementById('wordCountDisplay');
        const words = textInput.value.split(/\s+/).filter(word => word.length > 0);
        const wordCount = words.length;

        wordCountDisplay.textContent = `Palabras: ${wordCount} / 500`;

        if (wordCount > 500) {
            wordCountDisplay.classList.add('word-count');
        } else {
            wordCountDisplay.classList.remove('word-count');
        }
    }

    document.querySelector('form').addEventListener('submit', function(event) {
        const wordCount = document.getElementById('presentacion').value.split(/\s+/).filter(word => word
            .length > 0).length;

        if (wordCount > 500) {
            event.preventDefault();
            alert('El texto no debe superar las 500 palabras.');
        }
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
    </script>
</body>

</html>