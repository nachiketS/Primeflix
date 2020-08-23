
<?php 
	include_once("nav.php");

	$conn = new mysqli("localhost","root","","anotherone");
	$result=$conn->query("SELECT * FROM genres");
	echo "<table style=\"margin:5% 17%\">";
	while($row=$result->fetch_assoc()){
		echo "<tr><td>".$row['genre']."</td><td><a href = \"editgenre.php?id=$row[gid]\">edit</a></td><td><a href = \"deletegenre.php?id=$row[gid]\">delete</a></td></tr>";
	}
	echo "</table>";
?>


<form method="post" style="margin-left: 17%">
<input type = "text" placeholder="new genre" name="newgenre">
<button type="submit">SUB</button>
</form>

<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		$newname=$_POST['newgenre'];
		$conn->query("INSERT IGNORE INTO genres(genre) VALUES ('$newname')");
	}
?>
