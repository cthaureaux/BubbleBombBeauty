<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bubble Bomb Beauty</title>
        <style>
            div {
                text-align: center;
            }
            h1, h3 {
                font-family: "Fantasy", Copperplate, Copperplate;
            }
            #footer {
            bottom:10px;
            text-align: center;
        }
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
        </style>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="p-3 mb-2 bg-light text-dark"><h1>Welcome to Bubble Bomb Beauty</h1>
            <h3>Administrator Homepage</h3>
            <nav class="navbar navbar-expand-sm justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="search.html">Search Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="newproduct.html">Insert Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="deleteproduct.html">Delete Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
              </ul>
            </nav>
        </div>

        <div id="demo" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
          </ul>
          
          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/bath1.jpg" alt="Los Angeles" width="1100" height="400">
            </div>
            <div class="carousel-item">
              <img src="images/bath2.jpg" alt="Chicago" width="1100" height="400">
            </div>
            <div class="carousel-item">
              <img src="images/bath3.jpg" alt="New York" width="1100" height="400">
            </div>
          </div>
          
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
        <footer id ="footer"><a href = "mailto: bubblebombbeauty@gmail.com">&copy; 2022 Bubble Bomb Beauty</a></footer>
    </body>
</html>