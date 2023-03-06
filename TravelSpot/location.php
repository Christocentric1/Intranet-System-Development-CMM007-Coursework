<?php
include "connect.php";
session_start();
if(isset($_SESSION['email'])){
  
  $e = $_SESSION['email'];
$sql = "SELECT * FROM registration where email = '$e'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
}else{
  $_SESSION['login'] = "You cannot view locations except you are logged In";
  header("location:login.php");
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
            
            background: url(/image/travel.jpg) no-repeat center center fixed;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="image/icon.png" width="60" alt=""> Travel Spot</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                      <a class="nav-link " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="location.php">Locations</a>
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
                        echo "<span style='padding:20px;'> <a class='btn btn-primary' style='color:white; text-decoration:none;' href='logout.php'>Logout</a> </span><span style='color:white; padding:20px;'> $email </span>";
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
    </div>
    <div class="container" style="margin-top: 5%;">
        <div class="row">
        <?php
          include "connect.php";

          $sql = "SELECT * FROM locations";
          $result = mysqli_query($con, $sql);
          while ($data = mysqli_fetch_assoc($result)){
            $uid = $data['Id'];

  ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/<?php echo $data['Image'];?>" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $data['Title'];?></h5>
                      <p class="card-text"><?php echo mb_strimwidth($data['Details'] , 0, 50, "!!");;?></p>
                      <?php echo "<a href='details.php?location_id=$uid' class='btn btn-primary'> Go somewhere </a>"; ?>
                     
                    </div>
                  </div>
            </div>
            <?php
           
          }
          
          
          
          ?>
            <!-- <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="image/shutterstock-91150394.webp" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Statue of Liberty, New York</h5>
                      <p class="card-text">The Statue of Liberty represents the United States like no other place. This symbol of freedom in New York City was gifted by the French to the American people in 1896.
                        </p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="image/Colosseum-optimized-970x647.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">The Colosseum, Rome</h5>
                      <p class="card-text">This is the most famous and largest structure still standing from the Roman Empire. It is also the biggest attraction of the modern day Rome. It’s been a major attraction for travelers from generation to generation.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col"><div class="card" style="width: 18rem;">
                <img class="card-img-top" src="image/shutterstockRF_1037036482.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Pyramids of Giza, Egypt</h5>
                  <p class="card-text">Among the top tourist destinations in the world is the Pyramid of Giza, this place takes ancient attractions to another level. It was built over 4500 years ago. It has always been a generational tourist site. Located just outside Cairo the capital city.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div></div>
          </div> -->
          <br>
          
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>
</html>