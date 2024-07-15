<?php

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

    if ($_POST) {
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $phone = $_POST['phone']; 
        $message = $_POST['message']; 
    }

    $mail_icerigi = "VatanSMS sitesinden gelen bir mesajınız var...<br><br>Ad Soyad : $name<br>E-posta : $email<br>Telefon : $phone<br>Mesaj : $message";
    
    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'mctmnks1@gmail.com';                     
    $mail->Password   = 'wptoixhtsxskxxwv';                               
    $mail->SMTPSecure = 'ssl';            
    $mail->Port       = 465;                                    

    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    //Recipients
    $mail->setFrom('iletisim@dvrk.com.tr', 'İletisim - Formu');
    $mail->addAddress('mctmnks1@gmail.com', 'Mecit MENEKŞE');     


    //Content
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';                                  
    $mail->Subject = 'iletisim Formu';
    $mail->Body    = $mail_icerigi;
    $mail->AltBody = $mail_icerigi;

    $mail->send();
    header("Location:index.php?success=1");
} catch (Exception $e) {
    header("Location:index.php?unsuccessful=1");
}
?>
