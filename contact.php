<?php

require __DIR__ . '/vendor/autoload.php';

use App\Mailer;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 🔐 Sécurisation
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!$email) {
        header("Location: index.html?error=email");
        exit;
    }

    $mailer = new Mailer();
    $sent = $mailer->send($name, $email, $subject, $message);

    if ($sent) {
        header("Location: index.html?success=1");
    } else {
        header("Location: index.html?error=1");
    }

    exit();
}