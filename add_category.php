<?php
session_start();
?>
<?php

      if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_SESSION['username']) ){
		  
		  if(isset($_POST['name'])and isset($_POST['submit'])){
			  require_once("database.php");
			  $name = $_POST['name'];
			  $query = "insert into categories values(NULL,'$name');";
			  mysqli_query($connect,$query);
			 header("location:home.php");
		  }
	  }
	  else{
		  header("location:index.php");
	  }
	  
?>
<style>
    .input{
		width:400px;
		height:30px;
		font-size:25px;
	}
	.submit{
		height:35px;
		font-size:25px;
		background-color:orange;
		border-radius:5%;
	}
</style>
<br>
<h2 align = "center">Add Category</h2>
<form align = "center" action = "add_category.php" method = "post">
    <label>Name:</label>
	<input class = "input" type = "text" name = "name" placeholder = "Enter Category Name"><br><br>
	<input class = "submit" type = "submit" name = "submit" value = "Add Category">
</form>
