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
	$Ctype=$_POST["Ctype"];
			
			$res="SELECT Vehicle_id,License_no,Model,Year,Drate AS Daily_Rate, Wrate AS Weekly_Rate FROM car AS C JOIN rates AS R
WHERE C.Ctype=R.Ctype AND C.Ctype='$Ctype'";
	$result=mysqli_query($connection,$res);
	echo "<h1><center>".$Ctype."&nbsp;Cars</h1><br><br>";
?>
<center>
<table border='1'>
<tr>
<th>Vehicle ID</th>
<th>License No</th>
<th>Model</th>
<th>Year</th>
<th>Daily Rate</th>
<th>Weekly Rate</th>
</tr>
<?php
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row["Vehicle_id"] . "</td>";
echo "<td>" . $row["License_no"] . "</td>";
echo "<td>" . $row["Model"] . "</td>";
echo "<td>" . $row["Year"] . "</td>";
echo "<td>" . $row["Daily_Rate"] . "</td>";
echo "<td>" . $row["Weekly_Rate"] . "</td>";
echo "</tr>";
}
}
?>
</table>
</body>
</html>


