<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Cart</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">  
	</head>
	<body>
	<?php
include 'header.php';
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
$items = $_SESSION['cart'];
$cartitems = explode(",",$items);
$total =0;
$i = 1;
					
                    // Include config file
                    require_once 'config.php';
					$transaction ="";
					$transaction_err ="";
                    // Attempt select query execution
					echo "<div id=\"cart\" class=\"container\">";
 					echo "<br><table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
										echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Detail</th>";
										echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
					foreach($cartitems as $key=>$id){
						$sql = "SELECT * FROM item_list WHERE food_id = $id";
						$result = mysqli_query($link, $sql);
						$r = mysqli_fetch_assoc($result);
                                    echo "<tr>";
										echo "<td>" .$i."</td>";
                                        echo "<td>" . $r['name'] . "</td>";
                                        echo "<td>" . $r['price'] . "</td>";
                                        echo "<td>" . $r['detail'] . "</td>";
										echo "<td><a href=\"remove_cart.php?remove=".$key."\"> Remove</a></td>";
                                    echo "</tr>";
                 
                                   	$total = $total +$r['price'];
									$i++;
					}
					echo "</tbody>"; 
                     echo "</table>";
 										 echo "<a href=\"remove_cart.php?remove=all\" class=\"btn btn-warning right pull-right\">Clear Cart</a><br><br>";
										echo "<div><h3> <strong>Total Price : </strong>". $total."</h3>";
                                        echo "<br></div>";
                        if($_SERVER["REQUEST_METHOD"] == "POST"){ 
							 $input_transaction = trim($_POST["transaction_id"]);
    					if(empty($input_transaction)){
        				$transaction_err = "Please enter the Tramsaction ID.";     
    					} elseif(!ctype_digit($input_transaction)){
        				$transaction_err = 'Please enter a positive integer value.';
    					} else{
        				$transaction = $input_transaction;
    				}
						if(empty($transaction_err)){
						// Prepare an update statement
						$sql = "INSERT INTO orders (username, price, transaction_id) VALUES ('".$_SESSION['username']."', '$total', '$transaction')";
        
							if(mysqli_query($link, $sql)){
    					// Obtain last inserted id
							$order_id = mysqli_insert_id($link);
								foreach($cartitems as $key=>$id)
					{
						$sql = "INSERT INTO orders_all(order_id,food_id) VALUES ($order_id, $id)";
									mysqli_query($link, $sql);
					}	
    						echo "Order Placed successfully. Order ID is: " . $order_id;
							header("location: welcome.php");
					} 					
					else{
    						echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						}}}
                    // Close connection
					?>  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($transaction_err)) ? 'has-error' : ''; ?>">
                            <label>Transaction Id</label>
                            <input type="text" name="transaction_id" class="form-control" value="<?php echo $transaction; ?>">
                            <span class="help-block"><?php echo $transaction_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input id="checkout" type="submit" class="btn btn-primary" value="Checkout">
                        <a href="menu.php" class="btn btn-default">Cancel</a>
                    </form>
		<?php
					echo "</div>";
                    mysqli_close($link);
					
}
else
{
	echo "<div class=\"container\">";
	echo "<h1>Your Cart is empty</h1>";
	echo "<a href=\"menu.php\" class=\"btn btn-info \">Order Now</a></div>";
}
?>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
		<script>
</script>
	</body>
</html>


