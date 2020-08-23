<?php 
	include_once("try2.php");
?>
<html>
<head><title>
Search</title>
<style>
.row h2{
	position: relative;
	/*/margin:10px;*/
	margin:1%;
	color:Orange;
}
.row{
	width:99%;
	position: absolute;
	margin:0px;
	margin-top:40px;
	margin-left: 3%;
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
	//include("usernav.php");
	$string=$_GET['search'];
	$conn=new mysqli("localhost","root","","anotherone");
	$result=$conn->query("SELECT * FROM `titles` join directors on titles.did = directors.did join actorjunction on actorjunction.tid = titles.tid join actors on actors.aid = actorjunction.aid WHERE name like '%$string%' or directors.directorName like '%$string%' or actors.actorName like '%$string%' group by titles.tid ");
?>	
<div class = row>
<h2><?php echo "search result for :".$string; ?></h2>
<?php 
	while($row=$result->fetch_assoc()){
		echo "<div class=columns>".
		"<a href=\"newmovie.php?id=".$row['tid']."\"><img src=".$row['poster'].">".
		"<div class=overlay><div class=otext>"."<a href=\"newmovie.php?id=".$row['tid']."\">".$row['name']."</a></div></div>".
		"</div>";
	}
?>
</div>
