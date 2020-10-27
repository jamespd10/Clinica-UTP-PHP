<?php
session_start();
require_once('../models/User.php');

try{
    // Traer datos de Login
    $cedula = $_POST['cedula'];
    $pa = $_POST['pass'];
    $pass = sha1(md5($pa));

    include '../db/Connection.php';

    // Realizar consulta
    $result = $conn->prepare("SELECT ID_User, Nombre, Cedula, Apellido, Tipo_Usuario, Email, Foto, Telefono FROM usuario WHERE Cedula = '$cedula' and Clave = '$pass';");
    $result->execute();
    
    // Setear datos del usuario
    if($row = $result->fetch(PDO::FETCH_OBJ)) {
        $user = new User(
            $row->ID_User,
            $row->Nombre,
            $row->Apellido,
            $row->Email,
            $row->Tipo_Usuario,
            $row->Foto,
            $row->Telefono,
            $row->Cedula
        );
        
        $conn = null;
        $result = null;

        // Asignar Navegación correspondiente
        if($user->getTipoUsuario() == 1) // Paciente
            $_SESSION['nav'] = "nav-pacientes.php";
        elseif($user->getTipoUsuario() == 2) // Secretaria
            $_SESSION['nav'] = "nav.php";
        else // Doctor
            $_SESSION['nav'] = "nav-doctores.php";

        // Guardar user en la sesión
        $_SESSION["user"] = serialize($user);

        //header('Location: ../home.php');
        echo '<meta http-equiv="Refresh" content="3; url=../home" />';
    } 
    else{
        $aux = bin2hex(random_bytes(64));
        //$aux=sha1(md5(1));
        header("Location: ../login.php?q=$aux");
        //echo '<meta http-equiv="Refresh" content="5; url=../home.php?renta=$renta" />';
    }
    echo  '<img src="../../img/loading2.gif" alt="Tiempo de espera" 
                style="width:300px;
                        height:325px; 
                        position: fixed;
                        left: 0px;
                        top: 0px;
                        width: 100%;
                        height: 100%;
                        z-index: 9999;
            ">';
} catch(Exception $e) {
    echo "Error!!" . $e->getMessage() . "<br>";
}