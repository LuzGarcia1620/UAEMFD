<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/css/styles.css" />
    <link rel="stylesheet" href="./Assets/css/info.css" />
    <title>Formación Docente</title>
</head>

<body>
    <div id="headerContainer"></div>
    <!-- NavBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./evaluaciondocente.php">Evaluación Docente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./formaciondocente.php">Formación Docente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./documentosconsulta.php">Documentos de Consulta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contacto.php">Contacto</a>
                    </li>
                </ul>
                <a class="navbar-brand ms-auto" href="./index.php">UAEM</a>
            </div>
        </div>
    </nav>
    <!-- Fin de la NavBar -->

    <!-- Botón de Regresar -->
<a href="formaciondocente.php" class="regresar">Regresar</a>
<br>

<!-- Card -->
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-3 shadow-md">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="./Assets/img/curso.png" class="img-fluid rounded-start" alt="Img">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h6 class="card-title">Desarrollo de actividades dentro del aula</h6>
                    <p>Dirigido a:</p>
                    <p>Objetivo:</p>
                    <p>Imparte:</p>
                    <p>Modalidad:</p>
                    <p>Fecha:</p>
                    <p>Horario:</p>
                    <div class="text-end">
                        <a href="registro.php" class="btn btn-primary">¡Inscríbete aquí!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--footer-->
    <footer class="bg-custom-footer py-2">
        <div class="container">
            <div class="row">
                <div
                    class="col-12 col-md-6 d-flex flex-column align-items-center align-items-md-center mb-2 mb-md-0 follow-us">
                    <h5 class="text-center text-md-end mb-2">¡Síguenos en nuestras redes sociales!</h5>
                    <div class="d-flex justify-content-center justify-content-md-end follow-us">
                        <a href="mailto:eval_docente@uaem.mx" class="text-white me-2"><img src="./Assets/img/correo.png"
                                alt="Correo" class="img-fluid"></a>
                        <a href="https://www.facebook.com/uaemformaciondocente" class="text-white me-2"><img
                                src="./Assets/img/facebook.png" alt="Facebook" class="img-fluid"></a>
                        <a href="https://www.youtube.com/channel/UCvc3SSAArfY-DsWXXZ4mwhg" class="text-white"><img
                                src="./Assets/img/youtube.png" alt="YouTube" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center text-md-center">
                    <div class="mb-2">
                        <h5 class="mb-1">Universidad Autónoma del Estado de Morelos</h5>
                        <p class="mb-3">Departamento de Formación Docente</p>
                        <p class="mb-1"><img src="./Assets/img/mapas-y-banderas.png" alt="ubicacion" class="img-fluid"
                                style="height: 17px;"> Av. Universidad 1001, Chamilpa, Cuernavaca, Morelos, México</p>
                        <p class="mb-1"><img src="./Assets/img/llamada-telefonica.png" alt="telefono" class="img-fluid"
                                style="height: 17px;"> (777) 329 70 00 Ext. 3249, 3352 y 3935</p>
                        <p class="mb-1"><img src="./Assets/img/correo-electronico.png" alt="correo" class="img-fluid"
                                style="height: 17px;"> eval_docente@uaem.mx</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="./Assets/js/bootstrap.bundle.min.js"></script>

    <script>
    fetch('./templates/header.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('headerContainer').innerHTML = data;
        });
    fetch('./templates/footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footerContainer').innerHTML = data;
        });
    </script>

</body>

</html>