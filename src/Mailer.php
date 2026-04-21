<?php

namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function send($name, $email, $subject, $message)
    {
        $mail = new PHPMailer(true);

        try {
            // SMTP config
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'andrinirinafenohasina@gmail.com';
            $mail->Password = 'sefl zniq xmpu hduk';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Expéditeur
            $mail->setFrom($email, $name);

            // Destinataire
            $mail->addAddress('andrinirinafenohasina@gmail.com');

            // Contenu
            $mail->isHTML(true);
            $mail->Subject = $subject;

            $mail->Body = "
                <h3>Nouveau message depuis ton portfolio</h3>
                <p><strong>Nom:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Message:</strong><br>$message</p>
            ";

            return $mail->send();

        } catch (Exception $e) {
            return false;
        }
    }
}