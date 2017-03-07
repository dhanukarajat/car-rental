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
	$Drate=$_POST["udrate"];
	$Wrate=$_POST["uwrate"];
	$Ctype=$_POST["Ctype"];
	if(isset($_POST["udrate"]) AND isset($_POST["uwrate"])) {
			$res="UPDATE rates SET Drate=$Drate,Wrate=$Wrate WHERE Ctype='$Ctype'"; 
	}
	$result=mysqli_query($connection,$res);
	echo "<h1><center>".$Ctype."&nbsp;Rates updated</h1><br><br>";
?>

</table>
</body>
</html>


