<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<style>
    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
	  min-height: 200px;	
  }
  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
	  }

  </style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	
	<?php include 'header.php' ?>
	<div id="carousel1" class="carousel slide" data-ride="carousel" >
  <ol class="carousel-indicators">
	    <li data-target="#carousel1" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel1" data-slide-to="1"></li>
    <li data-target="#carousel1" data-slide-to="2"></li>
		  
  </ol>
	  <div class="carousel-inner" role="listbox">
	    <div class="item active"><img src="image/1.jpg" alt="First slide image" class="center-block">
	      <div class="carousel-caption">
	        <h3>First slide Heading</h3>
	        <p>First slide Caption</p>
          </div>
        </div>
	    <div class="item"><img src="image/2.jpg" alt="Second slide image" class="center-block">
	      <div class="carousel-caption">
	        <h3>Second slide Heading</h3>
	        <p>Second slide Caption</p>
          </div>
        </div>
	    <div class="item"><img src="image/3.jpg" alt="Third slide image" class="center-block">
	      <div class="carousel-caption">
	        <h3>Third slide Heading</h3>
	        <p>Third slide Caption</p>
          </div>
        </div>
  </div>
<a class="left carousel-control" href="#carousel1" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a>	
<a class="right carousel-control" href="#carousel1" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>
<a class="btn-lg btn-warning btn-block" href="menu.php" style="border-radius: 0; text-align: center">Order Now</a>
<?php include 'footer.php' ?>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
