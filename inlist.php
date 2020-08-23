<?php
	session_start();
	$conn=new mysqli("localhost","root","","anotherone");
	$id=$_GET['id'];
	$uname=$_SESSION['unam'];
	echo $id;
	echo $uname;
	$result=$conn->query("INSERT INTO mylist(tid,uname) VALUES('$id','$uname')");
	header("Location: newmovie.php?id=$id");
?>