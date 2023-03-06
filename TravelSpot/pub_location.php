<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $detail = $_POST['detail'];
  $target = "images/".basename($_FILES['file']['name']);
  $file = $_FILES['file']['name'];
  if ($file == "*.jpg" or "*.png" or "gif"){
  if($title and $detail and $target and $file){
  $sql = "insert into `locations`(Title, Details, Image)
  values('$title', '$detail', '$file')";
  $result=mysqli_query($con, $sql);
  if($result){
    
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Data inserted successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }else{
    die(mysqli_error($con));
  }
  if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
    $msg = "Image uploaded successfully";
  }else{
    $msg = "There was a problem uploading image";
  }

}  
}else{
  echo "Upload jpg, png or gif";
}
}
?>
<?php

session_start();
if(isset($_SESSION['email'])){
  
  $e = $_SESSION['email'];
$sql = "SELECT * FROM registration where email = '$e'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
}
if($data['Type'] != 'Host'){
  header("location:index.php");
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
                      <a class="nav-link" href="location.php">Locations</a>
                    </li>
                    <?php if($data['Type'] == 'Host'){ ?>
                    <li class="nav-item">
                      
                      <a class="nav-link active" href="pub_location.php">
                        Publish
                      </a>
                      
                    </li>
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
        <br><br>
    <div class="container">
        <div class="dk">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">               
            <input type="text" class="form-control" name="title" id="title" placeholder="Title">
            </div>
            <br>
            <div class="form-group">
              
              <textarea type="text" class="form-control" name="detail" id="detail" placeholder="Details"></textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleFormControlFile1">Images</label>
                <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
            </div>
            <br>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-primary" value="Upload">
            </div>


          </form>
          
    </div>
</div>