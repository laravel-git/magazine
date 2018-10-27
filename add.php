<?php
session_start();
?>
<?php
      if($_SERVER['REQUEST_METHOD'] == 'POST' ){
		  if(isset($_SESSION['username'])){
		  if(isset($_POST['name'])and isset($_POST['submit'])){
			  require_once("database.php");
			  
			  $id = $_SESSION['id'];
			  $name = $_POST['name'];
			  $price = $_POST['price'];
			  $quan = $_POST['quan'];
			  $query = "insert into allpro values(NULL,'$name','$price','$quan',$id);";
			  mysqli_query($connect,$query);
			 header("location:home.php");
		  }
		  }
		  else{
			  header("location:index.php");
		  }
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
<form align = "center" action = "add.php" method = "post">
    <label>Name:</label>
	<input class = "input" type = "text" name = "name" ><br><br>
	<label>Price:</label>
	<input class = "input" type = "text" name = "price" ><br><br>
	<label>Quantity:</label>
	<input class = "input" type = "number" name = "quan" ><br><br>
	<input class = "submit" type = "submit" name = "submit" value = "Add">
</form>
