<?php
	session_start();
	$u=$_SESSION["unam"];
	if($_SESSION["unam"]=="admin"){
		header("Location: adminHome.php");
	}
	else
			header("Location: newuserHome.php");
	$conn = new mysqli("localhost","root","","anotherone");
	$conn->query("UPDATE login SET visits = visits+1 WHERE uname = '$u'");

?>


