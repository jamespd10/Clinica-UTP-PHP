<?php
try {
    include '../db/Connection.php';
    
    $where = '';

    if($_GET['type'] != 2) {
        $id = $_GET['id'];
        $type = $_GET['type'];
        $date = $_GET['date'];

        if($type == 1)
            $where = "WHERE ID_Paciente = $id and Fecha = '$date'";
        elseif($type == 3)
            $where = "WHERE ID_Medico = $id and Fecha = '$date'";
    }

    $result = $conn->prepare("SELECT citas.Num_Cita, citas.Descripcion, citas.Motivo, citas.Fecha, citas.Hora, usuario.Nombre, usuario.Apellido FROM citas JOIN usuario on citas.ID_Paciente = usuario.ID_User $where;");
    $result->execute();
    $conn = null;

    exit(json_encode($result->fetchAll(PDO::FETCH_ASSOC)));
} catch(Exception $e) {
    echo "getAllCitas: $e->getMessage()";
}