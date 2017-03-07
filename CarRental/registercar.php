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
	
$License_no=$_POST["lno"];
$Model=$_POST["model"];
$Year=$_POST["year"];
$Ctype=$_POST["Cartype"];
$Name1=$_POST["Carown"];
$Ssn=$_POST["uid"];
$Bid=$_POST["uid"];
$Compid=$_POST["uid"];
$Name=$_POST["oname"];
$Bname=$_POST["oname"];
$Cname=$_POST["oname"];
$City=$_POST["city"];

	$result="INSERT INTO car(License_no,Model,Year,Ctype) VALUES('$License_no','$Model','$Year','$Ctype')";
	mysqli_query($connection,$result) or die(mysqli_error($connection));
	echo "<h3>New car has been successfully added</h3>";

	if($Name1=="Individual") {
	$result="INSERT INTO individual(Ssn,Name,City) VALUES('$Ssn','$Name','$City')";
	}
	else if($Name1=="Bank") {
	$result="INSERT INTO bank(Bid,Bname,City) VALUES('$Bid','$Bname','$City')";	
	}
	else {
	$result="INSERT INTO company(Compid,Cname,City) VALUES('$Compid','$Cname','$City')";	
	}
	mysqli_query($connection,$result) or die(mysqli_error($connection));
	echo "<h3>New owner has been successfully added</h3>";
?>
<?php
	$res="SELECT Vehicle_id from car where License_no='$License_no'";
	$result2=mysqli_query($connection,$res);
	while($row1 = mysqli_fetch_assoc($result2)) {
	echo "<h3>Vehicle ID is :</h3>".$row1["Vehicle_id"];
	$Vehicle_id=$row1["Vehicle_id"];	}
	
	if($Name1=="Individual") {
		$res1="SELECT Owner_id from individual where Ssn='$Ssn'";
		$result3=mysqli_query($connection,$res1);
		while($row2 = mysqli_fetch_assoc($result3)) {
			echo "<h3>Owner ID is :</h3>".$row2["Owner_id"]; 
		$Owner_id=$row2["Owner_id"];}
	}
	else if($Name1=="Bank") {
		$res1="SELECT Owner_id from bank where Bid='$Bid'";
		$result3=mysqli_query($connection,$res1);
		while($row2 = mysqli_fetch_assoc($result3)) {
			echo "<h3>Vehicle ID is :</h3>".$row2["Owner_id"]; 
			$Owner_id=$row2["Owner_id"];}
	}
	else {
	$res1="SELECT Owner_id from company where Compid='$Compid'";
		$result3=mysqli_query($connection,$res1);
		while($row2 = mysqli_fetch_assoc($result3)) {
			echo "<h3>Vehicle ID is :</h3>".$row2["Owner_id"]; 
			$Owner_id=$row2["Owner_id"];}
	}
	
	$result1="INSERT INTO owns(Vehicle_id,Owner_id,Ctype) VALUES('$Vehicle_id','$Owner_id','$Ctype')";
	mysqli_query($connection,$result1) or die(mysqli_error($connection));
?>
</body>
</html>
