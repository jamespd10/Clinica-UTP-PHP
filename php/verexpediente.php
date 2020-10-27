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
    <link rel="stylesheet" href="../css/verexpediente.css">
    <title>Clínica Universitaria</title>
</head>

<body>
    <?php
    require $nav;

    $expediente = getExpediente($_GET['selectedID']);
    ?>
    <div class="container">
        <h1>Expediente Médico
                <a href='./modificar-expediente.php?ID_User=<?php echo "$expediente->ID_User"; ?>' class="btn" id="modificarExpediente">Modificar Expediente</a>
        </h1>
        <div class="row">
            <div class="col-sm">
                <img src="../<?php echo $expediente->Foto;?>" class="card-img" alt="...">
            </div>
            <div class="col-sm">
                <div class="card mb-3" style="max-width: 540px; height:92%;">
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Datos Personales</h5>
                                <h5 class="card-title"><?php echo "$expediente->Nombre $expediente->Apellido"; ?></h5>
                                <p class="card-text">Cédula: <?php echo "$expediente->Cedula"; ?></p>
                                <p class="card-text">Correo: <?php echo "$expediente->Email"; ?></p>
                                <p class="card-text">Dirección: <?php echo "$expediente->Direccion"; ?></p>
                                <p class="card-text">Peso: <?php echo $expediente->Peso?> Kg</p>
                                <p class="card-text">Altura: <?php echo $expediente->Altura?> m</p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Alergías</h5>
                                <p class="card-text">
                                    <ul>
                                        <?php getAlergias($expediente->ID_User); ?>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card mb-3" style="max-width: 540px; height:92%;">
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Última Enfermedad Presentada</h5>
                                <p class="card-text">
                                    <ul>
                                        <li><?php getEnfermedad($expediente->ID_User); ?></li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Últimos Síntomas Presentados</h5>
                                <p class="card-text">
                                    <ul>
                                        <li><?php echo $expediente->Sintomas?></li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Último Diagnóstico Realizado</h5>
                                <p class="card-text">
                                    <ul>
                                        <li><?php echo $expediente->Diagnostico?></li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Últimos Medicamentos Recetados</h5>
                                <p class="card-text">
                                    <ul>
                                        <li><?php echo $expediente->Medicamentos?></li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>