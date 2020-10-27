<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function enviarCorreoDelete($correo){
    
    try {
        require '../../phpmailer/src/Exception.php';
        require '../../phpmailer/src/PHPMailer.php';
        require '../../phpmailer/src/SMTP.php';
        require_once('../config/keys.php');

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = EMAIL_USER;
        $mail->Password   = EMAIL_PASSWORD;
        $mail->SMTPSecure = EMAIL_TLS;
        $mail->Port       = EMAIL_PORT;
    
        //Recipients
        $mail->setFrom(EMAIL_USER, 'Clinica UTP');
        $mail->addAddress($correo);
    
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Cita Eliminada';
        $mail->Body    = 'Su cita ha sido eliminada!';
    
        $mail->send();
        exit(json_encode($result->fetchAll(PDO::FETCH_ASSOC)));
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}