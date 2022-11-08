<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
include('object.php');
if (isset($_POST['login'])&& !empty($_POST['login']))
{
$email=$_POST['email'];
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
if (!preg_match ($pattern, $email) )
{  
    $ErrMsg = "Enter Vaild Email!";  
    echo "<script type ='text/JavaScript'>
    alert('Email is not valid');
    </script>"; 
} 
$sql=mysqli_query($con,"SELECT * FROM `info_tab` WHERE email='$email'");
$sqli=mysqli_fetch_array($sql);
if($sqli)
{
// $count=mysqli_num_rows($sql);
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
                $otp=rand(100000,999999);
                $message=strval($otp);
                $headers = 'noreply@company.com';
                $headers .= "MIME-Version: 1.0 \r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
                $mail->AltBody = $headers;
                try {
                    if($mail->send()==true){
                        $up=mysqli_query($con,"UPDATE `info_tab` SET`otp_verify`='$message' WHERE email='$email'");
                        if($up)
                        {
                             $sql=mysqli_query($con,"SELECT id FROM `info_tab` WHERE email='$email'");
                             $sqli=mysqli_fetch_array($sql);
                             $eid=$sqli['id'];
                            echo "success";
                        }
                        header("location: verifyman.php?id=$eid");

                    }
            } catch (Exception $e) {
                echo "unsuccess";
            }
                // if($mail->send()){
                //    echo "success";}
}
else
{
    echo "<script type ='text/JavaScript'>
    alert('Not found!');
    </script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
    body
    {
        /* align-items: center; */
    }
</style>
</head>
<body>
    <div class="container" style="background-image: url('img1.jpg');">
    <form method="post">
        <h1>Forgot Password ?</h1>
    <input type="text" id="email" name="email" placeholder="Enter Email"><br><br>
    <!-- <input type="submit" class="verify"><a href="verifyman.html">Submit</a></button> -->
    <input type="submit" id="login" name="login" value="Reset Password">
    <div><a href="Login.php" class="forget"> Back </a></div>

    <!-- <button class="verify"><a href="Login.php">Back</a></button> -->
</form>
</div>

</body>
<script>
    // function myFunction() 
    // {
    //   window.location="verifyman.html";
    // }
  </script>
</html>