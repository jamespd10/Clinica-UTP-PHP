<?php
session_start();
include "sesion/validar.php";
require_once('models/User.php');
require_once('db/getDoctores.php');

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
        <h1>Doctores</h1>
        <!--input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre del paciente..."-->
        <!--button id="btn" onclick="ordenarTable()">Ordenar Alfabeticamente</button-->
        <div class="row justify-content-around">
            <?php
            getDoctores();
            ?>
        </div>
    </div>
    <?php require 'footer.php' ?>
    <script  src="../js/expedientes.js"></script>
</body>
</html>