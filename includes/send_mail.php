<?php
/**
 * Created by PhpStorm.
 * User: Antonin
 * Date: 26/11/2018
 * Time: 14:50
 * Source : https://www.dewep.net/realisations/envoyer-un-email-avec-phpmailer
 */

function send_mail($to, $subject, $body)
{
    require "C:/xampp/htdocs/medical_administration/includes/phpmailer/class.phpmailer.php";

    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "anto.testMail@gmail.com";
    $mail->Password = "testMail";
    $mail->SetFrom("anto.testMail@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
}

?>
