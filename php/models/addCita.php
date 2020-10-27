<?php

/*try {
    include '../db/Connection.php';

    $insert = null;
    $id=$_POST['pacienteID'];
    $resultEnfermedad = $conn->prepare("SELECT ID_Paciente FROM citas WHERE ID_Paciente=$id");
    $resultEnfermedad->execute();
    if($rowEnfermedad = $resultEnfermedad->fetch(PDO::FETCH_OBJ)){
        echo 'nada';
    }
    else{
        if(isset($_POST['secretariaID'])) {
            $insert = $conn->prepare("INSERT INTO citas (ID_Secretaria, ID_Paciente, Fecha, Hora, Motivo, Descripcion, ID_Medico) VALUES (:id_secretaria, :id_paciente, :fecha, :hora, :motivo, :descripcion, :id_medico);");
    
            $insert->bindParam(':id_secretaria', $_POST['secretariaID']);
        } else {
            $insert = $conn->prepare("INSERT INTO citas (ID_Paciente, Fecha, Hora, Motivo, Descripcion, ID_Medico) VALUES (:id_paciente, :fecha, :hora, :motivo, :descripcion, :id_medico);");
        }
        $insert->bindParam(':id_paciente', $id);
        $insert->bindParam(':fecha', $_POST['fecha']);
        $insert->bindParam(':hora', $_POST['hora']);
        $insert->bindParam(':motivo', $_POST['motivo']);
        $insert->bindParam(':descripcion', $_POST['descripcion']);
        $insert->bindParam(':id_medico', $_POST['medicoID']);
    
        $insert->execute();
    }

    $conn = null;
    $insert = null;
} catch(Exception $e) {
    echo $e->getMessage();
}*/

try {
    include '../db/Connection.php';

    $insert = null;
    $id=$_POST['pacienteID'];
    $resultEnfermedad = $conn->prepare("SELECT ID_Paciente FROM citas WHERE ID_Paciente=$id");
    $resultEnfermedad->execute();
    if($rowEnfermedad = $resultEnfermedad->fetch(PDO::FETCH_OBJ)){
        echo 'nada';
    }
    else{
        if(isset($_POST['secretariaID'])) {
            $insert = $conn->prepare("INSERT INTO citas (ID_Secretaria, ID_Paciente, Fecha, Hora, Motivo, Descripcion, ID_Medico) VALUES (:id_secretaria, :id_paciente, :fecha, :hora, :motivo, :descripcion, :id_medico);");
    
            $insert->bindParam(':id_secretaria', $_POST['secretariaID']);
        } else {
            $insert = $conn->prepare("INSERT INTO citas (ID_Paciente, Fecha, Hora, Motivo, Descripcion, ID_Medico) VALUES (:id_paciente, :fecha, :hora, :motivo, :descripcion, :id_medico);");
        }
        $insert->bindParam(':id_paciente', $id);
        $insert->bindParam(':fecha', $_POST['fecha']);
        $insert->bindParam(':hora', $_POST['hora']);
        $insert->bindParam(':motivo', $_POST['motivo']);
        $insert->bindParam(':descripcion', $_POST['descripcion']);
        $insert->bindParam(':id_medico', $_POST['medicoID']);
    
        if($insert->execute()){
            echo 'bien';
        }
        else{
            echo 'error';
        }
    }

    $conn = null;
    $insert = null;
} catch(Exception $e) {
    echo $e->getMessage();
}