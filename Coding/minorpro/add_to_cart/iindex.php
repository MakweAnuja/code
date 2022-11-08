<?php
session_start();
include('config.php');
$status="";
if (isset($_POST['id']) && $_POST['id']!="")
{
    $code = $_POST['code'];
    $id=$_SESSION['id'];
    $result = mysqli_query($con,"SELECT * FROM `products` WHERE `product_id`='$product_id'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $code = $row['code'];
    $price = $row['price'];
    $image = "images/".$row['image'];

    $cartArray = array(
    $code=>array(
    'name'=>$name,
    'code'=>$code,
    'price'=>$price,
    'quantity'=>1,
    'image'=>"images/".$image)
    );

if(empty($_SESSION["shopping_cart"]))
 {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
 }

else
  {
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) 
    {
      $status = "<div class='box' style='color:red;'>
      Product is already added to your cart!</div>";	
    }
    else 
    {
      $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
      $status = "<div class='box'>Product is added to your cart!</div>";
	  }
  }

}
?>
<?php
if(!empty($_SESSION["shopping_cart"]))
{
  $cart_count = count(array_keys($_SESSION["shopping_cart"]));
  ?>
  <div class="cart_div">
  <span class="navbar-text"><a class="bi-cart" class="nav-link" href="Caart.php">Cart</a><span>
  <?php echo $cart_count;?></span></a>
  </div>
  <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
 
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <style>
      .myimage{
                width: 60%;
                height: 100%;
              }
              @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap');

:root {
  --gray: #555;
  --purple: #4e65ff;
  --green-blue: #92effd;
  --white: #fff;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.head {
    padding: 20px 0px;
}

.navigation {
  position: fixed;
  top: 10px;
  right: 20px;
  width: 120px;
  height: 60px;
  display: flex;
  justify-content: space-between;
  border-radius: 5px;
  background: var(--white);
  box-shadow: 0 25px 35px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: height 0.5s, width 0.5s;
  transition-delay: 0s, 0.75s;
}

.navigation .user-box {
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  align-items: center;
  overflow: hidden;
  transition: 0.5s;
  transition-delay: 0.5s;
}

.navigation .user-box .username {
  font-size: 1.2rem;
  white-space: nowrap;
  color: var(--gray);
}

.navigation .user-box .image-box {
  position: relative;
  min-width: 60px;
  height: 43px;
  background: var(--white);
  border-radius: 50%;
  overflow: hidden;
  border: 10px solid var(--white);

}

.navigation .user-box .image-box img  {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.navigation .menu-toggle {
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

.navigation .menu-toggle::before {
  content: "";
  position: absolute;
  width: 32px;
  height: 2px;
  background: var(--gray);
  transform: translateY(-10px);
  box-shadow: 0 10px var(--gray);
  transition: 0.5s;
}

.navigation .menu-toggle::after {
  content: "";
  position: absolute;
  width: 32px;
  height: 2px;
  background: var(--gray);
  transform: translateY(10px);
  transition: 0.5s;
}

.menu {
  position: absolute;
    width: 100%;
    top: 0px;
    background: white;
    height: calc(100% - 60px);
    margin-top: 60px;
    padding: 20px;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}

.menu li {
  list-style: none;
}

.menu li a {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 20px 0;
  font-size: 1rem;
  text-decoration: none;
  color: var(--gray);
}

.menu li a ion-icon {
  font-size: 1.5rem;
}

.menu li a:hover {
  color: var(--purple);
}



.navigation.active .menu-toggle::before {
  transform: translateY(0px) rotate(45deg);
  box-shadow: none;
}

.navigation.active .menu-toggle::after {
  transform: translateY(0px) rotate(-45deg);
}

.navigation.active {
  width: 300px;
    height: 350px;
    transition: width 0.5s, height 0.5s;
    transition-delay: 0s, 0.75s;
    position: absolute;
    top: 0px;
    display: inline-block;
    visibility: visible;
    z-index: 99;
    display: flex;
}

.navigation.active .user-box {
  width: calc(100% - 60px);
  transition-delay: 0s;
}
      </style>
</head>
<body>
<span class="navbar-text">
       <?php
        if(!empty($_SESSION["shopping_cart"])) 
        {
         $cart_count = count(array_keys($_SESSION["shopping_cart"]));
         ?> 
      <span class="navbar-text">
      <a class="bi-cart" class="nav-link" href="Caart.php">Cart</a>
        <?php echo $cart_count;?></span></a>
        </div>
        <?php
        }
        ?>
      </span>
<nav class="navbar navbar-expand-lg bg-primary head">
  <div class="container-fluid  text-center">
    <a class="navbar-brand" href="iindex.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li> -->
        <li>
        <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success bg-light" type="submit">Search</button>
        </li>
      </ul>
      <?php
      if (isset($_SESSION['id']))
      {?>
      <ul>
        <div class="navigation">
    <div class="user-box">
      <div class="image-box">
      <i class="bi bi-people-fill"></i>
      </div>
      <p class="username">Welcome</p>
    </div>
    <div class="menu-toggle"></div>
    <ul class="menu">
      <li><a href="#"><ion-icon name="person-outline"></ion-icon>Profile</a></li>
      <!-- <li><a href="#"><ion-icon name="chatbox-outline"></ion-icon>Messages</a></li>
      <li><a href="#"><ion-icon name="notifications-outline"></ion-icon>Notification</a></li> -->
      <li><a href="#"><ion-icon name="cog-outline"></ion-icon></ion-icon>Change Password</a></li>
  <li><a href="logout.php"><ion-icon name="log-out-outline"></ion-icon>Logout</a></li>
  </ul>
      <!-- </ul> -->
      <!-- <ul>
        <button class="btn btn-outline-success bg-light" type="submit" id="logout" name="logout"><a class="nav-link bg-light" href="logout.php">Logout</a></button>
      </ul> -->
      
      </div>
      <?php
      }
      else
      {
        ?>
        <button class="btn btn-outline-success bg-light" type="submit" id="login" name="login"><a class="nav-link bg-light" href="login.php">Login</a></button>
      <?php
      }
      ?>
      
    </form>
    </div>
  </div>
</nav>
<div class="row" >
    <?php
         $sqli=mysqli_query($con,"SELECT * FROM `addproduct`");
        //  print_r(mysqli_fetch_assoc($sqli));
         while ($row=mysqli_fetch_assoc($sqli))
         {?>
         <div class="col-md-3 wrapper">
            <div class="card text-center myimage" style="width: 20rem;" >
                <img class="card-img-top img-responsive thumbnail " src='<?="images/".$row['product_image']?>'alt="...">
                <h5><?=$row['product_price']?></h5>
                <h4><?=$row['product_name']?></h4>
                <a href="Caart.php?id=<?=$row['product_id']?>">Add to Cart</a>
         </div>
        </div>
      <?php } ?>
      </div>
    <?php
       mysqli_close($con);
    ?>
        <div style="clear:both;"></div>

        <div class="message_box" style="margin:10px 0px;">
    <?php echo $status; ?>
        </div>


    </body>
<script>
  let menuToggle = document.querySelector('.menu-toggle');
  let navigation = document.querySelector('.navigation');

menuToggle.onclick = function() {
  navigation.classList.toggle('active');
}
  </script>
    
    </html>
    <?php include('footer.html'); ?>  