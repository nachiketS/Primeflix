<?php
	$conn=new mysqli("localhost","root","","movies");
	$sql->query('call dispall()');
	$sql=$sql->fetch_assoc();
	echo $sql['title'];
?>