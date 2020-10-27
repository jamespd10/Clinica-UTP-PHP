<?php
session_start();
include "sesion/validar.php";
require_once('models/User.php');
require_once('db/getExpedientes.php');
$id = $_GET['ID_User'];
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

    $expediente = getExpediente($_GET['ID_User']);
    ?>
    <div class="container">
        <h1>Expediente Médico
        </h1>
        <div id="modificarExpedienteForm">
            <div class="row">
                <div class="col-sm">
                    <img src="../<?php echo $expediente->Foto;?>" class="card-img" alt="...">
                </div>
                <div class="col-sm">
                    <div class="card mb-5" style="max-width: 540px; height:92%;">
                        <div class="row no-gutters">
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Datos Personales</h5>
                                    <h5 class="card-title">Paciente:
                                        <?php echo "$expediente->Nombre $expediente->Apellido"; ?></h5>
                                    <p class="card-text">Cédula: <?php echo "$expediente->Cedula"; ?></p>
                                    <p class="card-text">Correo: <?php echo "$expediente->Email"; ?></p>
                                    <p class="card-text">Dirección: <?php echo "$expediente->Direccion"; ?></p>
                                    Peso: <input name="peso" id="inPeso" class="form-control input-sm" type="text" class="card-text"
                                        placeholder="<?php echo $expediente->Peso?>"></input> Kg
                                    <p class="card-text">Altura: <?php echo $expediente->Altura?> m</p>
                                    <input type="text" name="pacienteID" id="pacienteID"
                                            value="<?php echo $_GET['ID_User']; ?>" style="display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Alergías <button class="btn btn-outline-secondary"
                                            type="button" onclick="mostrarInput()"><i class="fas fa-plus" id="iAlergia"></i></button>
                                    </h5>
                                    <input class="form-control" type="text" name="alergia"
                                        placeholder="Nueva Alergía..." id="inNuevaAlergia"
                                        style="display:none;">
                                    <p class="card-text">
                                        <ul>
                                            <?php getAlergias($expediente->ID_User); ?>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Presión Arterial</h5>
                                    <input class="form-control" type="text" name="presion"
                                        placeholder="<?php echo $expediente->Presion_Arterial?>" id="inPresion">
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
                                    <h5 class="card-title">Enfermedad Presentada</h5>
                                    <p class="card-text">
                                        <div class="input-group">
                                            <select name="enfermedad" class="custom-select" id="inEnfermedades"
                                                aria-label="Example select with button addon">
                                                <?php getEnfermedades(); ?>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    onclick="mostrarInputEnfermedad()"><i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <input class="form-control mt-5" type="text" name="nueva-enfermedad" placeholder="Enfermedad..."
                                            id="inNuevaEnfermedad" style="display:none;">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Temperatura</h5>
                                    <input class="form-control" type="text" name="temperatura"
                                        placeholder="<?php echo $expediente->Temperatura?>" id="inTemperatura">
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Síntomas Presentados</h5>
                                    <p class="card-text">
                                        <input class="form-control" type="text"
                                            placeholder="<?php echo $expediente->Sintomas?>" name="sintoma" id="inSintoma">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Diagnóstico Realizado</h5>
                                    <p class="card-text">
                                        <input class="form-control" type="text" placeholder="<?php echo $expediente->Diagnostico?>"
                                                    name="diagnostico" id="inDiagnostico">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Medicamentos Recetados</h5>
                                    <p class="card-text">
                                        <input class="form-control" type="text" placeholder="<?php echo $expediente->Medicamentos?>"
                                                    name="medicamento" id="inMedicamento">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="modificarExpediente" class="btn">Modificar</button>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>
    <script src="../js/sweetalert/sweetalert.js"></script>
    <script src="../js/expedientes.js"></script>
</body>

</html>