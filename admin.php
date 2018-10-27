<?php
session_start();
?>
<?php
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
	   
	   if(!empty($_POST['username']) && !empty($_POST['user_pass']) && isset($_POST['admin']) ){
		   require_once("database.php");
		   $username = mysqli_real_escape_string($connect,$_POST['username']);
		   $password = mysqli_real_escape_string($connect,$_POST['user_pass']);
		   $query = "select * from admin where username = '$username' AND password = '$password' ;";
		   $result = mysqli_query($connect,$query);
		   $numb = mysqli_num_rows($result);
		   if($numb == 0){
			  echo "Username or password incorrect!";
		   }
		   else{
			     $_SESSION['username'] = $username;
				header("location:index.php");
		   }
	   }
   }
?>
<!DOCTYPE HTML>
<html>
     <head>
	    <title>Admin Panel- Login</title>
		<style> 
		  table{
			  padding:10px;
		  }
		  input{
			  padding:5px;
		  }
		  
		</style>
	 </head>
	  <body>
	     <form action = "admin.php" method = "post" enctype = "multipart/form-data">
		   <table align = "center" bgcolor = "gray" width = "300" height = "300"> 
		         <tr>
				     <td colspan = "8" align = "center">
					    <h1> Admin Login.</h1>
					 </td>
				 </tr>
					 <td align = "right">
						  <strong>Username:</strong>
					 </td>
					 <td>
						  <input type = "text" name = "username" placeholder = "Enter your Username"required = "required"/>
					 </td>
				</tr>
				<tr>
					 <td align = "right">
						  <strong>Password:</strong>
					 </td>
					 <td>
						  <input type = "password" name = "user_pass" placeholder = "Enter your Password"required = "required"/>
					 </td>
				</tr>
				<tr>
				<tr align = "center">
				   <td colspan = "6">
				    <input  type = "submit" name = "admin" value = "Admin Login">
				   </td>
				</tr>	 
		   </table>
		 </form>
	  </body>
</html>