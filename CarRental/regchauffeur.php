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
	
$Fname=$_POST["fname"];
$Lname=$_POST["lname"];
$AGE=$_POST["age"];
$Mobile=$_POST["mobile"];
$Dlno=$_POST["dlno"];

	$result="INSERT INTO chauffeur(Fname,Lname,AGE,Mobile,Dlno) VALUES('$Fname','$Lname','$AGE','$Mobile','$Dlno')";
	mysqli_query($connection,$result) or die(mysqli_error($connection));
	echo "<h3>New chauffeur has been successfully added</h3><br><br>";
?>

</body>
</html>
