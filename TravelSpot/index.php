<?php
include "connect.php";
session_start();
if(isset($_SESSION['email'])){
  
  $e = $_SESSION['email'];
$sql = "SELECT * FROM registration where email = '$e'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            
        }
        .bg-img{
            
            background: url("image/travel.jpg") no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            overflow: hidden;
        }
        .hero-text {
            
            display: inline-block;
            font-family: satisfy, Segoe UI;
            position: relative;
            color: rgb(255, 255, 255);
            top: 40%;
            left: 10%;
            padding: 10px;
        }
        
    </style>
</head>
<body>
  <div class="container-fluid">
    <div class="container-fluid bg-img">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="image/icon.png" width="60" alt=""> Travel Spot</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="location.php">Locations</a>
                    </li>
                    <?php if(isset($_SESSION['email'])){ ?>
                    <?php if($data['Type'] == 'Host'){ ?>
                    <li class="nav-item">
                      
                      <a class="nav-link" href="pub_location.php">
                        Publish
                      </a>
                      
                    </li>
                    <?php }?>
                    <?php }?>
                  </ul>
            <form class="d-flex">
                    <?php 
                    if(isset($_SESSION['email'])){
                      $e = $_SESSION['email'];
                        
                      if($_SESSION['email']){
                        $email = $_SESSION['email'];
                        echo "<span style='padding:20px;'> <a class='btn btn-primary' style='color:white; text-decoration:none;' href='logout.php'>Logout</a> </span>";
                      }
                    }else{
                      echo "<a href='login.php'><img src='image/user.png' width='60px'></a>";
                    } 
                    
                    ?>
                    
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
          </div>
        </div>
      </nav>
      <br> <br>
      <div class="card" style="width: 60%; margin-top:10%; opacity:.9;">
        <div class="card-body">
          <h1 class="card-title">TRAVEL SPOT</h1>
          <h6 class="card-subtitle mb-2 text-muted">THE ULTIMATE GUIDE FOR TOURIST</h6>
          <p class="card-text">Not sure where to go next? Explore our catalog of locations from different parts of the word. <br>Some real gems are hidden in our library</p>
          <a href="location.php" class="btn btn-primary">Find Location</a>
        </div>
      </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>
</html>