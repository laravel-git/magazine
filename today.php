<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
     <title>ALL PRODUCTS</title>
  </head>
   <style> 
		  table{
			  padding:10px;
			  width:1000px;
			  background:orange;
		  }
		  table,tr,td{
			  border-collapse:collapse;
		  }
		  th{
			  border:2px solid black;
		  }
		  td{
			  border:2px solid black;
		  }
		  input{
			  padding:5px;
		  }
		  h2{
			  float:right;
			  margin-right:170px;
		  }
		  .all{
			  color:blue;
		  }
		  
		</style>
      <body> 
	 
		  
		  <table align = "center">
		  <tr align = "center"> 
		      <th>#</th>
			  <th>Name</th>
			  <th>Price</th>
			  <th>Quantity</th>
			  <th>Time</th>
			 
		  </tr>
				<?php
				    if(isset($_SESSION['username'])){
						require_once("database.php");
						$today = date("Y/m/d");
					
						$query = "select *from all_buy where data = '$today';";
						$result = mysqli_query($connect,$query);
						$i = 1;
						while($row = mysqli_fetch_array($result)){				
				        $select = "select SUM(price) as hammasi from all_buy where data = '$today';";
						$run = mysqli_query($connect,$select);
						$row1 = mysqli_fetch_array($run);
					       	
						$select = "select SUM(price) as hammasi from all_buy where data = '$today' ;";
						$run = mysqli_query($connect,$select);
						$row1 = mysqli_fetch_array($run);
				?>		
				     <tr align = "center"> 
					     <td><?php echo $i; $i ++; ?></td>
						 <td><?php echo $row['name'];?></td>
						 <td><?php echo $row['price'];?></td>
						 <td><?php echo $row['quantity'];?></td>
						 <td><?php echo $row['buy_time'];?></td>
						 	 
					 </tr >
					
				
				<?php
					}
					echo "<tr>
					   <th colspan = '5'>{$row1['hammasi']}</th>
					</tr>";
					}
					else{
						header("location:index.php");
					}
				?>
				
			</table>
			 <a href = "all_buy.php">ALL DAYS</a>
	  </body>
</html>