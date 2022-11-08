<?php
include('object.php');
session_start();
$status="";
echo $_SESSION['proId'];
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["productId"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
if (isset($_POST['action']) && $_POST['action']=="change"){
   foreach($_SESSION["shopping_cart"] as &$value){
     if($value['productId'] === $_POST["productId"]){
         // $value['quantity'] = $_POST["quantity"];
         break; // Stop the loop after we've found the product
     }
 }
      
 }
 echo $_SESSION;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
   <!-- <script src="jquery-3.6.0.min.js"></script> -->
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
 
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <style>
      img
      {
         margin: 1px;
         width: 50px;
         height: 150px;
      }
      </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar w/ text</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li>
        <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success bg-dark" type="submit">Search</button>
      </form>
        </li>
      </ul>
      <span class="navbar-text">
      <a class="bi-cart" class="nav-link" href="cart.php">Cart</a>
      </span>
    </div>
  </div>
</nav>
<p  align="center">Product Catalog</p>

<div class="row" >
    <?php
         $sqli=mysqli_query($con,"SELECT * FROM `addproduct`");
         while ($sqlij=mysqli_fetch_assoc($sqli))
         {?>
         
         <div class="col-md-3">
         <div class="card text-center mx-auto" >
         <img src='<?="images/".$sqlij['image']?>' class="card-img-top" alt="...">
            <div class="card-body">
            <input type="hidden" id="proId" name="proId" value="<?php echo $sqlij['productId']?>">
            <span id="productPrice" name="productPrice">$<?php echo $sqlij['price_product']?></span><br>
            <h5 class="card-title"><span id="productName" name="productName"><?php echo $sqlij['name_product']?></span><br></h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a href="cart.php">Add to Cart</a>
            <!-- <a href="cart.php?productId=<?php echo $sqlij['productId'];?>">Add to Cart</a> -->
         </div>
         </div>
         
</div>
      <?php
         }
         ?>
      </div>

</body>

</html>
        