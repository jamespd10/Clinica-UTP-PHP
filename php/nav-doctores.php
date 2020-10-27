<?php
require_once('models/User.php');

$user = unserialize($_SESSION['user']);
?>
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
    <link rel="stylesheet" href="../css/nav.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="../css/bootstrap-4.3.1-dist/css/bootstrap.css">
    <title>Clínica Universitaria</title>
</head>

<body>
    <!--SIDEBAR-->
    <div id="navSidebar" class="sidebarNav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="./profile"><i class="fas fa-user-md"></i> Perfil</a>
        <a href="./expedientes"><i class="fas fa-users"></i> Pacientes</a>
        <a href="sesion/salir"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>
    <!--TERMINACION DEL SIDEBAR-->

    <!--DIV PRINCIPAL-->
    <div id="mainNav">
        <!--NAV DE PRUEBA-->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background: #51034f;">
            <button id="kk" class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="./home">
                <img src="../img/logo_utp_1_300.jpg" width="30" height="30" class="d-inline-block align-top" alt=""
                    style="border-radius:160px;">
                Clínica UTP
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="./home"><i class="fa fa-fw fa-home"></i> Inicio <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./calendario-doctores"><i class="far fa-calendar-alt"></i>
                            Calendario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="openNav()">Más <i class="far fa-caret-square-down"
                                onclick="openNav()"></i></a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <h3 id="link-perfil">
                        <a href="./profile"><?php echo $user->getNombre() . ' ' . $user->getApellido(); ?></a>
                    </h3>
                    <a href="./profile">
                        <img src="<?php echo '../'.$user->getFoto();?>" width="30" height="30"
                            class="d-inline-block align-top" alt="" style="border-radius:160px;">
                    </a>
                </div>
            </div>
        </nav>
        <!--TERMINACION DEL NAV-->

        <!--CONTENIDO DE PRUEBA-->

        <!--TERMINACION DEL CONTENIDO-->
    </div>
    <!--TERMINACION DEL DIV PRINCIPAL-->
    
    <!--BOOTSTRAP SCRIPTS-->
    <script src="../css/bootstrap-4.3.1-dist/js/jquery/popper.min.js"></script>
    <script src="../css/bootstrap-4.3.1-dist/js/jquery/jquery-3.4.1.min.js"></script>
    <script src="../css/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <!--SCRIPTS-->
    <script src="../js/side.js"></script>
</body>

</html>