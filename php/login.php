<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="../img/logo_utp.png">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="../css/fontawesome-free-5.11.2-web/css/all.css">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="../css/login.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="../css/bootstrap-4.3.1-dist/css/bootstrap.css">
    <title>Clínica Universitaria</title>
</head>

<body>
    <div class="dark-overlay">
        <div class="container" id="main">
            <div class="container-fluid" id="jumbotron">
                <h1 class="display-4">
                    <img src="../img/logo_utp_1_300.jpg" width="70" height="70" class="d-inline-block align-center"
                        alt="logo utp" style="border-radius:160px;">
                    Clínica UTP
                </h1>
                <p class="lead">Bienvenido al sistema de la clínca de la Universidad Tecnológica de Panamá</p>
            </div>
            <div class="card mx-auto mt-5" id="formulario"
                style="border-top-color: #681a5d; border-left: #681a5d; border-right: #681a5d;">
                <div class="card-header text-white" style="background: #681a5d;">Login</div>
                <div class="card-body">
                    <form action="sesion/verifyUser" method="POST">
                        <?php
                            if(isset($_GET['q'])){
                                echo '<div class="alert alert-danger" role="alert">
                                            Las credenciales no coinciden!
                                        </div>';
                            }
                        ?>
                        <div class="form-group" id="form">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" class="form-control" placeholder="Cédula" title="(ejm. 88-8888-8888)"
                                required="required" name="cedula">
                        </div>
                        <div class="form-group" id="form">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" class="form-control" id="pass" placeholder="Contraseña"
                                required="required" name="pass">
                        </div>
                        <div id="verPass">
                            <input type="checkbox" onclick="verPassword()">
                            <span>Ver Contraseña</span>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn">Ingresar</button>
                        <div class="form-group">
                            <!--a href="./recuperar-cuenta" class="badge badge-light"-->
                            <a href="./recuperar-cuenta" class="btn btn-link">Olvidó su contraseña?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>
            <a href="utp.ac.pa">Universidad Tecnológica de Panamá - 2019</a>
        </p>
    </div>
    <!--BOOTSTRAP SCRIPTS-->
    <script src="../css/bootstrap-4.3.1-dist/js/jquery/jquery-3.4.1.min.js"></script>
    <script src="../css/bootstrap-4.3.1-dist/js/jquery/popper.min.js"></script>
    <script src="../css/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <!--SCRIPTS-->
    <script src="../js/login.js"></script>
</body>

</html>