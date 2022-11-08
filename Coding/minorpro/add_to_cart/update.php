<?php
 include('object.php');
if(isset($_GET['productId'])) 
{
    $productId=$_GET["productId"];                                                                                                                                                              
}
$sel=mysqli_query($con,"SELECT * FROM `addproduct` WHERE productId=$productId");
$fet=mysqli_fetch_assoc($sel);
$price=$fet['price_product'];
$name=$fet['name_product'];
if (isset($_POST['up'])&& !empty($_POST['up']))
{
   $price=$_POST['price'];
   $name=$_POST['name'];
   if(isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["name"]))
{
   $filename=$_FILES["avatar"]["name"];
   $type=$_FILES["avatar"]["type"];
   $tmpname=$_FILES["avatar"]["tmp_name"];
   $ext=substr($filename,strpos($filename,"."));
//    echo("extension".$ext);
//    $str="ABCDEFGHijklmnopqrstuvwxyz0123456789";
//    $finame=substr(str_shuffle($str),5,10)."_".time().$ext;
   move_uploaded_file($tmpname,"images/$filename");
   $sqlu=mysqli_query($con,"UPDATE `addproduct` SET `image`='$filename',`price_product`='$price',`name_product`=' $name' WHERE productId=$productId");
    echo $sqlu;
   if($sqlu)
    {
       
    header("location:add.php");
//     echo "<script type ='text/JavaScript'>
//     alert('Update successfully');
// </script>";  
    }
    else
    {   
        echo "<script type ='text/JavaScript'>
        alert('Not Updated');
    </script>";
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
    <title>Update Product</title>
    <style>
      img
      {
         margin: 5px;
         width: 50px;
         height: 50px;
      }
      </style>
</head>
<body align="center">
    <form method="post" enctype="multipart/form-data">
        <label for="img">Select image:</label>
        <input type="file" id="avatar" name="avatar"><br><br>
        <label for="img">Price of Product:</label>
        <input type="text" id="price" name="price" value="<?php echo $price;?>"> <br><br>
        <label for="img">Name of Product:</label>
        <input type="text" id="name" name="name" value="<?php echo $name;?>"><br><br>
        <input type="submit" id="up" name="up" value="Update">
        <!-- <a href="update.php">Back</a> -->
    </form>
    </body>
    </html>