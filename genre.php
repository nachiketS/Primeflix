<?php include_once("try2.php"); ?>
<html>
<head><title>
</title>
<style>
.row h2{
	position: relative;
	/*/margin:10px;*/
	margin:1%;
	color:Orange;
}
.row{
	//width:99%;
	position: relative;
	margin:0px;
	margin-top:40px;
	padding-left:3%;
	//margin-left: 3%;
}
.columns{
	width:15%;
	height:310px;
	float:left;
	margin:3px;
	position:relative;
	//border:2px solid black;
	margin-top: 0px;
	margin-bottom:0px;
}
.columns img{
	width:100%;
	height:310px;
}

.columns .overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(88,88,88,0.8);
  overflow: hidden;
  width: 100%;
  height: 0;
  transition: .5s ease;
}

.columns:hover .overlay {
  height: 50%;
}

.otext a{
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
.row::after {
    content: "";
    clear: both;
    display: table;
}

</style>
</head>
<body>
<?php 
	//include_once("usernav.php");
	//$string=$_GET['search'];
	$conn=new mysqli("localhost","root","","anotherone");
	$result2=$conn->query("SELECT * FROM genres ORDER BY genre");

while($row2=$result2->fetch_assoc()){
$temp=$row2['genre'];
	
echo "<div class = row>
	<h2>".$temp."</h2>";
	$result=$conn->query("SELECT * FROM titles JOIN genrejunction on titles.tid=genrejunction.tid join genres ON genres.gid = genrejunction.gid WHERE genre ='$temp' ORDER BY titles.name ");
	
	while($row=$result->fetch_assoc()){
		echo "<div class=columns>".
		"<a href=\"newmovie.php?id=".$row['tid']."\"><img src=".$row['poster'].">".
		"<div class=overlay><div class=otext>"."<a href=\"newmovie.php?id=".$row['tid']."\">".$row['name']."</a></div></div>".
		"</div>";
	}
	echo "</div>";
}
?>
</div>
