
<?php 
	include_once("nav.php");

	$conn = new mysqli("localhost","root","","anotherone");
	$result=$conn->query("SELECT * FROM directors");
	echo "<table style=\"margin: 5% 17%\">";
	while($row=$result->fetch_assoc()){
		echo "<tr><td>".$row['directorName']."</td><td><a href = \"editdirector.php?id=$row[aid]\">edit</a></td><td><a href = \"deletedirector.php?id=$row[aid]\">delete</a></td></tr>";
	}
	echo "</table>";
?>

<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		echo "SADASD";
		$newname=$_POST['newdirector'];
		$conn->query("INSERT IGNORE INTO directors(directorName) VALUES ('$newname')");
	}
	?>
<form method="post" style="margin-left: 17%">
<input type = "text" placeholder="new actor" name="newdirector">
<button type="submit">SUB</button>
</form>