<?php
	include_once("nav.php");
	$id=$_GET['id'];
	$conn=new mysqli("localhost","root","","anotherone");
	
	$result=$conn->query("SELECT * FROM titles WHERE tid = '$id'");
	$row=$result->fetch_assoc();
?>
 <style>
	input{
		height:50px;
		margin-bottom:10px;
		width:25%;
		border:transparent;
		border-radius: 3px;
	}
	select{
		height:50px;
		margin:10px;
		width:25%;
		border:transparent;
		border-radius: 3px;	
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


<?php
	$flag=$gflag=0;
	$name=$director=$year=$rating=$actor1=$actor2=$actor3=$genre1=$genre2=$genre3=$poster=$trailer=$bg=$movie="";
	$nameErr=$directorErr=$yearErr=$genreErr=$actorErr=$ratingErr=$posterErr=$trailerErr=$bgErr=$genre1=$genre2=$genre3=$movieErr="";
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
		if(empty($_POST['movie'])){
			$movieErr="Enter movie link";
		}
		else{
			$movie=$_POST['movie'];
			$flag++;
		}
		if(empty($_POST['director'])){
			$directorErr="Select a director";
		}	
		else{
			$director=$_POST['director'];
			$flag++;
		}
		if(empty($_POST['actor1'])){
			$actorErr="Select a actor";
		}	
		else{
			$actor1=$_POST['actor1'];
			$flag++;
		}
		$actor2=$_POST['actor2'];
		$actor3=$_POST['actor3'];
		if(empty($_POST['genre1'])){
			$genreErr="Select a genre";
		}	
		else{
			$genre1=$_POST['genre1'];
			$flag++;
		}
		$genre2=$_POST['genre2'];
		$genre3=$_POST['genre3'];
		if($flag==9){
			$dire=$conn->query("SELECT * FROM directors WHERE directorName = '$director'");
			$dir=$dire->fetch_assoc();
			$did=$dir['did'];
			$conn->query("UPDATE titles set name = '$name', year='$year',poster='$poster',bg='$bg',trailer='$trailer',movie='$movie',did='$did' WHERE tid='$id'");
			$conn->query("DELETE from actorjunction WHERE tid = '$id'");
			$conn->query("DELETE from genrejunction WHERE tid = '$id'");
			$actors=$conn->query("SELECT * from actors WHERE actorName= '$actor1'");
			$actors=$actors->fetch_assoc();
			$actor1=$actors['aid'];
			// $conn->query("INSERT INTO actorjunction(tid,aid) VALUES ('$id','$actor1')");
			
			$actors=$conn->query("SELECT * from actors WHERE actorName= '$actor2'");
			$actors=$actors->fetch_assoc();
			$actor2=$actors['aid'];
			//$conn->query("INSERT INTO actorjunction(tid,aid) VALUES ('$id','$actor2')");
			
			$actors=$conn->query("SELECT * from actors WHERE actorName= '$actor3'");
			$actors=$actors->fetch_assoc();
			$actor3=$actors['aid'];
			//$conn->query("INSERT INTO actorjunction(tid,aid) VALUES ('$id','$actor3')");
			$conn->query("call insertactor('$actor1','$actor2','$actor3','$id')");
			$genres=$conn->query("SELECT * FROM genres WHERE genre = '$genre1'");
			$genres=$genres->fetch_assoc();
			$genre1=$genres['gid'];
			$conn->query("INSERT INTO genrejunction(tid,gid) VALUES ('$id','$genre1')");
			
			$genres=$conn->query("SELECT * FROM genres WHERE genre = '$genre2'");
			$genres=$genres->fetch_assoc();
			$genre2=$genres['gid'];
			$conn->query("INSERT INTO genrejunction(tid,gid) VALUES ('$id','$genre2')");

			$genres=$conn->query("SELECT * FROM genres WHERE genre = '$genre3'");
			$genres=$genres->fetch_assoc();
			$genre3=$genres['gid'];
			$conn->query("INSERT INTO genrejunction(tid,gid) VALUES ('$id','$genre3')");
		}
	}
?>
<form method="post" id="edit" style="margin:5% 17%">
<input type = "text" name="name" placeholder="name" value="<?php echo $row['name']; ?>"><?php echo $nameErr; ?><br>
<input type = "text" name="year" placeholder="year" value="<?php echo $row['year']; ?>"><?php echo $yearErr; ?><br>
<input type="text" name="poster" placeholder="Poster link" value = <?php echo $row['poster']; ?>><br><?php echo $posterErr; ?>
<input type="text" name="bg" placeholder="Background Link" value = <?php echo $row['bg']; ?>><br><?php echo $bgErr; ?>
<input type="text" name="trailer" placeholder="trailer link" value = <?php echo $row['trailer']; ?>><br><?php echo $trailerErr; ?>
ACTOR <BR>
<select name = "actor1" >
	<?php 
		$actors = $conn->query("SELECT * FROM actors");
		while($act=$actors->fetch_assoc()){
			echo "<option value=\"$act[actorName]\">";
			echo $act['actorName']."</option>";
		}
	?>
</select><?php echo $actorErr; ?>
<select name = "actor2">
	<?php 
		$actors = $conn->query("SELECT * FROM actors");
		while($act=$actors->fetch_assoc()){
			echo "<option value=\"$act[actorName]\">";
			echo $act['actorName']."</option>";
		}
	?>
</select>
<select name = "actor3">
	<?php 
		$actors = $conn->query("SELECT * FROM actors");
		while($act=$actors->fetch_assoc()){
			echo "<option value=\"$act[actorName]\">";
			echo $act['actorName']."</option>";
		}
	?>
</select>
<a href="viewactors.php">add/edit</a><br>
GENRE<br>
<select name = "genre1">
	
 	<?php 
		$genres = $conn->query("SELECT * FROM genres");
		while($act=$genres->fetch_assoc()){
			echo "<option value=\"$act[genre]\">";
			echo $act['genre']."</option>";
		}
	?>
</select><?php echo $genreErr; ?>
<select name = "genre2">
	
 	<?php 
		$genres = $conn->query("SELECT * FROM genres");
		while($act=$genres->fetch_assoc()){
			echo "<option value=\"$act[genre]\">";
			echo $act['genre']."</option>";
		}
	?>
</select>
<select name = "genre3">
	
 	<?php 
		$genres = $conn->query("SELECT * FROM genres");
		while($act=$genres->fetch_assoc()){
			echo "<option value=\"$act[genre]\">";
			echo $act['genre']."</option>";
		}
	?>
</select>
<a href="viewgenres.php">add/edit</a><br>
DIRECTOR<br>
<select name = "director">
	<?php	
	$dire= $conn->query("SELECT * FROM directors");
		while($dir=$dire->fetch_assoc()){
			echo "<option value =\"$dir[directorName]\">";
		 	echo $dir['directorName']."</option>";
		}
	?>
</select>
<a href="viewdirectors.php">add/edit</a><br><?php echo $directorErr; ?>
<input type="text" name="movie" placeholder="movie link" value = <?php echo $row['movie']; ?>><br><?php echo $movieErr; ?>
<button type= "submit">SUB</button>


