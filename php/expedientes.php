<?php
session_start();
include "sesion/validar.php";
require_once('models/User.php');
require_once('db/getExpedientes.php');

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
    <link rel="stylesheet" href="../css/expedientes.css">
    <title>Clínica Universitaria</title>
</head>

<body>
    <?php require $nav; ?>
    <div class="container">
        <h1>Pacientes</h1>
        <!--input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre del paciente..."-->
        <!--button id="btn" onclick="ordenarTable()">Ordenar Alfabeticamente</button-->
        <div class="row justify-content-center">
            <div class="col-sm">
                <div class="autocomplete" style="width:100%;">
                    <input id="myInput" type="text" name="myCountry" placeholder="Buscar por nombre del paciente..."
                        style="width:100%;">
                </div>
            </div>
        </div>
        <div class="row justify-content-around" id="pacientes-filter">
            <?php
            getExpedientes();
            ?>
        </div>
    </div>
    <?php require 'footer.php' ?>
    <script src="../js/expedientes.js"></script>
</body>

</html>