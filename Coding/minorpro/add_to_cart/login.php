<?php
include('config.php');
include('header.php');
// print_r($_POST);
session_start();
if (isset($_POST['login'])&& !empty($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql=mysqli_query($con,"SELECT * FROM `register` WHERE email='$email' && password='$password'");
    $sqli=mysqli_fetch_assoc($sql);
    // print_r($sqli);
    // die;    
    $count=mysqli_num_rows($sql);
if ($count==1)
{
    $_POST['id']=$sqli['id'];
    $_POST['name']=$sqli['name'];
    $_POST['email']=$sqli['email'];
    $_SESSION["id"] = $_POST['id'];
    $_SESSION["name"] = $_POST['name'];
    $_SESSION["email"] = $_POST['email'];
    print_r($_SESSION);
    // die;
   header("location: iindex.php");
}

else
{
//   echo "<p class='text-danger'>Enter vaild email and password </p>";
}
}
?>
<form method="post" name="contactForm" onsubmit="return validateForm()">
    <div class="d-flex justify-content-center m-5">
        <div class="card d-flex justify-content-center m-5" style="width: 20rem;">
            <div class="card-body  m-10">
                <h3 class="card-title mb-3">Sign In </h3>
                <h6 class="card-subtitle mb-2 text-muted">
                <div class="error" id="emailErr"></div>  
                <input type="text" name="email" id="email" placeholder="Email or Phone" class="form-control mb-4"/>
                <div class="error" id="passErr"></div>   
                <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control mb-3"/>
                <div><a href="forgotpswd.php" class="forget mt-4">Forgot Password?</a></div>
                <input type="submit" class="form-control bg-primary mt-4" name="login" value="Sign In">
            </div>
        </div>
    </div>
  </form>
  <script>
// Defining a function to display error message
function printError(elemId, hintMsg)
 {
    document.getElementById(elemId).innerHTML = hintMsg;
 }
// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var email = document.contactForm.email.value;
    // alert(email);
    var password = document.contactForm.password.value; 
    var emailErr = passErr = true;
        // Validate email address
    if(email == "")
     {
        printError("emailErr", "Please enter your email address");
     } 
    else 
    {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) 
        {
            printError("emailErr", "Please enter a valid email address");
        } 
        else
        {
            printError("emailErr", "");
            emailErr = false;
        }
    }
    if(password == "")
    {
        printError("passErr","Please enter Password");
    } 
    else 
    {
        // Regular expression for basic email validation
        var psregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
        if(psregex.test(password) === false) 
        {
            printError("passErr", "Please enter a valid Password");
        } else
        {
            printError("passErr", "");
            passErr = false;
        }
    }
    if((emailErr ||  passErr) == true)
    {
       return false;
    } 
    else 
    {
        // Creating a string from input data for preview
        
        var dataPreview = {"email":email,"password":password}
        // alert(JSON.stringify(dataPreview));
        $.ajax({  
            url: 'login.php',  
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
