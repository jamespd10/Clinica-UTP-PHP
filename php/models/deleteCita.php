<?php

try {
    include '../db/Connection.php';
    require_once('./enviarCorreo.php');
    //require_once('../db/android/enviarNotificacion.php');
    $id = $_GET['id'];

    $result = $conn->prepare("DELETE FROM citas WHERE Num_Cita = $id");
    $result->execute();
    //$resultCorreo = $conn->prepare("SELECT usuario.Email, citas.Num_Cita FROM citas JOIN usuario ON citas.ID_Paciente=usuario.ID_User WHERE citas.Num_Cita = $id;");
    //$resultCorreo->execute();
    //$correo = $resultCorreo->fetch(PDO::FETCH_OBJ);
    $resultCorreo = $conn->prepare("SELECT usuario.Email, citas_registro.Num_Cita FROM citas_registro JOIN usuario ON citas_registro.ID_Paciente=usuario.ID_User WHERE citas_registro.Num_Cita = $id;");
    $resultCorreo->execute();
    $correo = $resultCorreo->fetch(PDO::FETCH_OBJ);
    enviarCorreoDelete($correo->Email);
    $conn = null;
    exit(json_encode($result->fetchAll(PDO::FETCH_ASSOC)));
} catch(Exception $e) {
    echo $e->getMessage();
}