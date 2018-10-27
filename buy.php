<?php
     if(isset($_GET['id'])){
		 $id = $_GET['id'];
		 require_once("database.php");
		 $select = "select *from allpro where id = $id ;";
		 $query = "update allpro set quantity = quantity - 1 where id = $id;";
		 mysqli_query($connect,$query);
		 $result = mysqli_query($connect,$select);	 
		 $row = mysqli_fetch_array($result);
		 $name = $row['name'];
		 $price = $row['price'];
		 
		 
		 $insert = "insert into all_buy values(NULL,'$name','$price','1',NOW(),NOW()) ;";
		 mysqli_query($connect,$insert);
		 header("location:index.php");
?>


<?php
}
?>
