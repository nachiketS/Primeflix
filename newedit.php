<HTML>
<head>Fatal error: Uncaught Error: Call to undefined method mysqli::fetch_assoc() in E:\xampp\htdocs\frontEnd\trynewedit.php:7 Stack trace: #0 {main} thrown in E:\xampp\htdocs\frontEnd\trynewedit.php on line 7
<title>
Add</title>
<?php include_once("nav.php"); 
	$idd=$_GET['id'];
	
?>
 <style>
	input{
		height:50px;
		margin-bottom:10px;
		width:25%;
		border:transparent;
		border-radius: 3px;
	}
input[type="checkbox"]{
		//float:left;
		height:30px;
		margin-left: 0px;
		margin-bottom:0px;
		width:2%;
	}
	form{
		margin-top:50px;
		font-family:Arial;
		font-size:20px;
		color:white;
	}
	button{
		width:25%;
		height:30px;
	}
	h2{
		font-family:Arial;
		color:white;
	}
</style>
</head>
<?php
	$conn=new mysqli("localhost","root","","anotherone");
	/*$result=$conn->query("SELECT id FROM titles");
	$row="";
	while($row=$result->fetch_assoc()){	$nextId=$row['id'];};
	$nextId++;*/
	//$result=$conn->query("SELECT * FROM counter");
	//$row=$result->fetch_assoc();
	//$nextId=$row["nextId"];
	$flag=$gflag=0;
	$name=$director=$year=$rating=$actor1=$actor2=$actor3=$genre1=$genre2=$genre3=$poster=$trailer=$bg=$movie="";
	$nameErr=$directorErr=$yearErr=$genreErr=$actorErr=$ratingErr=$posterErr=$trailerErr=$bgErr=$genre1=$genre2=$genre3="";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(empty($_POST["name"])){
			$nameErr="Enter Name";
		}
		else{
			$name=$_POST["name"];
			$flag++;
		}
		if(empty($_POST["year"])){
			$yearErr="Enter Year";
		}
		else{
			if (!preg_match("/^[0-9]{4}$/",$_POST["year"])) {
				$yearErr="Year should contain only numbers and its length should only be 4";
			}
			else{
				$year=$_POST["year"];
				$flag++;
			}
		}
		if(empty($_POST["director"])){
			$directorErr="Enter director name";
		}
		else{
			$director=$_POST["director"];
			$flag++;
		}
		if(empty($_POST["rating"])){
			$ratingErr="Enter Rating";
		}
		else{
			if(!preg_match("/^[0-9.]+$/",$_POST["rating"])){
				$ratingErr="Rating should only be numbers between 1 to 10";
			}
			else{
				$rating=$_POST["rating"];
				$flag++;
			}
		}
		if(empty($_POST["actor1"])){
			$actorErr="Enter actor's name";
		}
		else{
			if(!preg_match("/^[a-z A-Z,.'-]+$/i",$_POST["actor1"])){
				$actorErr="Actor name can only have alphabets and whitespaces ";
			}
			else{
				$actor1=$_POST["actor1"];
				$flag++;
			}
		}
		$actor2=$_POST["actor2"];
		$actor3=$_POST["actor3"];
		if(empty($_POST["trailer"])){
			$trailerErr="Enter trailer link";
		}
		else{
			$trailer=$_POST['trailer'];
			$flag++;
		}
		if(empty($_POST['poster'])){
			$posterErr="Enter Poster Link";
		}
		else{
			$poster=$_POST['poster'];
			$flag++;
		}
		if(empty($_POST['bg'])){
			$bgErr="Enter background link";
		}
		else{
			$bg=$_POST['bg'];
			$flag++;
		}
		if(empty($_POST['genre1'])){
			$genreErr="Enter atleast one genre";
		}
		else{
			$genre1=$_POST['genre1'];
			$flag++;
		}
		$genre2=$_POST['genre2'];
		$genre3=$_POST['genre3'];
		if(empty($_POST['movie'])){
			$movieErr="Enter movie link";
		}
		else{
			$movie=$_POST['movie'];
			$flag++;
		}
		// if(!empty($_POST["drama"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Drama')";
		// 	$gflag++;
		// }
		// //echo $nextId;
		// //echo $_POST['drama'];
		// if(!empty($_POST["crime"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Crime')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["action"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Action')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["biography"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Biography')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["history"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','History')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["adventure"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Adventure')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["comedy"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Comedy')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["western"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Western')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["scifi"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Sci-Fi')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["romance"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Romance')";
		// 	$gflag++;
		// }
		// if($gflag < 1){
		// 	$genreErr="Select Genre <br>";
		// }
		//echo $sql[1];
		//echo $flag;
		//echo $nextId;
		echo $name,$year,$director,$actor1,$actor2,$actor3,$genre1,$genre2,$genre3,$rating,$poster,$bg,$trailer,$movie;

		if($flag==10){
			$conn->query("INSERT IGNORE INTO actors(`actorName`) VALUES('$actor1')");
			$conn->query("INSERT IGNORE INTO actors(`actorName`) VALUES('$actor2')");
			$conn->query("INSERT IGNORE INTO actors(`actorName`) VALUES('$actor3')");
			$conn->query("INSERT IGNORE INTO directors(`directorName`) VALUES('$director')");	
			$conn->query("INSERT IGNORE INTO genres(`genre`) VALUES('$genre1')");
			$conn->query("INSERT IGNORE INTO genres(`genre`) VALUES('$genre3')");
			$conn->query("INSERT IGNORE INTO genres(`genre`) VALUES('$genre2')");
			$dId='';
						$i=0;
			$result=$conn->query("SELECT * FROM actors WHERE actorName='$actor1' OR actorName='$actor2' OR actorName='$actor3'");
			while($row=$result->fetch_assoc()){
				$aIds[$i]=$row['aid'];
				$i++;
			}
			$i=0;
			$result=$conn->query("SELECT * FROM genres WHERE genre='$genre1' OR genre='$genre2' OR genre='$genre3'");
			while($row=$result->fetch_assoc()){
				$gIds[$i]=$row['gid'];
				$i++;
			}
			$i=0;
			$result=$conn->query("SELECT * FROM directors WHERE directorName='$director'");
			$row=$result->fetch_assoc();
			$dId=$row['did'];
			echo $dId;
			
			// $conn->query("INSERT INTO titles(`name`,`year`,`did`,`trailer`,`poster`,`bg`,`movie`) VALUES ('$name','$year','$dId','$trailer','$poster','$bg','$movie')");
			$conn->query("UPDATE titles set name='$name',year='$year',did='$did',trailer='$trailer',poster='$poster',bg='$bg',movie='$movie' WHERE tid= '$id'");
			$result=$conn->query("SELECT tid FROM titles WHERE name = '$name'");
			$row=$result->fetch_assoc();
			$tid=$row['tid'];
			
			$conn->query("DELETE FROM actorjunction WHERE tid = '$tid'");
			$conn->query("DELETE FROM genrejunction WHERE tid = '$tid'");

			$conn->query("INSERT INTO actorJunction(`tid`,`aid`) VALUES('$tid','$aIds[0]')");
			$conn->query("INSERT INTO actorJunction(`tid`,`aid`) VALUES('$tid','$aIds[1]')");
			$conn->query("INSERT INTO actorJunction(`tid`,`aid`) VALUES('$tid','$aIds[2]')");

			$conn->query("INSERT INTO genreJunction(`tid`,`gid`) VALUES('$tid','$gIds[0]')");
			$conn->query("INSERT INTO genreJunction(`tid`,`gid`) VALUES('$tid','$gIds[1]')");
			$conn->query("INSERT INTO genreJunction(`tid`,`gid`) VALUES('$tid','$gIds[2]')");
		}
		// for($i=1;$i<=$gflag;$i++){
		// 	$conn->query($sql[$i]);
		// }
		// 	$conn->query("INSERT INTO titless(id,title) VALUES ('$nextId','$name')");
		// 	$conn->query("INSERT INTO trailers(id,trailer) VALUES('$nextId','$trailer')");
		// 	$conn->query("INSERT INTO posters(id,poster,bg) VALUES ('$nextId','$poster','$bg')");
		// 	$conn->query("UPDATE counter SET nextId=nextId+1 WHERE id = 1");
		}
	
?>	
<body>
<div style ="margin-left:17%" >
<h2>Add a new movie</h2>
<form method="post">
<?php
	$result=$conn->query("SELECT * FROM titles JOIN actorjunction ON titles.tid=actorjunction.tid join actors ON actors.aid = actorjunction.aid JOIN genrejunction on genrejunction.tid=titles.tid JOIN genres ON genres.gid = genrejunction.gid WHERE titles.tid = '$idd'");
	$row1=$result->fetch_assoc();
?>
<input type = "text" name="name" placeholder="name" value="<?php echo $row1['name']; ?>"><?php echo $nameErr; ?><br>
<input type = "text" name="year" placeholder="year" value="<?php echo $row1['year']; ?>"><?php echo $yearErr; ?><br>
<?php
	$result4=$conn->query("SELECT * FROM directors join titles on directors.did = titles.did WHERE tid = '$idd'");
while($row4=$result4->fetch_assoc()){
	echo "<input type = \"text\" name=\"director\" placeholder=\"director\" value=\"".$row4['directorName']."\";>".$directorErr."<br>";
}
?>
<!-- <input type="text" name="director" placeholder="director"><?php echo $directorErr; ?><br>
 -->
 <input type="text" name="actor1" placeholder="Actor's/Actress' Name"><?php echo $actorErr; ?><br>
<input type="text" name="actor2" placeholder="Actor's/Actress' Name"><br>
<input type="text" name="actor3" placeholder="Actor's/Actress' Name"><br>
<input type="text" name="genre1" placeholder="genre1"><br><?php echo $genreErr; ?>
<input type="text" name="genre2" placeholder="genre2"><br>
<input type="text" name="genre3" placeholder="genre3"><br>
<input type="text" name="poster" placeholder="Poster link" value = <?php echo $row1['poster']; ?>><br><?php echo $posterErr; ?>
<input type="text" name="bg" placeholder="Background Link" value = <?php echo $row1['bg']; ?>><br><?php echo $bgErr; ?>
<input type="text" name="trailer" placeholder="trailer link" value = <?php echo $row1['trailer']; ?>><br><?php echo $trailerErr; ?>
<input type="text" name="movie" placeholder="movie link" value = <?php echo $row1['movie']; ?>><br><?php echo $movieErr; ?>

<!-- <input type="checkbox" class = " check" name="action">Action<br> 
<input type="checkbox" class = " check" name="adventure">Adventure<br>
<input type="checkbox" class = " check" name="drama">Drama<br>
<input type="checkbox" class = " check" name="crime">Crime<br>
<input type="checkbox" class = " check" name="history">History<br>
<input type="checkbox" class = " check" name="western">Western<br>
<input type="checkbox" class = " check" name="biography">Biography<br>
<input type="checkbox" class = " check" name="scifi">Sci-Fi<br>
<input type="checkbox" class = " check" name="romance">Romance<br> -->
<?php echo $genreErr; ?>
<Button type="submit" >Submit</Button>
</form>
</div>
</body>
</html>
