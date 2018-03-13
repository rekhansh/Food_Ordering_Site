<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
	
	<?php include 'header.php' ?>
<div class="container">
	
	<?php
                    // Include config file
                    require_once 'config.php';
                   
                    // Attempt select query execution
                    $sql = "SELECT * FROM order";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                           
                                while($row = mysqli_fetch_array($result)){
                                		echo "<div class=\"panel panel-default text-center\">";
										echo "<div class=\"panel-heading\">". $row['name'] ."</div>";
                                        echo "<div class=\"panel-body\">" . $row['detail'] . "</div>";
										echo "<div class=\"panel-footer\">" . $row['price'] . "</div>";
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
</body>
</html>