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
    <link rel="stylesheet" href="../css/registro.css">
    <title>Clínica Universitaria</title>
</head>

<body>
    <?php
    require $nav;

    $paciente = getPaciente($_GET['selectedID']);
    ?>
    <div class="container">
        <h1>Registro de Paciente</h1>
        <div class="row">
            <div class="col-sm">
                <img src="<?php echo '../'.$paciente->Foto;?>" class="card-img" alt="...">
            </div>
            <div class="col-sm">
                <form action="./registro.php" id="registro">
                    <div class="row">
                        <div class="col">
                            <label for="fname">Nombre</label>
                        </div>
                        <div class="col">
                            <input type="text" id="fname" name="firstname" value="<?php echo $paciente->Nombre;?>"
                                readonly="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="lname">Apellido</label>
                        </div>
                        <div class="col">
                            <input type="text" id="lname" name="lastname" value="<?php echo $paciente->Apellido;?>"
                                readonly="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="lname">Número télefonico</label>
                        </div>
                        <div class="col">
                            <input type="text" id="lname" name="lastname" value="<?php echo $paciente->Telefono;?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="lname">Correo</label>
                        </div>
                        <div class="col">
                            <input type="text" id="lname" name="lastname" value="<?php echo $paciente->Email;?>"
                                readonly="true">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <input type="submit" value="Activar Paciente">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>
    <script src="../js/expedientes.js"></script>
</body>

</html>