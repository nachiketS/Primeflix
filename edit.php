<?php
	include("nav.php");
	$conn=new mysqli("localhost","root","","anotherone");
	$idd=$_GET['id'];
	echo $idd;
/*	$result=$conn->query("SELECT titless.*,titles.year,titles.director,titles.rating,titles.actor1,titles.actor2,titles.actor3,GROUP_CONCAT(genre),posters.poster FROM titless join titles ON titles.id=titless.id join posters ON titles.id = posters.id join genre ON titles.id=genre.id GROUP BY(titles.id) WHERE id = '$idd' ");
	$row=$result->fetch_assoc();
*/
	$result=$conn->query("SELECT * FROM titles JOIN actorjunction ON titles.tid=actorjunction.tid join actors ON actors.aid = actorjunction.aid JOIN genrejunction on genrejunction.tid=titles.tid JOIN genres ON genres.gid = genrejunction.gid WHERE titles.tid = '$idd'");
	$row1=$result->fetch_assoc();
?>
<HTML>
<head>
<title>Edit</title>
</head>
<style>
form{
	padding-left:17%;
	padding-top:70px;
}
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
</style>
<?php
	$genreErr=$nameErr=$yearErr=$directorErr=$ratingErr=$actorErr=$posterErr=$bgErr=$trailerErr="";
	$name=$year=$director=$rating=$actor=$poster=$bg=$trailer="";
	$flag=$gflag=0;
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
		if(empty($_POST["actor"])){
			$actorErr="Enter actor's name";
		}
		else{
			if(!preg_match("/^[a-z A-Z,.'-]+$/i",$_POST["actor"])){
				$actorErr="Actor name can only have alphabets and whitespaces ";
			}
			else{
				$actor1=$_POST["actor"];
				$flag++;
			}
		}
		// $actor2=$_POST["actor2"];
		// $actor3=$_POST["actor3"];
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
		// if(!empty($_POST["drama"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','Drama')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["crime"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','Crime')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["action"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','Action')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["biography"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','Biography')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["history"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','History')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["adventure"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','Adventure')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["comedy"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','Comedy')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["western"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','Western')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["scifi"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','Sci-Fi')";
		// 	$gflag++;
		// }
		// if(!empty($_POST["romance"])){
		// 	$sql[]="INSERT INTO genre(id,genre) VALUES ('$idd','Romance')";
		// 	$gflag++;
		// }
		// if($gflag < 1){
		// 	$genreErr="Select Genre <br>";
		// }
	}
?>

<form method="post" id="edit">
<input type = "text" name="name" placeholder="name" value="<?php echo $row1['name']; ?>"><?php echo $nameErr; ?><br>
<input type = "text" name="year" placeholder="year" value="<?php echo $row1['year']; ?>"><?php echo $yearErr; ?><br>
<?php 
// $genres[];
// $actors[];

$result4=$conn->query("SELECT * FROM directors join titles on directors.did = titles.did WHERE tid = '$idd'");
while($row4=$result4->fetch_assoc()){
	echo "<input type = \"text\" name=\"director\" placeholder=\"director\" value=\"".$row4['directorName']."\";>".$directorErr."<br>";
}
	$result2=$conn->query("SELECT * FROM actorjunction join actors on actors.aid= actorjunction.aid WHERE tid='$idd' ");
	$i=0;
	while($row2=$result2->fetch_assoc()){	
		echo "<input type = \"text\" name=\"actor\" placeholder=\"actor\" value =\"".$row2['actorName']."\";>".$actorErr." ";
		$actors[$i]=$_POST['actor'];
		$i++;
		// echo "<input type = \"text\" name=\"actor2\" placeholder=\"actor2\" value =".$row2['actorName'].$actorErr."<br><br>";
		// echo "<input type = \"text\" name=\"actor3\" placeholder=\"actor3\" value =".$row2['actorName'].$actorErr."<br><br>";
	}
	echo "<input type = \"text\" name=\"newactor\" placeholder=\"new actor\";>".$actorErr."<br> ";
		
	$result3=$conn->query("SELECT * FROM genrejunction join genres on genres.gid = genrejunction.gid WHERE tid='$idd'");
	$i=0;
	while($row3=$result3->fetch_assoc()){
		echo "<input type = \"text\" name=\"genre\" placeholder=\"genre1\" value =\"".$row3['genre']."\">".$genreErr." ";
		$genres[$i]=$_POST['genre'];
		$i++;
		// echo "<input type = \"text\" name=\"genre2\" placeholder=\"genre2\" value =".$row2['genre'].";><".$genreErr."; <br>";
		// echo "<input type = \"text\" name=\"genre3\" placeholder=\"genre3\" value =".$row2['genre'].";><".$genreErr."; <br>";
	}
	echo "<input type = \"text\" name=\"newgenre\" placeholder=\"new genre\";>".$genreErr."<br> ";
	echo "<br>";
?>	
<input type="text" name="poster" placeholder="Poster link" value = <?php echo $row1['poster']; ?>><br><?php echo $posterErr; ?>
<input type="text" name="bg" placeholder="Background Link" value = <?php echo $row1['bg']; ?>><br><?php echo $bgErr; ?>
<input type="text" name="trailer" placeholder="trailer link" value = <?php echo $row1['trailer']; ?>><br><?php echo $trailerErr; ?>
<?php echo $row4['trailer']; ?>
<?php echo $genreErr." ".$poster; ?>
<!-- <div class=checktxt>
<input type="checkbox" class = " check" name="action">Action<br> 
<input type="checkbox" class = " check" name="adventure">Adventure<br>
<input type="checkbox" class = " check" name="drama" >Drama<br>
<input type="checkbox" class = " check" name="crime">Crime<br>
<input type="checkbox" class = " check" name="history">History<br>
<input type="checkbox" class = " check" name="western">Western<br>
<input type="checkbox" class = " check" name="biography">Biography<br>
<input type="checkbox" class = " check" name="scifi">Sci-Fi<br>
<input type="checkbox" class = " check" name="romance">Romance<br>
</div> -->
<button type = "submit" onclick="alert()">Update</button>
<button>Cancel</button>
<button onclick="reset()">Reset</button>

<script>
	function alert(){
		var retval=confirm("Are u sure");
		if(retval==true){
			<?php
				if($flag==7	){
					$conn->query("UPDATE titles set name = '$name', year='$year',poster='$poster',bg='$bg',trailer='$trailer',movie='$movie' WHERE tid='$idd'");

					if(!empty($_POST['newactor'])){
						$newactor=$_POST['newactor'];
						$conn->query("INSERT IGNORE INTO actors(actorName) VALUES ('$newactor')");
						$ins=$conn->query("SELECT * FROM actors WHERE actorName='$newactor'");
						$row5=$ins->fetch_assoc();
						$aid=$row5['aid'];
						$conn->query("INSERT IGNORE INTO actorjunction(tid,aid) VALUES ('$idd','$aid')");
					}
					if(!empty($_POST['newgenre'])){
						$newgenre=$_POST['newgenre'];
						$conn->query("INSERT IGNORE INTO genres(genre) VALUES ('$newgenre')");
						$ins2=$conn->query("SELECT * FROM genres WHERE genre='$newgenre'");
						$row6=$ins2->fetch_assoc();
						$gid=$row6['gid'];
						$conn->query("INSERT  INTO genrejunction(tid,gid) VALUES ($idd,'$gid')");
					}	
					// $conn->query("UPDATE titles SET year='$year',director='$director',actor1='$actor1',actor2='$actor2',actor3='$actor3',rating='$rating' WHERE id='$idd';");
					// $conn->query("UPDATE trailers set trailer='$trailer' WHERE id = '$idd'");
					// $conn->query("UPDATE posters set poster='$poster',bg='$bg' WHERE id = '$idd'");
					// $conn->query("DELETE from genre WHERE id = '$idd'");
					// for($i=0;$i<$gflag;$i++){
					// 	$conn->query($sql[$i]);
					// }
					
					//header("Location: newview.php");
			
				}
			?>
		}
	}
	function reset(){
		document.getElementById("edit").reset();
	}
</script>
<?php echo $gid; ?>
</form>
</HTML>