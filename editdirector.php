<style>

form{
	margin:17%;
}
</style>
<?php
	include_once("nav.php");
	$conn=new mysqli("localhost","root","","anotherone");

	$id=$_GET['id'];
	$res=$conn->query("SELECT * FROM directors WHERE did = '$id'");
	$row=$res->fetch_assoc();
	echo "<form method =\"post\">";
	echo "<input type= \"text\" value=\"$row[directorName]\" name=\"qwe\">";
	echo "<button type=\"submit\">SUB</button>";
	
	echo "</form>";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		echo "dasdas";
		$new=$_POST['qwe'];
		$conn->query("UPDATE directors SET directorName = '$new' WHERE did = '$id'");
	header("Location:viewdirectors.php");
		}
?>
<!-- <form method = "post">
	<input type="text" value=<?php echo $row[directorName]; ?> name="qwe">
</form> -->