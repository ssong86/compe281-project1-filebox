<?php
session_start();
include 'dbconf.php';

echo "Welcome " . $_SESSION["userfirstname"] . " " . $_SESSION["userlastname"];
echo "<p>";
echo "Here are your files : ";
echo "</p>";

$useremail = $_SESSION["useremail"];
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			table, td {
    			border: 1px solid black;
			}
		</style>
	</head>
<body>

<?
//connect to server and select DB
	$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $db_name);

	if ($mysqli->connect_errno) {
	    echo "Error connecting to MySQL: " . $mysqli->connect_error;
	}

	$query = "select * from users where email = '$useremail'";
	$userid='';

	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_row()) {
				$userid=$row[0];
		    }
	}

	$fquery = "select * from files where userid = '$userid' ";

	echo "<table>";
			echo "<tr>";
					echo "<td>"; 
					echo "Check to Delete";
					echo "</td>"; 
					echo "<td>"; 
						echo "FileName";
					echo "</td>"; 
					echo "<td>"; 
						echo "FileDesc";
					echo "</td>"; 				
					echo "<td>"; 
						echo "FileURL";
					echo "</td>"; 
					echo "<td>"; 
						echo "UploadTime";
					echo "</td>"; 				
					echo "<td>"; 
						echo "UpdateTime";
					echo "</td>"; 
			echo "</tr>";

	if ($result = $mysqli->query($fquery)) {
			echo "<tr>";
			while ($row = $result->fetch_row()) {
					echo "<td>"; 
					$checkStr = "<input type='checkbox' name='file' value='file'>";
					echo $checkStr;
					echo "</td>"; 
					echo "<td>"; 
						echo $row[1];
					echo "</td>"; 
					echo "<td>"; 
						echo $row[2];
					echo "</td>";
					echo "<td>"; 
						echo "<a href='" . $row[3]."'>" . $row[3] . "</a>";
					echo "</td>"; 	
					echo "<td>"; 
						echo $row[4];
					echo "</td>"; 	
					echo "<td>"; 
						echo $row[5];
					echo "</td>"; 	
			    }
			echo "</tr>";
	}
	echo "</table>";	
?>
<p>
	<form action="delete.php" method="post" enctype="multipart/form-data">
	    Delete Checked File:
	    <input type="submit" value="Delete File" name="deletesubmit">
	</form>
</p>
<p>
	<form action="upload.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload File" name="submit">
	</form>
</p>

</body>
</html>