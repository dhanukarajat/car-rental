<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body>
<?php
	$database_host = "localhost";
	$database_user = "rajat";
	$database_pass = "pizza";
	$database_name = "carrental";
	$connection = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
	if(mysqli_connect_errno()){
		die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }
	$Rid=$_POST["rid"];
	$res="select Noweeks FROM rental,rates where rental.rid='$Rid' and rental.Ctype=rates.Ctype";
	$result=mysqli_query($connection,$res);
	$row = mysqli_fetch_assoc($result);
		
			if ($row["Noweeks"]==0) {
			$res1="select rental.Nodays*rates.Drate AS Amount FROM rental, rates where rental.rid='$Rid' and rental.Ctype=rates.Ctype";
	$result1=mysqli_query($connection,$res1);
	echo "<h1><center>Amount due</h1><br><br>";
	$row1 = mysqli_fetch_assoc($result1);
	echo "<h1>USD&nbsp".$row1["Amount"]."</h1>";
			}
			else{
			$res2="select rental.Noweeks*rates.Wrate AS Amount FROM rental, rates where rental.rid='$Rid' and rental.Ctype=rates.Ctype";
	$result2=mysqli_query($connection,$res2);
	echo "<h1><center>Amount due</h1><br><br>";
	$row2 = mysqli_fetch_assoc($result2);
	echo "<h1>USD&nbsp".$row2["Amount"]."</h1>";
			}
?>
</body>
</html>