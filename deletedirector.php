<?php 
	$id =$_GET['id'];
	$conn = new mysqli("localhost","root","","anotherone");
	$conn->query("DELETE FROM directors WHERE did = '$id'");
	header("Location:viewdirectors.php");
?>