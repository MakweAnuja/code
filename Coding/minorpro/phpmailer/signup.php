<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="sweetalert2.min.js"></script> -->
<!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
<?php
include('object.php');
// echo "<pre>";
// print_r($_POST);
// die;
// echo "<pre>";
// print_r($_FILES);

if(isset($_POST["submit"]) && !empty($_POST["submit"]))
{
$name=$_POST['name'];
$namepattern="/^[A-Za-z]+$/";
if (!preg_match ($namepattern, $name) ){  
    $ErrMsg = "Only alphabets and whitespace are allowed.";  
    echo "<script type ='text/JavaScript'>
    alert('Only alphabets and whitespace are allowed!');
    </script>"; 
    } 
else { 
    // echo $name;
        }
$email=$_POST['email'];
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
if (!preg_match ($pattern, $email) ){  
    $ErrMsg = "Email is not valid.";  
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

if (empty ($_POST["gender"])) {  
    // $ErrMsg = "Enter Valid Number";  
    echo "<script type ='text/JavaScript'>
    alert('Plz Select Gender!');
    </script>";
} else {  
    $gender=$_POST['gender'];
}  
$phone=$_POST['phone'];
if (empty ($_POST["phone"])) {  
    echo "<script type ='text/JavaScript'>
    alert('Enter Valid Number !');
    </script>";
}
else
{
    $length = strlen($phone); 
    if ($length <= 10) 
    {  
        // echo "Your Mobile number is: " .$phone; 
    } 
    else
    {  
        $ErrMsg = "Enter Valid Number";  
        echo "<script type ='text/JavaScript'>
        alert('Enter Valid Number');
        </script>"; 
    } 
} 
    if (empty ($_POST["address"])) {  
        echo "<script type ='text/JavaScript'>
        alert('Plz Fill Address !');
        </script>";
    }
    else 
    {
         $address=$_POST['address'];

    }
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];   
if (empty ($_POST["course"])) {  
    echo "<script type ='text/JavaScript'>
    alert('Plz Select the course!');
    </script>";}
else{
$checkbox1=$_POST['course'];  
$chk="";  
foreach($checkbox1 as $chk1)  
{  
    $chk .= $chk1.",";  
}
}
if(isset($_FILES["avatar"]) &&!empty($_FILES["avatar"]["name"]))
{
   $filename=$_FILES["avatar"]["name"];
   $type=$_FILES["avatar"]["type"];
   $tmpname=$_FILES["avatar"]["tmp_name"];
   $ext=substr($filename,strpos($filename,"."));
//    $str="ABCDEFGHijklmnopqrstuvwxyz0123456789";
//    $finame=substr(str_shuffle($str),5,10)."_".time().$ext;
   move_uploaded_file($tmpname,"../images/$filename");
    $sql=mysqli_query($con,"INSERT INTO `info_tab`(`name`, `email`, `password`, `gender`, `phone`, `address`, `country`, `state`, `city`, `course`, `image`)
        VALUES ('$name','$email','$password','$gender','$phone','$address','$country','$state','$city','$chk','$filename')");
if($sql)
{
    $ErrMsg="insert successfully";
    echo "<script type ='text/JavaScript'>
        alert('insert successfully');
    </script>";  
    header("location: login.php");

}
else
{
    echo("not inserted");
}
}
}


       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
    
</head>
<style>
    input
    {
        padding: 5px;
        border-radius: 5px;
        
    }
    select
    {
        padding: 5px;
        width:25%;
        border-radius: 5px;
    }
    h1{
        background-color: rgb(73, 197, 156);
        /* font-family:'Courier New', Courier, monospace; */
        /* font-size:larger;
        font-style:normal; */
        padding: 2%;
    }
    /* div
    {
        padding: 0%;
        margin:0%;
        background-color: rgb(240, 243, 229);
    } */
    table
    {
        width:100%;
        margin-top: 0px;
        
    }
    .center-form
    {
        text-align:center;
    }
    img
    {
        width:100%;
    }
    #t1
    {
        background-color: rgb(240, 243, 229);
    }
     #a1{
              position: absolute; 
                top: 0%; 
                right: 15%;
                transform: translate(200%, 100%); 
                text-align:justify;
    }
    #a2{
              position: absolute; 
                top: 0%; 
                right: 10%;
                transform: translate(200%, 100%); 
                text-align:justify;
    }

</style>
<body >
<table>
            <tr>
            <td>
                <img src="../img1.jpg" alt="">
            </td>
                <td id="t1">
        <form method="post" enctype="multipart/form-data" class="center-form">
       
        <h1>Sign Up</h1>
        <div id="con">
         <a id="a1" href="home.php">Home</a>&nbsp&nbsp&nbsp
         <a id="a2" href="Login.php">Login</a>&nbsp&nbsp&nbsp
        </div>
        <input   type="text" id="name" name="name"  placeholder="Enter Name"><span id="result"></span><br><br>
        <input  type="text" id="email" name="email" placeholder="Enter Email"><br><br>
        <input  type="password" id="password" name="password" placeholder="Enter Password"><br><br>
        <input type="radio" id="male" name="gender" value="Male"> Male
        <input type="radio" id="female" name="gender" value="FeMale">Female<br><br>
        <input  type="text" id="phone" name="phone" placeholder="Enter Phone Number"><br><br>
        <input  type="textarea" id="address" name="address" placeholder="Enter Flat No."><br><br>
        <select name="country" id="country" onChange="getstate(this.value);"><br><br>
        <option value="">Select Country</option>
        <?php $query =mysqli_query($con,"SELECT * FROM country");
        while($row=mysqli_fetch_array($query))
        { ?>
            <option value="<?php echo $row['country_id'];?>"><?php echo $row['countryName'];?></option>
        <?php
        }
        ?>
        </select><br><br>
        <select name="state" id="state" onChange="getcity(this.value);">
        <option value="">Select State</option>
        
        </select><br><br>
        <select name="city" id="city">
            <option value="">Select City</option>
        </select><br><br>
        Select Courses:<br>
        <ul>
            <input  type="checkbox" id="course1" name="course[]" value=" Java">Java
            <input  type="checkbox" id="course2" name="course[]" value=" Python">Python
            <input  type="checkbox" id="course3" name="course[]" value=" JavaScript">JavaScript
            <input  type="checkbox" id="course4" name="course[]" value=" C++">C++
        </ul>
        Upload Image: <input type="file" id="avatar" name="avatar"><br><br>
        <input style="align:center;" type="submit" id="submit" name="submit" value="submit"><br><br>

        <!-- <button style="width:10%;" id="btn" name="btn">Submit</button> -->
        <!-- <input  style="width:10%;" type="submit" id="clr" name="clr" value="Clear"><br><br> -->
    </form>
    </td>
    </tr>
    </table>

</body>
<script>
    // function name_valid()
    //     {
    //         let vnm = $('#name').val();
    //         if (vnm == "/^[a-zA-Z]+ [a-zA-Z]+$/")
    //         {
    //         $("#result").html("Fill the name!");
    //         }

    //     }
    
  function data(){
    var radio1=document.getElementById("male");
    var radio2=document.getElementById("female");
    if (radio1.checked)
    {
        console.log(radio1.value);
    }
    else if(radio2.checked)
    {
        console.log(radio2.value);

    }
  }
  function getstate(val) {
	// alert(val);
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'coutrycode='+val,
	success: function(data){
        console.log(data);
		$("#state").html(data);
    
	}
	});  
}
function getcity(val) {
	// alert(val);
	$.ajax({
	type: "POST",
	url: "get_city.php",
	data:'statecode='+val,
	success: function(data){
        console.log(data);
		$("#city").html(data);
	}
	});
}



    </script>





 <!-- <script>
//     $("#submit").click (function(){
//         $.ajax({
//             type: "POST",
//             url: "object.php",
//             data: {name:document.getElementById('name').value,
//                     email:document.getElementById('email').value,
//                     password:document.getElementById('password').value,
//                     gender:document.getElementById('rdbtn').value,
//                     phone:document.getElementById('phone').value,
//                     address:document.getElementById('address').value
//                     },
//             success: function(test){
//                alert( $('#name').html(test));
//             },
//             error : function(request,error){
//                 console.log ('ERROR' + error);
//             }

//         });

//     })
// </script> -->
</html>