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
		  table,tr,td{
			  border-collapse:collapse;
		  }
		  
		</style>
      <body> 
	 <form method = "post" action = "days.php">
		    <input type = "date" name = "date" />
			<input type = "submit" name = "submit" value = "Search">
		</form>
		  
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
						$query = "select *from all_buy";
						$result = mysqli_query($connect,$query);
						$i = 1;
						while($row = mysqli_fetch_array($result)){
						
					
				        $select = "select SUM(price) as hammasi from all_buy;";
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
			 <a href = "today.php">Today</a>
			
			 
	  </body>
</html>