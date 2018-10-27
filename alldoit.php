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
		  
		.submit {
			background-color: #4CAF50;
			border: none;
			color: white;
			margin-left:600px;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			
			cursor: pointer;
			}
		  h2{
			  float:right;
			  margin-right:170px;
		  }
		  
		</style>
      <body> 
	 <a href = "home.php">Home</a><br>
		  
		  <table align = "center">
		  <tr align = "center"> 
		      <th>#</th>
			  <th>Name</th>
			  <th>Price</th>
			  <th>Quantity</th>
			  <th colspan = "2">Action</th>
			 
		  </tr>
				<?php
				   if(isset($_GET['id'])){
					   $id = $_GET['id'];
					   $_SESSION['id'] = $id;
					require_once("database.php");
				   $query = "select *from allpro where allpro.order_id = $id ;";
				   $result = mysqli_query($connect,$query);
				   $i = 1;
				   
				   while($row = mysqli_fetch_array($result)){ 
				   $quan = $row['quantity'];
				   if($quan > 0){
				   ?>
                      
					    
					 <tr align = "center"> 
					     <td><?php echo $i; $i ++; ?></td>
						 <td><?php echo $row['name'];?></td>
						 <td><?php echo $row['price'];?></td>
						 <td><?php echo $row['quantity'];?></td>
						 <td><a href = "buy.php?id=<?php echo $row['id'];?>">Buy</a></td>
						 
						 
					 </tr>
                   <?php
				   }
				   else{
					   $delete = "delete from allpro where quantity = 0 ;";
					   mysqli_query($connect,$delete);
				   }
				   }
				   }else{
					   	header("location:index.php");
				   }
				   ?>		
			</table><br>
			  <form action = "add.php" method = "post">
			      <input type = "hidden" name = "id">
				  <input class = "submit" type="submit" name = "add" value = "Add " >
			  </form>
	  </body>
</html>