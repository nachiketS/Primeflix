
<?php
	$conn=new mysqli("localhost","root","","anotherone");
	include_once("nav.php");
	$result=$conn->query("SELECT * FROM `titles` join directors on titles.did = directors.did ");
	// $genres[],$actors[]="";
	// $i=0;
	// while($row=$result->fetch_assoc()){
	// 	$genres[0]=$row.['genre'];
	// 	$actors[0]=$row.['actorName'];
	// }

?>
<HTML>
<head>
<title>VIEW</title>
<style>
table{
		border-collapse: collapse;
		padding-top:70px;
		font-family: Arial;
		color:white;
		width:100%;
}
td{
		border:1px solid white;
		padding:5px;
		letter-spacing: 1px;
		border-collapse: collapse;
}
td img{
	width:100px;
}
a{
	color:white;
}
</style>
</head>
<body>
<div style="padding-left:17%;padding-top:70px;overflow-x:auto;">
<table>
<tr>
	<th>id</th>
	<th>title</th>
	<th>poster</th>
	<th>year</th>
	<th>director</th>
	<th>genres</th>
	<th>actors</th>
	<th></th>
	<th></th>
<!-- 	<th></th>
 -->
</tr>
<?php

while($row=$result->fetch_assoc()){
		$i=$row['tid'];
		echo "<tr><td>".$row['tid']."</td>".
		"<td>".$row['name']."</td>".
		"<td><img src=".$row['poster']."></td>".
		"<td>".$row['year']."</td>".
		"<td>".$row['directorName']."</td>"."<td>";
		$result2=$conn->query("SELECT * FROM `genrejunction` JOIN genres ON genrejunction.gid=genres.gid WHERE tid ='$i' ");
		while($row2=$result2->fetch_assoc()){
			echo $row2['genre']."<br>";
		}
		echo "</td>"."<td>";
		$result3=$conn->query("SELECT * FROM actorjunction JOIN actors ON actorjunction.aid = actors.aid WHERE tid='$i'");
		while($row3=$result3->fetch_assoc()){
			echo $row3['actorName']."<br>";
		}
		
		echo "</td>"."<td><a href=\"trynewedit.php?id=".$row['tid']."\">edit</a>".
		"<br><br><a href = \"delete.php?id=".$row['tid']."\" onClick=\"return confirm('Are you sure you want to delete?')\">delete</a></td>".
		"</tr>";	

		echo "<br>";
		// "<td>".$genres[$i]."</td>".
		// "<td>".$genres[$i+1]."</td>".
		// "<td>".$genres[$i+2]."</td>".
		// "<td><a href=\"edit.php?id=".$row['tid']."\">edit</a>".
	// 	"<a href=\"delete.php?id=".$row['tid']."\"><br><br>	delete</a></td>".
	// 	"</tr>";
	// $i=$i+3;		
}
?>
</table>
</div>
</div>
</HTML>