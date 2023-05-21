<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $msg)
{
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'backslashcompany0001@gmail.com';
    $mail->Password = 'qrewcwscxpjzssgk';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('backslashcompany0001@gmail.com', 'Name');
    $mail->addAddress($email, 'Name');

    $mail->isHTML(true);
    $mail->Subject = 'Verification-Activate your account';
    $mail->Body = $msg;
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    if ($mail->send())
        return true;
    else
        return false;
}
?>