<?php
try {
    include '../db/Connection.php';
    $where = '';

    if($_GET['type'] != 2) {
        $id = $_GET['id'];
        $type = $_GET['type'];

        if($type == 1)
            $where = "WHERE ID_Paciente = $id";
        elseif($type == 3)
            $where = "WHERE ID_Medico = $id";
    }

    $result = $conn->prepare("SELECT Fecha FROM citas $where;");
    $result->execute();
    $conn = null;

    exit(json_encode($result->fetchAll(PDO::FETCH_ASSOC)));
} catch(Exception $e) {
    echo "getAllCitas: $e->getMessage()";
}