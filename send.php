<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


if(isset($_POST['name'])){
    $name = trim($_POST['name']);
    $number = trim($_POST['number']);

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 1;
        $mail->isSMTP();
        $mail->Host       = 'smtp.mail.ru';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'E M A I L';
        $mail->Password   = 'P A S S W O R D';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('E M A I L', $name);
        $mail->addAddress('E M A I L');
        $mail->isHTML(true);
        $mail->Subject = 'Звоните мне (Заявка от equipment)';
        $mail->CharSet = 'UTF-8';
        $mail->MsgHTML(
            "<strong>Имя:</strong> ".$name.",<br><strong>Телефон:</strong> ".$number);
        $mail->send();
        header("location:/");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}