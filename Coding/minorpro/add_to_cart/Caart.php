<?php
session_start();
include('config.php');
include('header.php');
$status="";
// echo $_GET['product_id'];
// $result = mysqli_query($con,"SELECT * FROM `addproduct` WHERE `product_id`='".$_GET['product_id']."'");
// $row = mysqli_fetch_assoc($result);
// // print_r($row);
// $_SESSION['row']=$row;
// echo "<pre>";
// print_r($_SESSION['row']);

// print_r($_POST);
// if (isset($_POST['action']) && $_POST['action']=="remove")
// {
//   if(!empty($_SESSION["shopping_cart"])) 
//   {
//     foreach($_SESSION["shopping_cart"] as $key => $value) 
//     {
//       if($_POST["code"] == $key)
//       {
//         unset($_SESSION["shopping_cart"][$key]);
//         $status = "<div class='box' style='color:red;'>
//         Product is removed from your cart!</div>";
//       }
      
//         if(empty($_SESSION["shopping_cart"]))
//         {
//           unset($_SESSION["shopping_cart"]);
//         }
//       }		
//   }
// }
  
// if (isset($_POST['action']) && $_POST['action']=="change")
// {
//   foreach($_SESSION["shopping_cart"] as $value){
//     if($value['code'] === $_POST["code"]){
//         $value['quantity'] = $_POST["quantity"];
//         break; // Stop the loop after we've found the product
//     }
// }
  	
// }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
<div class="cart">
<table class="table" border="solid black">
<tbody>
<tr>
<td>ITEM</td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
 
<form method='post' action=''>
<?php
    $_SESSION['product_id']=$_GET['product_id'];
    print_r($_SESSION['product_id']);
if (isset($_SESSION['product_id']) && $_SESSION['product_id']!="")
{
// print_r($_SESSION['product_id']);
// print_r($_GET);
    print_r($_SESSION);
    $total_quantity = 1;
    $total_price = 0;
    // $product_id = $_GET['product_id'];
    $result = mysqli_query($con,"SELECT * FROM `addproduct` WHERE `product_id`='".$_SESSION['product_id']."'");

    // die;  
    // $row = mysqli_fetch_assoc($result);
    // $_SESSION['product_image']=$row['product_image'];
    // $_SESSION['product_name']=$row['product_name'];
    // $_SESSION['product_price']=$row['product_price'];
    // print_r($_SESSION);
    // die;
    while($row = mysqli_fetch_assoc($result)){ 
      $_SESSION['product_image']=$row['product_image'];
      $_SESSION['product_name']=$row['product_name'];
      $_SESSION['product_price']=$row['product_price'];
    // die;

  // $product_price = $item["quantity"]*$item["product_price"];
  ?> 
<tr>
<td>
<img class="card-img-top img-responsive thumbnail " src='<?="images/".$_SESSION["product_image"]?>' width="10" height="60" />
</td>
<td><?php echo $_SESSION['product_name'];?></td>
<td><input type="number" id="input" name="input" value="1" min="1" onchange="total()"/></td>
<td><span id="price" name="price"><?php echo $_SESSION['product_price'];?></span></td>
<td><input type="number" name="result" id="result" value="<?php echo $_SESSION['product_price']?>"disabled/></td>
<!-- <input type='hidden' name='action' value="remove"/> -->
<button type='submit' class='remove'>Remove Item</button>
</tr>
<tr>
<td colspan="5" align="right">
Total Amount <input type="number" name="result1" id="result1" value="<?php echo $_SESSION['product_price'];}}?>"disabled></td>
<!-- <strong>TOTAL: <?php echo "₹ ".$total_price; ?></strong> -->
<!-- </td> -->
</tr>
</tbody>
</table>	
</form>	
  <!-- <?php
// }else{
//   // print_r($_SESSION["shopping_cart"]);
// 	echo "<h3>Your cart is empty!</h3>";
// 	}
?> -->
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<!-- </body>
</html> -->
<script>
    function total()
     {
      var quantity = document.getElementById("input").value;

      var price = document.getElementById("price").innerText;
      // parseInt(price);
      // alert (quantity);

      // alert (price);

      var total = price * quantity;
      parseInt(total);
      // alert (total);

      if(quantity>=1)
      {
        document.getElementById('result').value = total;
        document.getElementById('result1').value = total;
      }
    }
</script>
<?php include('footer.html'); ?>
