
<?php 
	include_once("nav.php");

	$conn = new mysqli("localhost","root","","anotherone");
	$result=$conn->query("SELECT * FROM actors");
	echo "<table style=\"margin: 5% 17%\">";
	while($row=$result->fetch_assoc()){
		echo "<tr><td>".$row['actorName']."</td><td><a href = \"editactor.php?id=$row[aid]\">edit</a></td><td><a href = \"deleteactor.php?id=$row[aid]\">delete</a></td></tr>";
	}
	echo "</table>";
?>

<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		echo "SADASD";
		$newname=$_POST['newactor'];
		$conn->query("INSERT IGNORE INTO actors(actorName) VALUES ('$newname')");
	}
	?>
<form method="post" style="margin-left: 17%">
<input type = "text" placeholder="new actor" name="newactor">
<button type="submit">SUB</button>
</form>