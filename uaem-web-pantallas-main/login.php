<?php
session_start();
session_destroy();
header("location:login.php");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div id="headerContainer"></div>

    <!-- NavBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./evaluaciondocente.html">Evaluación Docente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./formaciondocente.html">Formación Docente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./documentosconsulta.html">Documentos de Consulta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contacto.html">Contacto</a>
                    </li>
                </ul>
                <a class="navbar-brand ms-auto" href="./index.html">UAEM</a>
            </div>
        </div>
    </nav>

    <div id="container">
        <div class="login-card">
            <div id="left">
                <img src="img/uaem.png" style="width: 50%;" />
                <span>Departamento de Formación Docente</span>
            </div>
            <div id="right">
                <h1>¡Bienvenido!</h1>
                <p>Inicia sesión con tu cuenta</p>
                <input class="Login" type="text" name="usuario" id="usuario" placeholder="Usuario" />
                <div class="input-group">
                    <input class="Login" type="password" name="password" id="password" placeholder="Contraseña" />
                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> 
                        <img class="showPassword2" src="img/invisible.png" width="30px" /> 
                    </button>              
                </div>
                <button id="btn_login" onclick="validar()">Iniciar Sesión</button>
            </div>
        </div>
    </div>
    
    <!-- FOOTER -->
    <footer class="bg-custom-footer py-2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex flex-column align-items-center align-items-md-center mb-2 mb-md-0 follow-us">
                    <h5 class="text-center text-md-end mb-2">¡Síguenos en nuestras redes sociales!</h5>
                    <div class="d-flex justify-content-center justify-content-md-end follow-us">
                        <a href="mailto:eval_docente@uaem.mx" class="text-white me-2"><img src="./../img/correo.png" alt="Correo" class="img-fluid"></a>
                        <a href="https://www.facebook.com/uaemformaciondocente" class="text-white me-2"><img src="./../img/facebook.png" alt="Facebook" class="img-fluid"></a>
                        <a href="https://www.youtube.com/channel/UCvc3SSAArfY-DsWXXZ4mwhg" class="text-white"><img src="./../img/youtube.png" alt="YouTube" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center text-md-center">
                    <div class="mb-2">
                        <h5 class="mb-1">Universidad Autónoma del Estado de Morelos</h5>
                        <p class="mb-3">Departamento de Formación Docente</p>
                        <p class="mb-1"><img src="./../img/mapas-y-banderas.png" alt="ubicacion" class="img-fluid" style="height: 17px;"> Av. Universidad 1001, Chamilpa, Cuernavaca, Morelos, México</p>
                        <p class="mb-1"><img src="./../img/llamada-telefonica.png" alt="telefono" class="img-fluid" style="height: 17px;"> (777) 329 70 00 Ext. 3249, 3352 y 3935</p>
                        <p class="mb-1"><img src="./../img/correo-electronico.png" alt="correo" class="img-fluid" style="height: 17px;"> eval_docente@uaem.mx</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/login.js"></script>
    <script>
        function mostrarPassword() {
            const passwordInput = document.getElementById('password');
            const showPasswordButton = document.getElementById('show_password');
            const showPasswordIcon = showPasswordButton.querySelector('img');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordIcon.src = 'img/visible.png'; //  ojo tachado
            } else {
                passwordInput.type = 'password';
                showPasswordIcon.src = 'img/invisible.png'; // ojo visible
            }
        }
    </script>
</body>
</html>
