<?php

session_start();
require('firstimport.php');
if(isset($_SESSION['name'])){}

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="railres"; // Database name

$conn=mysqli_connect("$host", "$username", "$password","$db_name");
if(!$conn){
die("cannot connect");
}
else{
    // echo "connection was successfull <br>";
}

$name1=$_SESSION['name'];
$sql = "SELECT b.uname,b.Tnumber,b.class,b.Status,t.Name from train_list t,booking b where b.Tnumber=t.Number and b.Status='Waiting'";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>GFG User Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
        
		<h1>QUERY2</h1>
        
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>Trainno.</th>
                <th>train name</th>
                <th>username</th>
                <th>class</th>
                <th>status</th>
				
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['Tnumber'];?></td>
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['uname'];?></td>
                <td><?php echo $rows['class'];?></td>
                <td><?php echo $rows['Status'];?></td>
				
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>

?>