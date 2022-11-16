<?php
session_start();
include('config.php');
include('header.php');
if (isset($_POST['submit']) &&! empty($_POST['submit']))
{
    $id=$_SESSION['id'];
    $password=$_POST['password'];
    $cpswd=$_POST['cpswd'];
    $newpswd=$_POST['newpswd'];
    if ($password==$newpswd)
    {?> <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Password already used',
            
          })
          </script>
          <?php  
    }
    else
    if($cpswd==$newpswd)
    {
        $sql=mysqli_query($con,"UPDATE `register` SET `password`='$newpswd' WHERE id='$id'");?>
         <script>
                swal.fire("Password Changed Successfully", "", "success")
        </script>
        <?php
    }

}
?>
<form name="contactForm" onsubmit="return validateForm()" method="post">
    <div class="d-flex justify-content-center m-5"> 
        <div class="card d-flex justify-content-center m-5" style="width: 20rem;">
            <div class="card-body">
                <h3 class="card-title mb-4">Change Password</h3>
                <h6 class="card-subtitle mb-2 text-muted">
                <div class="error" id="passErr"></div> 
                <label>Old Password</label>
                <input type="password" name="password" class="form-control mb-4"/>
                 <label>New Password</label>
                <input type="password" name="newpswd" class="form-control mb-4"/>
                <div class="error" id="newpswdErr"></div>  
                <label>Confirm Password</label>
                <input type="text" name="cpswd" class="form-control mb-4"/>
                <div class="error" id="cpswdErr"></div> 
                <div class="form-group">        
                <input type="submit" id="submit" name="submit" value="Submit" class="form-control bg-primary"/>
            </div>
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
    var cpswd = document.contactForm.cpswd.value;    
    // var newpswd = document.contactForm.newpswd.value;    
    // var cpswd = document.contactForm.cpswd.value;   
    var cpswdErr = true; 
    if(cpswd == "")
     {
        printError("passErr", "Please enter Password");
     } 
    else 
    {
        // Regular expression for basic email validation
        var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
        if(regex.test(cpswd) === false) 
        {
            printError("cpswdErr", "Please enter a valid Password");
        } else
        {
            printError("cpswdErr", "");
            cpswdErr = false;
        }
    }
    if((cpswdErr) == true)
     {
       return false;
     } 

    else 
    {
        var dataPreview = {"password":password}
        $.ajax({  
            url: 'changepswd.php',  
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
