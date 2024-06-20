<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('conexion.php');
    $email = $_POST['email'] ?? '';

    header('Content-Type: application/json');
    $response = [];

    if (empty($email)) {
        $response = [
            'success' => false,
            'message' => 'Correo electrónico no proporcionado'
        ];
        echo json_encode($response);
        exit;
    }

    $conexion = new CConexion();
    $conn = $conexion->conexionBD();

    try {
        $stmt = $conn->prepare("SELECT * FROM USUARIO WHERE correo = :correo");
        $stmt->bindParam(':correo', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $response = [
                'success' => true,
                'user' => $user
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Usuario no encontrado'
            ];
        }
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => 'Error al conectar con la base de datos'
        ];
    }

    echo json_encode($response);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/css/styles.css" />
    <link rel="stylesheet" href="./Assets/css/registro.css" />
    <title>Registro</title>
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
<a href="info.php" class="regresar">Regresar</a>
<br>
 <div class="container d-flex justify-content-center align-items-center">
        <div class="form-container p-4 shadow-sm rounded">
            <form id="email-form" method="POST" action="">
                <p class="form-title">Desarrollo de actividades dentro del aula</p>
                <p class="form-sub-title">Ingrese su correo electrónico</p>
                <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
                </div>
                <input type="hidden" id="result-data" name="result-data">
                <button type="submit" class="btn btn-primary w-100">Continuar</button>
            </form>
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
    <script>
document.getElementById('email-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    
    fetch('validate_email.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Usuario Encontrado',
                text: `Nombre: ${data.user.nombre} ${data.user.paterno} ${data.user.materno}\nCorreo: ${data.user.correo}`,
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = 'formaciondocente.php';
            });
        } else {
            Swal.fire({
                title: 'No Encontrado',
                text: data.message,
                icon: 'error',
                showCancelButton: true,
                confirmButtonText: 'Registrar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'register.html';
                }
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Error',
            text: 'Error al procesar la solicitud',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        console.error('Error:', error);
    });
});
</script>

</body>

</html>