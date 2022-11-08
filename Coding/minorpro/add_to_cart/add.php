<?php
include('object.php');
if(isset($_POST["submit"]) && !empty($_POST["submit"]))
{
    $price=$_POST["price"];
    // echo($price);
    $name=$_POST["name"];
    // echo($name);
if(isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["name"]))
{
   $filename=$_FILES["avatar"]["name"];
//    echo("filename".$filename);
   $type=$_FILES["avatar"]["type"];
//    echo("type".$type);
   $tmpname=$_FILES["avatar"]["tmp_name"];
//    echo("ymp nAME".$tmpname);
   $ext=substr($filename,strpos($filename,"."));
//    echo("extension".$ext);
//    $str="ABCDEFGHijklmnopqrstuvwxyz0123456789";
//    $finame=substr(str_shuffle($str),5,10)."_".time().$ext;
   move_uploaded_file($tmpname,"images/$filename");
   $sql=mysqli_query($con,"INSERT INTO `addproduct`(`image`,`price_product`,`name_product`) 
   VALUES('$filename','$price','$name')");
//    echo($sql);
   if($sql)
   {
    echo "<script type ='text/JavaScript'>
        alert('insert successfully');
    </script>";  
   }
   else
   {
    echo("Not Inserted");
   }
}
}
if(isset($_GET['productId'])) 
{
    $id=$_GET["productId"];


  
    $de=mysqli_query($con,"DELETE FROM `addproduct` WHERE productId='$id'");
      
       if($de)
       {
           echo("deleted successfully");
       }
       else
       {
           echo("not deleted");
       }
   
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
        <input type="text" id="price" name="price"><br><br>
        <label for="img">Name of Product:</label>
        <input type="text" id="name" name="name"><br><br>
        <input type="submit" id="submit" name="submit">
        <input type="submit" id="up" name="up" value="Update">
        <table border="solid" align="center" style="width:50%;"><br><br>
        <tr>
         <th>Id</th>
         <th>Image</th>
         <th>Name</th>
         <th>Price</th>
         <th colspan="2">Action </th>
         </tr>
         <?php
         $sqli=mysqli_query($con,"SELECT * FROM `addproduct`");
         while ($sqlij=mysqli_fetch_assoc($sqli))
         {?>
            <tr>
            <td><?php echo $sqlij['productId']?></td>
            <td><?php echo "<img src='images/".$sqlij['image']."'>";?></td>
            <td><?php echo $sqlij['price_product']?></td>
            <td><?php echo $sqlij['name_product']?></td>
            <td><a href="update.php?productId=<?php echo $sqlij['productId'];?>">Edit</a></td>
            <td><a href="add.php?productId=<?php echo $sqlij['productId'];?>">Delete</a></td>
         </tr>
         <?php
         }
         ?>
         
       </table>
    </form>
</body>
</html>
