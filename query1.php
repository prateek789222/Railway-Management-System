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

// $sql="SELECT* FROM train_list
// WHERE Name LIKE 'SHATABDI EXP';";
// $result=mysqli_query($conn,$sql);
// $row=mysqli_fetch_array($result);

// // echo mysqli_num_rows($result);
// // while($row=mysqli_fetch_array($result)){
// //     // echo $row[''];
// //     echo "<br>";
// // }
// -------------------------------------------------------------------------------------
// <!-- PHP code to establish connection with the localserver -->


// Username is root
// $user = 'root';
// $password = '';

// // Database name is geeksforgeeks
// $database = 'geeksforgeeks';

// // Server is localhost with
// // port number 3306
// $servername='localhost:3306';
// $mysqli = new mysqli($servername, $user,
// 				$password, $database);

// // Checking for connections
// if ($mysqli->connect_error) {
// 	die('Connect Error (' .
// 	$mysqli->connect_errno . ') '.
// 	$mysqli->connect_error);
// }

// SQL query to select data from database
$name1=$_SESSION['name'];
$sql = "SELECT* FROM booking
WHERE uname LIKE '$name1'";
$result=mysqli_query($conn,$sql);
// $result = $mysqli->query($sql);
// $mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
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
        
		<h1>BOOKING QUERY OF USER</h1>
        
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>uname</th>
				<th>Tnumber</th>
				<th>class</th>
				<th>doj</th>
				<th>dob</th>
				<th>fromstn</th>
				<th>tostn</th>
				<th>name</th>
				<th>age</th>
				<th>gender</th>
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
				<td><?php echo $rows['uname'];?></td>
				<td><?php echo $rows['Tnumber'];?></td>
				<td><?php echo $rows['class'];?></td>
				<td><?php echo $rows['doj'];?></td>
				<td><?php echo $rows['DOB'];?></td>
				<td><?php echo $rows['fromstn'];?></td>
				<td><?php echo $rows['tostn'];?></td>
				<td><?php echo $rows['Name'];?></td>
				<td><?php echo $rows['Age'];?></td>
				<td><?php echo $rows['sex'];?></td>
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