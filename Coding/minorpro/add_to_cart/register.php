<?php
include ("config.php");
include ("header.php");
// print_r($_POST);
if (isset($_POST['submit'])&&!empty($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];

    $sql=mysqli_query($con,"INSERT INTO `register`(`name`, `phone`, `email`, `password`)
     VALUES ('$name','$mobile','$email','$password')");
     $last_id = $con->insert_id;
    if($last_id>0)
     {
        ?>
        <script>
                swal.fire("Register Successfully", "", "success")
        </script>
       <?php
     }
     else
     {
        echo("Not inserted");
     }
}
 ?> 

<script>
// Defining a function to display error message
function printError(elemId, hintMsg)
 {
    document.getElementById(elemId).innerHTML = hintMsg;
 }

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var name = document.contactForm.name.value;
    var email = document.contactForm.email.value;
    var mobile = document.contactForm.mobile.value;
    var password = document.contactForm.password.value;    
	// Defining error variables with a default value
    var nameErr = emailErr = mobileErr = passErr = true;
    
    // Validate name
    if(name == "") 
    {
        printError("nameErr", "Please enter your name");
    } 
    else
    {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false)
         {
            printError("nameErr", "Please enter a valid name");
         } 
        else 
        {
            printError("nameErr", "");
            nameErr = false;
        }
    }
    
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
        } else
        {
            printError("emailErr", "");
            emailErr = false;
        }
    }
    
    // Validate mobile number
    if(mobile == "")
     {
        printError("mobileErr", "Please enter your mobile number");
     } 
     else 
     {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(mobile) === false) 
        {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
        } else
        {
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
    
    
    // Validate password
    if(password == "")
     {
        printError("passErr", "Please enter Password");
     } 
    else 
    {
        // Regular expression for basic email validation
        var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
        if(regex.test(password) === false) 
        {
            printError("passErr", "Please enter a valid Password");
        } else
        {
            printError("passErr", "");
            passErr = false;
        }
    }
    
    // Prevent the form from being submitted if there are any errors
    if((nameErr || emailErr || mobileErr || passErr) == true)
     {
       return false;
     } 
    else 
    {
        // Creating a string from input data for preview
        
        var dataPreview = {"name":name, "email":email, "mobile":mobile, "password":password}
        // "You've entered the following details: \n" +
        //                   "Full Name: " + name + "\n" +
        //                   "Email Address: " + email + "\n" +
        //                   "Mobile Number: " + mobile + "\n" +
        //                   "Country: " + country + "\n" +
        //                   "Gender: " + gender + "\n";
        // if(hobbies.length) {
        //     dataPreview += "Hobbies: " + hobbies.join(", ");
        // }
        // Display input data in a dialog box before submitting the form
        // console.log(dataPreview.name);
        // alert(JSON.stringify(dataPreview));
        $.ajax({  
            url: 'register.php',  
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
<form name="contactForm" onsubmit="return validateForm()" method="post">
    <div class="d-flex justify-content-center m-5"> 
        <div class="card d-flex justify-content-center m-5" style="width: 20rem;">
            <div class="card-body  m-10">
                <h3 class="card-title">Create Account</h3><br>
                <h6 class="card-subtitle mb-2 text-muted">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control">
                <div class="error" id="nameErr"></div>
                <label>Email Address</label>
                <input type="text" name="email" class="form-control">
                <div class="error" id="emailErr"></div>           
                <label>Mobile Number</label>
                <input type="text" id="para" name="mobile" class="form-control" maxlength="10">
                <div class="error" id="mobileErr"></div>
                 <label>Password</label><br>
                <input type="password" name="password" class="form-control">
                <div class="error" id="passErr"></div>    
                <div class="a-box-inner a-alert-container">
                <i class="bi bi-info-circle-fill text-primary"></i>
                    Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.
                </div><br><br>
                <!-- <div class="text-center"> -->
                <div class="form-group">        
                <input type="submit" id="submit" name="submit" value="Submit" class="form-control bg-primary"><br>
            </div>
                <!-- </div> -->
                Already have an account?<a href="login.php"> SignIn <a>
            </div>
        </div>
    </div>
  </form>
  <?php include('footer.html'); ?>
