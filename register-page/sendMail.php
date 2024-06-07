<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


function sendMail($to)
{

  $randomNum = rand(10000, 99999);
  $_SESSION['randomNum'] = $randomNum;
  $text = "Tzimga kirish uchun tasdiqlash kodi: " . $randomNum;

  $mail = new PHPMailer(true);

  // Server settings
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'nurmuhammad.dev13@gmail.com';
  $mail->Password = 'zwutfzuntjkenzef';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  // Recipients
  $mail->setFrom('nurmuhammad.dev13@gmail.com', 'Ecabazar Admin');
  $mail->addAddress($to, 'Recipient'); // Add a recipient

  // Content
  $mail->isHTML(true);
  $mail->Subject = "Tasdiqlash Kodi";
  $mail->Body = $text;

  $mail->send();
}
