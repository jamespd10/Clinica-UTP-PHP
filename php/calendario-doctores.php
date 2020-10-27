<?php
session_start();
include "sesion/validar.php";
require_once('models/User.php');

$user = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Clínica Universitaria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="../img/logo_utp.png">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="../css/fontawesome-free-5.11.2-web/css/all.css">
    <!-- BOOTSTRAP CSS -->
    <link href="../css/bootstrap-4.3.1-dist/calendario/google-css.css" rel="stylesheet">
    <link href="../css/bootstrap-4.3.1-dist/calendario/icon-google.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap-4.3.1-dist/calendario/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/bootstrap-4.3.1-dist/calendario/animate.min.css">
    <link rel="stylesheet" href="../css/bootstrap-4.3.1-dist/calendario/materialize.min.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="../css/calendario.css">
    <link rel="stylesheet" href="../css/bootstrap-4.3.1-dist/calendario/tempusdominus-bootstrap-4.min.css">
</head>

<body id="calendario-body">
    <!-- PRINCIPIO DE COLLAPSE MOBILE -->
    <div class="mobile-header z-depth-1">
        <div class="row">
            <div class="col-2">
                <a href="#" onclick="openMostrar()">
                    <i class="fas fa-bars" style="font-size:35px;"></i>
                </a>
            </div>
            <div class="col">
                <h4><a href="">Calendario de Citas</a></h4>
            </div>
        </div>
    </div>
    <!-- FIN COLLAPSE MOBILE -->
    <div class="main-wrapper">
        <!-- COMIENZO SIDEBAR -->
        <div class="sidebar-wrapper z-depth-2 side-nav fixed" id="sidebar">
            <!-- COMIENZO TITULO SIDEBAR -->
            <div class="sidebar-title">
                <a href="javascript:void(0)" class="closebtn" id="closebtn" onclick="closeMostrar()"
                    style="display:none;">×</a><br><br>
                <h4><img src="../img/logo_utp_1_300.jpg" width="30" height="30" class="d-inline-block align-top" alt=""
                        style="border-radius:160px;"> Clínica UTP</h4>
                <div class="menu-calendario">
                    <div class="abrir-calendario">
                        <a href="#">
                            <h6 onclick="openCalendario()">Menú <i class="fas fa-caret-square-down"></i></h6>
                        </a>
                    </div>
                    <ul class="nav nav-tabs">
                        <div class="menuDesplegado" id="menuDesplegado" style="display:none;">
                            <li>
                                <h6><a class="nav-link" href="./home"><i class="fa fa-fw fa-home"></i> Inicio</a>
                                </h6>
                            </li>
                            <li>
                                <h6><a class="nav-link" href="./profile"><i class="fas fa-user"></i> Perfil</a>
                                </h6>
                            </li>
                            <li>
                                <h6><a class="nav-link" href="./expedientes"><i class="fas fa-users"></i>
                                        Pacientes</a></h6>
                            </li>
                            <li>
                                <h6><a class="nav-link" href="./calendario"><i class="far fa-calendar-alt"></i>
                                        Calendario</a></h6>
                            </li>
                            <li>
                                <h6 id="sesion"><a href="sesion/salir"><i class="fas fa-sign-out-alt"></i> Cerrar
                                        Sesión</a>
                                </h6>
                            </li>
                        </div>
                    </ul>
                </div>
                <h4 class="calendar-labels">Citas</h4>
                <!-- FECHA RECIBIDA Y MOSTRADA EN SIDEBAR TITULO -->
                <h5 id="eventDayName" class="calendar-labels">Fecha</h5>
            </div>
            <!-- EVENTOS RECIBIDOS Y MOSTRADOS EN SIDEBAR TITULO -->
            <div class="sidebar-events" id="sidebarEvents">
                <div class="empty-message">Lo sentimos, no hay citas en la fecha seleccionada</div>
            </div>
            <!-- FIN TITULO SIDEBAR -->
        </div>
        <!-- FIN SIDEBAR -->
        <!-- CONTENIDO DEL CALENDARIO -->
        <div class="content-wrapper grey lighten-3">
            <div class="container">
                <div class="calendar-wrapper z-depth-2">
                    <div class="header-background">
                        <div class="calendar-header">
                            <a class="prev-button" id="prev">
                                <i class="fas fa-arrow-left fa-lg" style="font-size:50px; color:white;"></i>
                            </a>
                            <a class="next-button" id="next">
                                <i class="fas fa-arrow-right fa-lg" style="font-size:50px; color:white;"></i>
                            </a>
                            <div class="row header-title">
                                <div class="header-text">
                                    <h3 id="month-name">February</h3>
                                    <h5 id="todayDayName">Today is Friday 7 Feb</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content">
                        <div id="calendar-table" class="calendar-cells">
                            <div id="table-header">
                                <div class="row">
                                    <div class="col">Dom</div>
                                    <div class="col">Lun</div>
                                    <div class="col">Mar</div>
                                    <div class="col">Mié</div>
                                    <div class="col">Jue</div>
                                    <div class="col">Vie</div>
                                    <div class="col">Sáb</div>
                                </div>
                            </div>
                            <div id="table-body" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../css/bootstrap-4.3.1-dist/js/jquery/jquery-3.4.1.min.js"></script>
    <script src="../css/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="../css/bootstrap-4.3.1-dist/js/materialize.min.js"></script>
    <script src="../css/bootstrap-4.3.1-dist/calendario/materialize.min.js/moment.min.js"></script>
    <script src="../css/bootstrap-4.3.1-dist/calendario/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../css/bootstrap-4.3.1-dist/calendario/google-jquery.min.js"></script>
    <script src="../js/sweetalert/sweetalert.js"></script>
    <script src="../js/citas.js"></script>
    <script src="../js/calendario.js"></script>
    <?php require './footer.php' ?>
</body>

</html>