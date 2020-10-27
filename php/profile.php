<?php
session_start();
include "sesion/validar.php";
require_once('models/User.php');

$user = $_SESSION['user'];
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
    <link rel="stylesheet" href="../css/registro.css">
    <title>Clínica Universitaria</title>
</head>

<body>
    <?php require $nav; ?>
    <div class="container">
        <h1>Perfil de Usuario</h1>
        <div class="row">
            <div class="col-lg">
                <img src="<?php echo '../'.$user->getFoto();?>" class="card-img" alt="...">
            </div>
            <div class="col-lg">
                <form action="./registro.php" id="registro">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="fname" name="firstname"
                                value="<?php echo $user->getNombre();?>" readonly="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 col-form-label">Apellido</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="lname" name="lastname"
                                value="<?php echo $user->getApellido();?>" readonly="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 col-form-label">Télefono</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="lname" name="lastname"
                                value="<?php echo $user->getTelefono();?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="lname" name="lastname"
                                value="<?php echo $user->getEmail();?>" readonly="true">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <input type="submit" value="Enviar Cambios">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>
    <script src="../js/expedientes.js"></script>
</body>

</html>