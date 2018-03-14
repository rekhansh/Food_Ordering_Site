<?php session_start();?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar navbar-inverse" style="margin-bottom: 0;border-radius: 0;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a id="menu" href="menu.php">Menu</a></li>
        <li><a id="about" href="about.php">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
		<ul class="nav navbar-nav navbar-right">
		<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart badge"><?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){echo(count(explode(",",$_SESSION['cart'])));} else echo "0";?></span></a></li>
	<?php if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  echo "<li><a href=\"register.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>
      	<li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>
    	</ul>";
}
		else
		{
			
			echo "<li class=\"dropdown\">
        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\" href=\"#\"><b>".htmlspecialchars($_SESSION['username'])."</b>
        <span class=\"caret\"></span></a>
        <ul class=\"dropdown-menu\">
          <li><a href=\"orders.php\">Order History</a></li>
			<li><a href=\"logout.php\">Log out</a></li>
        </ul>
      </li>
</ul>>";
		}
		?>
    </div>
  </div>
</nav>	