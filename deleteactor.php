<?php 
	$id =$_GET['id'];
	$conn = new mysqli("localhost","root","","anotherone");
	$conn->query("DELETE FROM actors WHERE aid = '$id'");
	header("Location:viewactors.php");
?>