<?php
include('config.php');
include('header.php');
$required_msg ="";
    if(isset($_POST['submit']) &&!empty($_POST['submit']))
    {
        $id=$_GET['id'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
            {
                 $required_msg = '<span id="error" class="error"> Password is not valid</span>'; 
            }
                if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirmpassword"])) 
                {
                    $up=mysqli_query($con, "UPDATE `register` SET password='$password' WHERE `id`='$id'");
                    if($up==1)
                    {
                    
                        ?>
                        <script>
                        swal.fire("Password Reset Successfully", "", "success")
                        </script>
                        <?php
                        //  header("location:login.php?id=$id");
                    }
                }
                else
                {   
                     $required_msg = '<span id="error" class="error">Password is not match</span>'; 
                }  
    }    
?>
<form method="post">
    <div class="d-flex justify-content-center m-5">
        <div class="card d-flex justify-content-center m-5" style="width: 20rem;">
            <div class="card-body  m-10">
                <h3 class="card-title">Forgot Password ?</h3><br>
                <h6 class="card-subtitle mb-2 text-muted">
                <?= $required_msg ?> 
                <input type="text" id="password" name="password" placeholder="Enter new password" class="form-control"><br><br>
                <input type="text" id="confirmpassword" name="confirmpassword" placeholder="Re-Enter confirm" class="form-control"><br><br>
                <input type="submit" id="submit" name="submit" value="Reset Password"><br><br>
                <div><a href="login.php" class="forget"> Back </a></div>
            </div>
        </div>
    </div>
  </form>
  
<?php include('footer.html'); ?>
  