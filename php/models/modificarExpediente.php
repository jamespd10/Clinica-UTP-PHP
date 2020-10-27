<?php

try {
    include '../db/Connection.php';
    
    //Modificar el expediente
    $update = $conn->prepare("UPDATE expedientes SET Peso = :peso, Sintomas = :sintoma, Diagnostico = :diagnostico, Medicamentos = :medicamento, Presion_Arterial = :presion, Temperatura = :temperatura WHERE ID_User = :pacienteId;");
    
    $update->bindParam(':peso', $_POST['peso']);
    $update->bindParam(':sintoma', $_POST['sintoma']);
    $update->bindParam(':diagnostico', $_POST['diagnostico']);
    $update->bindParam(':medicamento', $_POST['medicamento']);
    $update->bindParam(':presion', $_POST['presion']);
    $update->bindParam(':temperatura', $_POST['temperatura']);
    $update->bindParam(':pacienteId', $_POST['pacienteID']);

    $update->execute();

    //Modificar si hay nueva alergia
    if(isset($_POST['nuevaAlergia'])) {
        $update = null;
        $update = $conn->prepare("INSERT INTO alergias (ID_User, Nombre) VALUES (:id_user, :nombre);");
        
        $update->bindParam(':id_user', $_POST['pacienteID']);
        $update->bindParam(':nombre', $_POST['nuevaAlergia']);

        $update->execute();
    }

    //Modificar si hay nueva enfermedad
    if(isset($_POST['enfermedadPresentada'])) {
        $update = null;
        $date = date("Y-m-d h:i:s");

        $update = $conn->prepare("INSERT INTO enfermedad_paciente (ID_Enfermedad, ID_User, Fecha_Enfermedad) VALUES (:id_enfermedad, :pacienteID, :fecha);");
        
        $update->bindParam(':id_enfermedad', $_POST['enfermedadPresentada']);
        $update->bindParam(':pacienteID', $_POST['pacienteID']);
        $update->bindParam(':fecha', $date);

        $update->execute();
    }

    //Agregar nueva enfermedad
    if(isset($_POST['nuevaEnfermedad'])) {
        $update = null;
        $update = $conn->prepare("INSERT INTO enfermedades (Descripcion) VALUES (:descripcion);");
        
        $update->bindParam(':descripcion', $_POST['nuevaEnfermedad']);

        $update->execute();
    }

    $conn = null;
    $update = null;
} catch(Exception $e) {
    echo $e->getMessage();
}