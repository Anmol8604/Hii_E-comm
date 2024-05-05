<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

try {
    if (!isset($_SESSION['link']) || !isset($_SESSION['email'])) {
        return;
    }
    $link = $_SESSION['link'];
    $email = $_SESSION['email'];
    $user = $_SESSION['user'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'shanmol6740@gmail.com';
    $mail->Password   = 'zwxvvjwcpvdgossb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('shanmol6740@gmail.com', "Hii E-Comm");
    $mail->addAddress($email, $user);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Verify your account';
    $mail->Body    = '  
    <body style="padding: 0 15%;">
        <div style="padding: 30px 0;">
            <img style="max-width: 100px; margin: auto; display: block;" src="https://assets.bootstrapemail.com/logos/light/square.png" />
            <div style="text-align: center;">
                <h1>Thank you! For signing up in our Page</h1>
                <p>
                    We are happy to have you in our page. We are looking forward to provide you the best service. <br>
                    Click the link below to verify your email and complete the registration process.
                </p>
                <a style="padding: 10px 20px; background-color: rgba(0, 0, 0, 0.735); border-radius: 15px; text-decoration: none; color: white;" href="' . $link . '">Click here</a></a>
            </div>
        </div>
    </body>
    ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
