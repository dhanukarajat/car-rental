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
	
$Cid=$_POST["cbid"];
$Sdate=$_POST["Sdate"];
$Ctype=$_POST["Ctype"];
$Rtype=$_POST["Rtype"];
$Nodays=$_POST["Days"];
$Noweeks=$_POST["Weeks"];
$Vehicle_id=$_POST["Vehicleid"];
?>
<table border='1'><tr><th>Vehicle ID</th></tr>
<?php
$res="select vehicle_id from car where ctype='$Ctype' and Vehicle_id not in 
(SELECT Vehicle_id FROM rental WHERE rental.Ctype='$Ctype' and Sdate='$Sdate')";
	$result=mysqli_query($connection,$res);
	if ($Noweeks>=1) {
		$num=$Noweeks*7;
		$D2=date('Y-m-d', strtotime($Sdate. ' + $num days'));
	}
    
	if ((mysqli_num_rows($result) > 0) || (strtotime($Sdate) > strtotime($D2))) {
		echo "<br><h2>Congrats Vehicle is available</h2><br>";
		echo "<h3>List of Available vehicles</h3><br>";
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>"; echo "<td>" . $row["vehicle_id"] . "</td>";
			echo "</tr>";
		}
	}
	else
		echo "Car is not available";
?>
</table>
<?php

if($Vehicle_id!=null) {
	
	$res="INSERT into rental(Cid,Vehicle_id,Ctype,Rtype,Sdate,Nodays,Noweeks) values('$Cid','$Vehicle_id','$Ctype','$Rtype','$Sdate','$Nodays','$Noweeks')";
	$result=mysqli_query($connection,$res);
	echo "Rental has been added";
}
?>

<?php
$res2="SELECT Rid,Cid,Vehicle_id,Ctype,Rtype,Sdate,Nodays,Noweeks FROM rental";
	$result2=mysqli_query($connection,$res2);
	echo "<h1><center>Active & Scheduled Rentals</h1><br><br>";
?>
<center>
<table border='1'>
<tr>
<th>RID</th>
<th>Customer ID</th>
<th>Vehicle id</th>
<th>Car type</th>
<th>Rent type</th>
<th>Start Date</th>
<th>No of days</th>
<th>No of weeks</th>
</tr>
<?php
if (mysqli_num_rows($result2) > 0) {
while($row2 = mysqli_fetch_assoc($result2))
{
echo "<tr>";
echo "<td>" . $row2["Rid"] . "</td>";
echo "<td>" . $row2["Cid"] . "</td>";
echo "<td>" . $row2["Vehicle_id"] . "</td>";
echo "<td>" . $row2["Ctype"] . "</td>";
echo "<td>" . $row2["Rtype"] . "</td>";
echo "<td>" . $row2["Sdate"] . "</td>";
echo "<td>" . $row2["Nodays"] . "</td>";
echo "<td>" . $row2["Noweeks"] . "</td>";
echo "</tr>";
}
}
?>
</table>
</body>
</html>