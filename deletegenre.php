<?php 
	$id =$_GET['id'];
	$conn = new mysqli("localhost","root","","anotherone");
	$conn->query("DELETE FROM genres WHERE gid = '$id'");
	header("Location:viewgenres.php");
?>