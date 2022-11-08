<?php
include('config.php');
include('header.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
// print_r($_POST);
$required_msg ="";
if (isset($_POST['submit'])&& !empty($_POST['submit']))
{
    $email=$_POST['email'];
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
    if (!preg_match ($pattern, $email) )
    { 
        $required_msg = '<span id="error" class="error">Email is required</span>'; 
    } 
    else
    {
        $sql=mysqli_query($con,"SELECT * FROM `register` WHERE email='$email'");
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
                    $up=mysqli_query($con,"UPDATE `register` SET `otpverify`='$message' WHERE email='$email'");
                    if($up)
                    {
                        $sql=mysqli_query($con,"SELECT id FROM `register` WHERE email='$email'");
                        $sqli=mysqli_fetch_array($sql);
                        $eid=$sqli['id'];
                        echo "success";
                    }
                        header("location: verify.php?id=$eid");

                }
            } 
            catch (Exception $e)
            {
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
}
?>
<form method="post" name="contactForm">
    <div class="d-flex justify-content-center m-5">
        <div class="card d-flex justify-content-center m-5" style="width: 20rem;">
            <div class="card-body  m-10">
                <h3 class="card-title">Forgot Password ?</h3><br>
                <h6 class="card-subtitle mb-2 text-muted">
                <?= $required_msg ?>
                <input type="text" id="email" name="email" placeholder="Enter Email" class="form-control mb-4 mt-2">
                <input type="submit" id="submit" name="submit" value="Reset Password" class="form-control bg-primary mb-4">
                <div><a href="login.php" class="forget mb-3">Back </a></div>
            </div>
        </div>
    </div>
</form>


    <?php include('footer.html'); ?>