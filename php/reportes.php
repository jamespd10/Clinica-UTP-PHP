<?php
session_start();
include "sesion/validar.php";
require_once('models/User.php');
require_once('db/getPacientes.php');

$user = unserialize($_SESSION['user']);
$nav = $_SESSION['nav'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="../img/logo_utp.png">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="../css/graficas/reportes.css">
    <title>Clínica Universitaria</title>
</head>

<body>
    <?php require $nav; ?>
    <div class="container">
        <h1>Reportes Estadísticos</h1>
        <div class="accordion mb-5" id="accordionExample">
            <div class="card">
                <div class="card-header" type="button" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne" id="headingOne">
                    <h4 class="mb-0">
                        ¿Por qué usamos reportes?
                    </h4>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        La Clínica Universitaria brinda servicios de salud a la población de la universidad, lo cual los
                        reportes y estadísticas son necesarios para gestionar los servicios que más se utilizan y poder
                        brindarlos con mejor eficacia.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo" id="headingTwo">
                    <h4 class="mb-0">
                        Tipos de gráficas
                    </h4>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Utilizamos los tipos de gráficas que prefiera y mejor se adapte a sus necesidades.
                        <ul>
                            <li>Gráfico de Líneas.</li>
                            <li>Gráfico de Barras.</li>
                            <li>Gráfico de Pastel.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" type="button" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree" id="headingThree">
                    <h4 class="mb-0">
                        Reportes
                    </h4>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <!--<ul id="reportes">
                            <li><a href="../pdf/citasFacultad.php">Reporte De Citas De Facultad Por Mes.</a></li>
                            <li><a href="../pdf/enfermedadesPacientes.php">Reporte De Cantidad De Pacientes Por Enfermedad del año 2019.</a></li>
                            <li><a href="#line">Cantidad de pacientes por mes del año</a></li>
                        </ul>-->
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading">Nota!</h4>
                            <p>Para visualizar las gráficas debera seleccionar el reporte que desea, seguido del año y
                                finalmente el tipo de gráfica.</p>
                            <hr>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                                </div>
                                <select class="custom-select" id="inputReporte">
                                    <option selected value="0">Reporte</option>
                                    <option value="1">Total De Citas</option>
                                    <option value="2">Total De Citas Por Facultad</option>
                                    <option value="3">Total De Citas Por Sede</option>
                                    <option value="4">Cantidad De Pacientes Por Enfermedad</option>
                                </select>
                                <select class="custom-select" id="inputYear">
                                    <option selected value="0">Año</option>
                                    <?php 
                                        for($i = 2018; $i<=date("Y"); $i++){
                                            echo "<option value='$i'>$i</option>";
                                        }
                                    ?>
                                </select>
                                <select class="custom-select" id="inputGrafica">
                                    <option selected value="0">Gráfica</option>
                                    <option value="1">Líneas</option>
                                    <option value="2">Barras</option>
                                    <option value="3">Pastel</option>
                                </select>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <button id="enviarBtn" class="btn">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Grid row-->
        <div class="row d-flex justify-content-center mt-5" id="line">
            <!--Grid column-->
            <div class="col-sm">
                <div class="card border-secondary mb-3" id="cardGrafica" style="display:none;">
                    <div class="card-header">Cantidad de pacientes por mes del año 2020</div>
                    <div class="card-body">
                        <h5 class="card-title">En esta gráfica se muestran el número de pacientes que ingresaron a la
                            clínica universitaria</h5>
                        <p class="card-text">
                            <canvas id="lineChart" style="display:none;"></canvas>
                            <canvas id="barChart" style="display:none;"></canvas>
                            <canvas id="pieChart" style="display:none;"></canvas>
                        </p>
                        <form action="../pdf/enfermedadesPacientes.php">
                            <button class="btn" id="generarPdf" type="submit">Generar PDF</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <?php require 'footer.php' ?>
    <!-- JQuery -->
    <script type="text/javascript" src="../js/graficas/jquery.js"></script>
    <script type="text/javascript" src="../js/graficas/mdb.js"></script>
    <script src="../js/sweetalert/sweetalert.js"></script>
    <!-- SCRIPTS -->
    <script src="../js/graficas/grafica-principal.js"></script>
</body>

</html>