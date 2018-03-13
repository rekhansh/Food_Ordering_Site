<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu</title>
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
	<style>
	.panel {
    border: 1px solid #f4511e; 
    border-radius:0;
    transition: box-shadow 0.5s;
}

.panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
}

.panel-footer .btn:hover {
    border: 1px solid #f4511e;
    background-color: #fff !important;
    color: #f4511e;
}

.panel-heading {
    color: #fff !important;
    background-color: #f4511e !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
}

.panel-footer {
    background-color: #fff !important;
}

.panel-footer h3 {
    font-size: 32px;
}

.panel-footer h4 {
    color: #aaa;
    font-size: 14px;
}

.panel-footer .btn {
    
    background-color: #f4511e;
    color: #fff;
}
	
	
	</style>
<body>
	
	<?php include 'header.php' ?>
	<br>
	<br>
<div class="container">
  <?php
                    // Include config file
                    require_once 'config.php';
                    // Attempt select query execution
                    $sql = "SELECT * FROM item_list";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){                    
                                while($row = mysqli_fetch_array($result)){
									
									echo "<div class=\"col-sm-6\">";
                                		echo "<div class=\"panel panel-default text-center\">";
										echo "<div class=\"panel-heading\">". $row['name'] ."</div>";
                                        echo "<div class=\"panel-body\"><img src=\"image/2.jpg\" style=\"width: 100%\"><h4>".$row['detail']."</h4></div>";
										echo "<div class=\"panel-footer\"><h3>Price: ".$row['price']."</h3>
										<p><a href=\"addtocart.php?id=".$row['food_id']."\" class=\"btn\" role=\"button\">Add to Cart</a></div>";
										echo "</div>";
									echo "</div>";
                                        
                                }
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
  
</div>
	<?php include 'footer.php' ?>
	
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>