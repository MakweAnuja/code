<?php
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
    header("location: verifyman.php");
                    $from ="bhoopendrachaurasiya.ciss@gmail.com
                    ";
					$to=$_POST['$email'];
					$subject="verify-account-otp";
					// Generating otp with php rand variable
					$otp=rand(100000,999999);
					$message=strval($otp);
					$headers="From:" .$from;
					if(mail($to,$subject,$message,$headers)){
                        $username="username";
                        $otp="otp";
                        $email="email";
						header("Location:home.html");
					}
					else
                    {
						echo("mail send faild");
                    }

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
    <div class="container">
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