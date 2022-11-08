<?php
session_start();
include('object.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <style>
      img
      {
         margin: 5px;
         width: 60px;
         height: 60px;
      }
      #input
      {
        width:50px;
      }

      </style>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tone/13.4.9/Tone.min.js"></script>
<body align="center" >
    <p>Shopping Cart</p>
    <table align="center" style="width:50%;">
    <tr>
     <th>Item</th>
        <th>Price</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Total</th>
     </tr>
     <?php
    if ($_GET['productId']!='')
    {
    // if(isset($_POST['submit']) && !empty($_POST['submit']))
    // {
      $productId=$_GET['productId'];
      $sqli=mysqli_query($con,"SELECT * FROM `addproduct` WHERE productId='$productId'");
     while ($sqlij=mysqli_fetch_assoc($sqli))
     {?>
        <tr align="center">
        <td><?php echo "<img src='images/".$sqlij['image']."'>";?></td>
        <td><span id="price" name="price"><?php echo $sqlij['price_product']?></span></td>
        <td><?php echo $sqlij['name_product']?></td>
        <td><input type="number" value="1" min="1" id="input" onchange="total()" /></td>
        <td><input type="number" name="result" id="result" value="<?php echo $sqlij['price_product']?>" disabled></td>
        <td><input type="hidden" id="ProId" name="ProId" value="<?php echo $sqlij['productId']?>"></td>
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><input type="number" name="result1" id="result1" value="<?php echo $sqlij['price_product']?>" disabled></td>
        </tr>
        <tr><td><input type="button" id="removed" class="remove-item" value="Remove" /></td></tr>

     </tr>
     <?php
     }
     ?>
           <?php
    }
    // }
    else
    {
        echo "Error";
    }
     ?>
     

  </table>
</body>
<script>

    function total() {
      var quantity = parseInt(document.getElementById('input').value);

      var price= parseInt(document.getElementById('price').innerText);

      var total = price * quantity;
      if(quantity>=1)
      {
      document.getElementById('result').value = total;
      document.getElementById('result1').value = total;
    }
}

// $('#removed').on('click','.remove-item',function(){
//     $('#ProId').remove();// remove the closest li item row
// });





   </script>
</html>