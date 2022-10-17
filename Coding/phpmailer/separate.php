<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

//PHPMailer Object


$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
// optional
// used only when SMTP requires authentication  
$mail->SMTPAuth = true;
$mail->Username = 'b97.ciss@gmail.com';
$mail->Password = 'mydkctyimlbseqor';
// if you're using SSL
$mail->SMTPSecure = 'ssl';
// OR use TLS
$mail->SMTPSecure = 'tls';
//From email address and name


$mail->addaddress('bhoopendrachaurasiya.ciss@gmail.com');
                $mail->isHTML(true);
                $mail->Subject = 'Email Verification Otp';
                $mail->Body = 'Gracias por registrarse en Legalhost. Por favor utilice el código OTP para su verificación.';
                $headers = 'noreply@company.com';
                $headers .= "MIME-Version: 1.0 \r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
                $mail->AltBody = $headers;
                try {
                    if($mail->send()==true){
                        echo "success";
                    }
            } catch (Exception $e) {
                echo "unsuccess";
            }
                // if($mail->send()){
                //    echo "success";}


?>
