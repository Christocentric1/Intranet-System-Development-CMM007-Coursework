<?php
$login = 0;
$invalid = 0;
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include "connect.php"; 
  $email = $_POST["email"];
  $password = md5($_POST["password"]);




  // $sql = "insert into `registration`(email, fullname, username, type , password)
  // values('$email','$fullname', '$username', '$Who_are_you', '$password')";
  // $result = mysqli_query($con, $sql);

  // if($result){
  //   echo " Data Inserted Successfully";
  // }else{
  //   die(mysqli_error($con));
  // }
  

  $sql = "Select * from `registration` where email='$email' and password='$password'";
  $result=mysqli_query($con, $sql);

  if($result){
    $num=mysqli_num_rows($result);
    if ($num > 0){
      $login = 1;
      session_start();
      $_SESSION['email'] = $email;
      header('location:index.php'); 
      
    }else{
$invalid = 1;   
  }


}
}
session_start();
if (isset($_SESSION['login'])){
  $f = $_SESSION['login'];
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Error!</strong> '$f'
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";

}


?>
<?php
if($invalid){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Invalid Credentials 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if($login ){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You have Sucessfully logged In.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
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
        
        a{
            text-decoration: none;
            color: dodgerblue;
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
                      <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="location.php">Locations</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pub_location.php">
                        Publish
                      </a>
                      
                    </li>
                    
                  </ul>
                  <form class="d-flex">
                  <h2 class="text-center">Log In Page</h2>

                    <a href="login.php"><img src="image/user.png" width="50"></a>
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
    </div>
        <br><br><br>
    <div class="container">
        <div class="dk">
        <form method="post">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            
            <br>
           
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control"  name="password" id="password" placeholder="**********************">
            </div>
            <br>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>

            <small>You don't have an account yet! <a href="registration.php">Sign Up</a> Now</small>
          </form>
    </div>
</div>