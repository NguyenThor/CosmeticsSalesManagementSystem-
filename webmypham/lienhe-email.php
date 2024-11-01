<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["address"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $email =  new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.example.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->$username = "you@example.com";
    $mail->$password = "password";

    $mail->setFrom($email, $name);
    $mail->addAddress("nganb1906328@student.ctu.edu.vn", "Ngan");

    $mail->Address = $address;
    $mail->Body = $message;

    $mail->send();
    
    
    header("Location: sent.php");

?>