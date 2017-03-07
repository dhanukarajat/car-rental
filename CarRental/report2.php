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
	$res="select Owner_id,rental.Vehicle_id AS Vid,
(rental.Nodays*rates.Drate + rental.Noweeks*rates.Wrate) AS Amount,
rental.Ctype AS Category
FROM rental, rates ,owns
where rental.Ctype=rates.Ctype and rental.Vehicle_id=owns.Vehicle_id";
	$result=mysqli_query($connection,$res);
	echo "<h1><center>Profits according to individual cars</h1><br><br>";	
?>
<center>
<table border='1'>
<tr>
<th>Owner id</th>
<th>Vehicle id</th>
<th>Amount</th>
<th>Car type</th>
</tr>
<?php
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row["Owner_id"] . "</td>";
echo "<td>" . $row["Vid"] . "</td>";
echo "<td>" . $row["Amount"] . "</td>";
echo "<td>" . $row["Category"] . "</td>";
echo "</tr>";
}
}
?>
</table>
</body>
</html>