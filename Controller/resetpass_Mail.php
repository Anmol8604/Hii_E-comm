<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

try {

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'shanmol6740@gmail.com';
    $mail->Password   = 'zwxvvjwcpvdgossb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('shanmol6740@gmail.com', 'Hii E-Comm');
    $mail->addAddress($email);   

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Password Reset Link';
    $mail->Body    = '
    <body style="padding: 0 15%;">
    <div style="padding: 30px 0; max-width: 600px; margin: auto">
        <img style="max-width: 100px; margin: auto; display: block;" src="https://assets.bootstrapemail.com/logos/light/square.png" />
        <div style="text-align: center;">
            <h1>Password Reset</h1>
            <p>
                We received a request to reset your password. Click the button below to set a new password. If you did not make this request, please ignore this email.
            </p>
            <div style="margin: 30px 0;">
                <a style="padding: 10px 20px; background-color: rgba(0, 0, 0, 0.735); color: #fff; text-decoration: none; padding: 15px 30px; border-radius: 4px; font-size: 16px;" href="' . $link . '">Reset Password</a></a>
            </div>
            <p style="font-size: 14px; color: #888; text-align: center;">
                If the button doesn\'t work, copy and paste the following link in your web browser: <br>
                <a href="' . $link . '" style="color: #3498db;"> ' . $link . ' </a>
            </p>
        </div>
    </div>
</body>
    ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
