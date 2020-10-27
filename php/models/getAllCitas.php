<?php
try {
    include '../db/Connection.php';
    $date = $_GET['date'];

    $result = $conn->prepare("SELECT citas.Num_Cita, citas.Descripcion, citas.Motivo, citas.Fecha, citas.Hora, usuario.Nombre, usuario.Apellido FROM citas JOIN usuario on citas.ID_Paciente = usuario.ID_User WHERE Fecha = '$date';");
    $result->execute();
    $conn = null;

    exit(json_encode($result->fetchAll(PDO::FETCH_ASSOC)));
} catch(Exception $e) {
    echo "getAllCitas: $e->getMessage()";
}