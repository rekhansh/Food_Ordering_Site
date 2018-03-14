<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once 'config.php';
    
    // Prepare a select statement
    $sql = "SELECT * FROM orders WHERE order_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $order_id = $row["order_id"];
                $price = $row["price"];
                $status = $row["status"];
				$trasaction_id = $row["transaction_id"];
				$username = $row["username"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    //mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
	<link href="..//css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include 'header.php'?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Order Id</label>
                        <p class="form-control-static"><?php echo $order_id; ?></p>
                    </div>
					<div class="form-group">
                        <label>User</label>
                        <p class="form-control-static"><?php echo $username; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $price; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Transaction Id</label>
                        <p class="form-control-static"><?php echo $trasaction_id; ?></p>
                    </div>
					<div class="form-group">
                        <label>Status</label>
                        <p class="form-control-static"><?php echo $status; ?></p>
                    </div>
					<?php 
					$sql = "SELECT * FROM orders_all INNER JOIN item_list ON orders_all.food_id=item_list.food_id where order_id=$order_id";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){   
							echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Order Id</th>";
                                        echo "<th>Food Name</th>";
										 echo "<th>Food Price</th>";
										echo "<th>Food Detail</th>";
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
									
									echo "<td>" . $row['order_id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>"; 
									echo "<td>" . $row['price'] . "</td>"; 
									echo "<td>" . $row['detail'] . "</td>"; 
									echo "</tr>";
                                }
							
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }?>
                    <p><a href="orders.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>