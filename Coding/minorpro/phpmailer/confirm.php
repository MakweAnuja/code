<?php
    include('object.php');
    if(isset($_POST['submit']) &&!empty($_POST['submit']))
    {
        $id=$_GET['id'];
        // echo $id;
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        
        // $sql=mysqli_query($con,"SELECT * FROM `info_tab` WHERE id='$id'");
        // $sqli=mysqli_fetch_array($sql);
        if($password==$confirmpassword)
        {
            // "UPDATE `info_tab` SET `password`='$password' WHERE id='$id'"
            $up=mysqli_query($con, "UPDATE `info_tab` SET password='$password' WHERE `id`='$id'");
            if($up==1)
            {
                header("location:home.php?id=$id");
            }
        }
        else
        {
            echo "<script type ='text/JavaScript'>
                alert('Confirm password!');
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
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Password Change</title>
</head>
<body>

    <div class="container"style="background-image: url('img1.jpg');">
        <form method="post">
            <h1>Password Change</h1>
        <input type="text" id="password" name="password" placeholder="Enter new password"><br><br>
        <input type="text" id="password" name="confirmpassword" placeholder="Re-Enter new password"><br><br>
        <input type="submit" id="login" name="submit" value="Submit"><br><br>
        <div><a href="forgotpswd.php" class="forget"> Back </a></div>
</body>
</html>