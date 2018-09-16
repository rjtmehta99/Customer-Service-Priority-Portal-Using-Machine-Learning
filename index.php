<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>
    Dell
  </title>
</head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<style type="text/css">
body
  {
    background-color: lightgrey;
    font-size: 39px;
  }
  .carousel-caption
  {
    position: absolute;
    top: 60px;
    color: black;
  }

</style>

<body>
<div class="container-fluid">

  <h2></h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

    	<div class="item">
        <img src="images/cd.jpg" class="img-responsive" alt="MUJ LOGO" style="width:100%; height: 85vh">
        <div class="carousel-caption">
          <h1></h1>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="images/c1.jpg" class="img-responsive" alt="MUJ LOGO" style="width:100%; height: 85vh">
        <div class="carousel-caption">
          <h1></h1>
          <p></p>
        </div>
      </div>

      <div class="item active">
        <img src="images/cc.jpg" class="img-responsive" alt="MUJ LOGO" style="width:100%; height: 85vh">
        <div class="carousel-caption">
          <h1>Welcome!</h1>
        </div>
      </div>      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="container">
    <a href="login.php" type="button" class="btn btn-primary" style="font-size: 20px; position: absolute; right: 600px; width: 120px">Log In</a>
</div>
</body>
</html>
