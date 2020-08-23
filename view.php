
<?php
	$conn=new mysqli("localhost","root","","movies");
	include_once("nav.php");
	$result=$conn->query("SELECT titless.*,titles.year,titles.director,titles.rating,titles.actor1,titles.actor2,titles.actor3,GROUP_CONCAT(genre),posters.poster FROM titless join titles ON titles.id=titless.id join posters ON titles.id = posters.id join genre ON titles.id=genre.id GROUP BY(titles.id) ");
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
	<th>rating</th>
	<th>actor1</th>
	<th>actor2</th>
	<th>actor3</th>
	<th>genre</th>
	<th></th>
</tr>
<?php
while($row=$result->fetch_assoc()){
	echo "<tr><td>".$row['id']."</td>".
		"<td>".$row['title']."</td>".
		"<td><img src=".$row['poster']."></td>".
		"<td>".$row['year']."</td>".
		"<td>".$row['director']."</td>".
		"<td>".$row['rating']."</td>".
		"<td>".$row['actor1']."</td>".
		"<td>".$row['actor2']."</td>".
		"<td>".$row['actor3']."</td>".
		"<td>".$row['GROUP_CONCAT(genre)']."</td>".
		"<td><a href=\"edit.php?id=".$row['id']."\">edit</a>".
		"<a href=\"delete.php?id=".$row['id']."\"><br><br>	delete</a></td>".
		"</tr>";
}
?>
</table>
</div>
</div>
</HTML>