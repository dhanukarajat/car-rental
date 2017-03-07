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
$Insno=$_POST["ino"];
	$result="INSERT INTO customer(Fname,Lname,AGE,Mobile,Dlno,Insno) VALUES('$Fname','$Lname','$AGE','$Mobile','$Dlno','$Insno')";
	mysqli_query($connection,$result) or die(mysqli_error($connection));
	echo "<h3>New customer has been successfully added</h3><br><br>";
?>
<?php	
	$result1="SELECT Cid FROM customer WHERE Dlno='$Dlno'";
	$result2=mysqli_query($connection,$result1);
	while($row = mysqli_fetch_assoc($result2))
{
	echo "<h3>Customer ID is :</h3>".$row["Cid"];
}
?>
</body>
</html>
