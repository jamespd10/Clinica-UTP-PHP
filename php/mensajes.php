<?php
session_start();
include "sesion/validar.php";
require_once('models/User.php');

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
    <link rel="stylesheet" href="../css/mensajes.css">
    <!--script src="https://cdn.tiny.cloud/1/ujzwnlonwuggv96dk1nd37dsox2yjxrpeys8y5r7v6zkmkmh/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script-->
    <title>Clínica Universitaria</title>
  </head>
<body>
  <?php require $nav; ?>
  <div class="container">
    <div class="grid-container" id="principal">
      <div class="d-none d-sm-none d-md-block">
        <div class="grid-item" style="width: 300px;">
          <h4 class="card-title">Ultimos Mensajes Enviados</h4>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control" id="inputBuscar" type="search" placeholder="Buscar mensaje..." aria-label="Search" style="width:100%;">
            <button class="btn" id="btnBuscar" type="submit" style="width:100%;">Buscar</button>
          </form>
          <ul class="list-unstyled" id="lista">
            <li class="media">
              <img src="../img/nancy.jpeg" alt="..." width="74px" height="74px">
              <div class="media-body">
                <h5 class="mt-0 mb-1">Nancy Díaz</h5>
                Enviado hoy a las 3pm<br>
                <a href="">Ver</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div>
        <div class="grid-item">
          <h1>Formulario para envío Mensajes</h1>
            <form action="./mensajes.php" id="mensajes">
              <div class="row">
                <div class="col-25">
                  <label for="receptor">Para</label>
                </div>
                <div class="col-75">
                  <div class="autocomplete" style="width:100%;">
                    <input id="myInput" type="text" name="myCountry" placeholder="Correo...">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="asunto">Asunto</label>
                </div>
                <div class="col-75">
                  <input type="text" id="fname" name="firstname" placeholder="Asunto...">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="subject">Mensaje</label>
                </div>
                <div class="col-75">
                  <textarea class="tinymce" id="mensaje" name="mensaje" placeholder="Escribir algo.." style="height:400px"></textarea>
                </div>
              </div>
              <div class="row justify-content-center">
                <input type="submit" value="Enviar">
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
  <?php require 'footer.php' ?>
  <script  src="../js/mensajes.js"></script>
  <script type="text/javascript" src="../js/textarea/js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/textarea/plugin/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="../js/textarea/plugin/tinymce/init-tinymce.js"></script>
</body>
</html>