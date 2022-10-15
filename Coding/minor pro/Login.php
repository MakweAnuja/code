<?php
include('object.php');
if (isset($_POST['login'])&& !empty($_POST['login']))
{
$email=$_POST['email'];
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
if (!preg_match ($pattern, $email) ){  
    $ErrMsg = "Enter Vaild Email!";  
    echo "<script type ='text/JavaScript'>
    alert('Email is not valid');
    </script>"; 
} 
else{
    // echo $email;
}
$password=$_POST['password'];
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);
if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo "<script type ='text/JavaScript'>
    alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
    </script>";
}
else{
    echo "<script type ='text/JavaScript'>
    alert('Strong password');
    </script>";
    
}
$sql=mysqli_query($con,"SELECT * FROM `info_tab` WHERE email='$email' && password='$password'");
$sqli=mysqli_fetch_assoc($sql);
$count=mysqli_num_rows($sql);
if ($count==1)
{
  header("location: home.html");
}

else
{
  echo "<script type ='text/JavaScript'>
  alert('Enter vaild email and password !');
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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <div class="container">
<div><a href="signup.php" class="forget">Sign up</a></div>

        <h1>Sign In</h1>
  <form method="post">
    <input type="text" name="email" id="email" placeholder="Email or Phone"/><br><br>
    <input type="password" name="password" id="password" placeholder="Password"/><br><br>
    <div><a href="forgotpswd.php" class="forget">Forgot Password?</a></div>
    <input type="submit" id="login" name="login" value="Sign In">
  </form>
</div>
</body>
</html>