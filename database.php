<html>
<meta>database.php<meta>

<body>
<script type="text/javascript" src="C:wamp\www\phptest\website.js"></script>
<?php?>

<?php 
	$connect = mysqli_connect("localhost","root","","php");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

	/*$sql = "CREATE DATABASE sql";    Create a database
		if (mysqli_query($database,$sql))
		{
			echo "Database sql created";
		}
		else
		{
			echo "Error creating database: " . mysqli_error($sql);
		}*/

	$sql = "CREATE TABLE Persons(FirstName CHAR(15), LastName CHAR(15), Birthday INT, Email CHAR(25))";
		if(mysqli_query($connect, $sql))
			{
				echo "Table Persons created succesfully";
			}	
		else
			{
				echo "Error with creating table: " . mysqli_query($connect, $sql);
			}	

	$sql = "CREATE TABLE Persons		/*Create table from database*/
	(
		PID INT NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(PID),
		FirstName CHAR(15),
		LastName CHAR(15),
		Birthday CHAR (CONVERT (VARCHAR(8),fmdate, 101))
		Email CHAR(25),
		/*CONVERT (V)*/	

	)";

	$sql = 'INSERT INTO Persons ' . '(FirstName, LastName, Birthday, Email)'.
		"VALUES	('$first','$last','$birth','$email')";

			if (!mysqli_query($connect, $sql))
			{
				die('Error: ' . mysqli_error($connect));
			}
	echo "1 record added";

$result = mysqli_query($connect, "SELECT * FROM Persons");

	echo "<table border='2' id='fade'>
	<tr>
	<th>FirstName</th>
	<th>Last Name</th>
	<th>Birthday</th>
	<th>Email Address</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['FirstName'] . "</td>";
			echo "<td>" . $row['LastName'] . "</td>";
			echo "<td>" . $row['Birthday'] . "</td>";
			echo "<td>" . $row['Email'] . "</td>";
			echo "<tr>";
		}

		echo "</table>";

	mysqli_close($connect);

?>