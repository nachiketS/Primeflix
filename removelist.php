<?php
	session_start();
	$id=$_GET['id'];
	$uname=$_SESSION['unam'];
	$conn=new mysqli("localhost","root","","anotherone");
	$conn->query("DELETE FROM mylist WHERE tid= '$id' AND uname='$uname'");
	header("Location:newmylist.php");
?>
