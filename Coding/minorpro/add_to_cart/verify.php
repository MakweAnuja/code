<?php
include('config.php');
include('header.php');
$required_msg ="";
if(isset($_POST['submit']) &&! empty($_POST['submit']))
{
    $id=$_GET['id'];
    // echo $id;
    $otp_verify=$_POST['otpverify'];
    $sql=mysqli_query($con,"SELECT * FROM `register` WHERE id='$id'");
    $sqli=mysqli_fetch_array($sql);
    $sqli['otpverify'];
    if ($sqli['otpverify']==$otp_verify)
    {
        header("location:confirm.php?id=$id");
    }
    else
    {
        $required_msg = '<span id="error" class="error">Otp Not Valid</span>'; 

    }
}
?>
<form method="post" name="contactForm" onsubmit="return validateForm()">
    <div class="d-flex justify-content-center m-5">
        <div class="card d-flex justify-content-center m-5" style="width: 20rem;">
            <div class="card-body  m-10">
                <h3 class="card-title">Forgot Password ?</h3><br>
                <h6 class="card-subtitle mb-2 text-muted">
                <?= $required_msg ?> 
                <input type="text" id="otpverify" name="otpverify" placeholder="Enter OTP" class="form-control mb-4">
                <input type="submit" id="submit" name="submit" value="Enter Otp"  class="form-control bg-primary mb-4">
                <div><a href="login.php" class="forget"> Back </a></div>
            </div>
        </div>
    </div>
  </form>
  <script>
    function printError(elemId, hintMsg)
 {
    document.getElementById(elemId).innerHTML = hintMsg;
 }
// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var otpverify = document.contactForm.email.value;
    // alert(email);
    if(otpverify == "")
     {
        printError("otpErr", "Please enter your email address");
     } 
    else 
    {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) 
        {
            printError("otpErr", "Please enter a valid email address");
        } 
        else
        {
            printError("otpErr", "");
            emailErr = false;
        }
    }
    if(emailErr == true)
    {
       return false;
    } 
    else 
    {
        // Creating a string from input data for preview
        
        var dataPreview = {"email":email}
        // alert(JSON.stringify(dataPreview));
        $.ajax({  
            url: 'forgotpswd.php',  
            type: 'POST',
            data: dataPreview,
            success: function(data) {  
                $("#para").html(data);                
            },
            error: function(error) {  
                $("#para").html(error);                
            } 
        }); 
    }
};
</script>


<?php include('footer.html'); ?>
