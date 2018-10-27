<!DOCTYPE HTML>
<html>
  <head>
     <title>Home</title>
	 <style>
a:link, a:visited {
    background-color:orange;
    color: black;
    padding: 14px 25px;
    text-align: center;	
    text-decoration: none;
    display: inline-block;
}

a:hover, a:active {
    background-color:red;
}
h1{
	color:blue;
}
</style>
  </head>
      <body>
	  <h1 align = "center">Welcome to our Magazine!</h1>
	  <br>
	  
<div align = "center">	  
	      <a href = "index.php">Home</a>
				<?php
				   
				 $connect = mysqli_connect('localhost','root','','shopping');
				   $query = "select *from categories ;";
				   $result = mysqli_query($connect,$query);
				   $i = 1;
				   while($row = mysqli_fetch_array($result)){ ?>
				     
					    <a href = "alldoit.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>
                   <?php
				    }
					
				   ?>		
     <a href = "all_buy.php">Sold products</a>
      <a href = "add_category.php">Add category</a>	<br><br>
	  <a href = "admin.php">Admin Login Here!</a>
	  <a href = "admin_out.php">Admin Log Out!</a>
	  
</div>
	  </body>
</html>