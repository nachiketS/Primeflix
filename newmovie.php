<?php 
	include_once("try2.php");
	$id=$_GET["id"];
	echo $id;
	$conn=new mysqli("localhost","root","","anotherone");
	$result=$conn->query("SELECT * FROM `titles` JOIN actorjunction on actorjunction.tid = titles.tid JOIN actors on actors.aid = actorjunction.aid JOIN genrejunction ON titles.tid = genrejunction.tid JOIN genres on genres.gid = genrejunction.gid JOIN directors on titles.did= directors.did WHERE titles.tid = '$id'" );
	//$result=$conn->query("SELECT * FROM titles WHERE tid = '$id'");
	$row=$result->fetch_assoc();
	$unam=$_SESSION['unam'];
	$list=$conn->query("SELECT * FROM mylist WHERE uname = '$unam'");
?>
<html>
<head>


<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet"> 
	<style>
	*{
		margin:0px;		
	}
	body{
			padding-top:40px;
	}
	.imageContainer{
		width:100%;
		height:100%;
	}
	.imageContainer{
		content:"";
		position:fixed;
		background-image: url(<?php echo $row['bg']; ?>) ;
		filter: blur(10px);
		background-size: cover;
		z-index:-5;
	}
	.inside .header{
		/*position:relative;*/
	font-family: 'Maven Pro', sans-serif;
	font-size:50px;
		color:black;
		letter-spacing: 0px;
	-webkit-text-fill-color: white;
	margin:20px;
	
	}
	.inside .header2{
			/*position:relative;*/
	font-family: 'Maven Pro', sans-serif;
	font-size:30px;
		color:white;
		letter-spacing: 0px;
		/*z-index:1;*/
	margin:20px;
	
	}
	.poster{
		/*position:relative;*/
		//z-index:4;
		float:right;
		width:20%;
		margin:20px;
	
		margin-right: 5%;
	
	}
	.poster img{
		width:100%;

	}
	.inside .info{
		/*position:relative;*/
		font-family: 'Maven Pro', sans-serif;
		font-size:20px;
		color:white;
		letter-spacing: 0px;
		/*z-index:1;*/
		margin:20px;
		margin-top:50px;
	}
	.inside .trailer{
		//margin:20px;
	
		margin-top:50px;
		/*position:relative;*/
		border:none;
		
	}
	iframe{
		margin:20px;
	border:none;
	}

    .buttons button{
		/*position:relative;*/
		height:50px;
		width:20%;
		margin-left:20px;
		margin-bottom:10px;
		
	}

</style>
<title><?php echo $row['name'] ;?></title>
</head>
<body >
<div class=imageContainer></div>
<div class=inside>
	<div class=header><?php echo $row['name']."(".$row['year'].") " ;?></div>
	<div class=header2><?php echo $row['directorName']; ?></div>
	<div class=poster><img src=<?php echo $row['poster']; ?> ></div>
	<div class=info>Genre: 
	<?php 
		$result2=$conn->query("SELECT * FROM genrejunction JOIN genres ON genrejunction.gid = genres.gid WHERE tid ='$id'");
		while($row2=$result2->fetch_assoc()){
			echo "|".$row2['genre'];
		}
		echo "<br>Lead Actors:";
		$result3=$conn->query("SELECT * FROM actorjunction JOIN actors ON actorjunction.aid = actors.aid WHERE tid ='$id'");
		while($row3=$result3->fetch_assoc()){
			echo "|".$row3['actorName'];
		}
	?>
	<div class="trailer">
	 	<span class="header2">Watch Trailer</span><br>
	 	<iframe width="400" height="240"
			src="https://www.youtube.com/embed/<?php echo $row['trailer'];?>">
		</iframe> 
	</div>
	<div class="buttons">
		<a href= <?php echo $row['movie']; ?>><button>Watch Now</button></a><br>
		<?php
			$flag=0;
			while($row2=$list->fetch_assoc()){
				if($row2['tid']==$id){
					$flag=1;
				}
			}
			if($flag==1)
				echo "<a href=\"removelist.php?id=".$row['tid']."\" ><button>Remove From list </button>";			
			else	
				echo "<a href=\"inlist.php?id=".$row['tid']."\" ><button>Add to List </button></a>";
			
		?>
	</div>
</div>
</div>
</body>
</html>
