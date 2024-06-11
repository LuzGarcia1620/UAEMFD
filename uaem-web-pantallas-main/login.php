<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/login.css">
    <link rel="stylesheet" href="./Assets/css/styles.css">
</head>
<body>
    <div id="headerContainer"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Navbar content -->
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
                <img src="./Assets/img/uaem.png" style="width: 50%;" />
                <span>Departamento de Formación Docente</span>
            </div>
            <div id="right">
                <form action="sesion.php" method="POST">
                    <h1>¡Bienvenido!</h1>
                    <p>Inicia sesión</p>
                    <div class="form-floating mb-3 input-container">
                        <input type="text" class="form-control input-thin" id="usuario" name="usuario" placeholder="Usuario">
                        <label for="usuario">Usuario</label>
                    </div>
                    <div class="form-floating mb-3 input-container position-relative">
                        <input type="password" class="form-control input-thin" id="password" name="password" placeholder="Contraseña">
                        <label for="password">Contraseña</label>
                        <button id="show_password" class="btn password-btn" type="button" onclick="mostrarPassword()">
                            <img id="password_icon" src="./Assets/img/visibilidad.png" width="20px" />
                        </button>
                    </div>
                    <button id="btn_login" class="btn" type="submit">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div> 
    
    <!-- Footer content -->
    </footer>
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
                <div class="col-12 col-md-6 text-center text-md-start">
                    <p class="mb-0">Universidad Autónoma del Estado de Morelos</p>
                    <p class="mb-0">Av. Universidad 1001, Col. Chamilpa, C.P. 62209, Cuernavaca, Morelos, México</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function mostrarPassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password_icon');
            const isPasswordVisible = passwordInput.type === 'password';

            passwordInput.type = isPasswordVisible ? 'text' : 'password';
            passwordIcon.src = isPasswordVisible ? './Assets/img/invisible.png' : './Assets/img/visibilidad.png';
        }
    </script>
    <script src="./Assets/js/bootstrap.bundle.min.js"></script>
    <script src="./Assets/js/login.js"></script>
</body>
</html>
