<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        <!-- Bootstrap Font Icon CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">  
    </head>
    <style>
        .error {  
                    color: red;  
                    margin-left: 5px;  
                }
                 
                
        </style>
    <body>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
            <a class="navbar-brand" href="iindex.php">Home</a>
          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0  ml-auto">
                <li>
                <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success bg-light  " type="submit">Search</button>
                </li>
                  </ul>
                  
                <?php
                if (isset($_SESSION['id']))
                {?>
                 <button class="btn btn-outline-success bg-light" type="submit" id="logout" name="logout"><a class="nav-link bg-light" href="logout.php">Logout</a></button>
                <?php
                }
                else
                {
                ?>
                <button class="btn btn-outline-success bg-light" type="submit" id="login" name="login"><a class="nav-link bg-light" href="login.php">Login</a></button>
                <button class="btn btn-outline-success bg-light" type="submit" id="register" name="register"><a class="nav-link bg-light" href="register.php">Register</a></button>
                <?php
                }
                ?>        
            </form>
            </div>
            </div>
        </nav>
    </body>
</html>