<!-- ADMIN HOME -->
<?php 
	session_start();
	
?>
<html>
<head>
<title>
Website Name</title>
<?php 
	$conn = new mysqli("localhost","root","","anotherone");
	$noUser=$conn->query("SELECT COUNT(*) FROM login");
	$noMovies=$conn->query("SELECT COUNT(*) FROM titles");
	$noVisits=$conn->query("SELECT sum(visits) FROM login");
	$noUser=$noUser->fetch_assoc();
	$noMovies=$noMovies->fetch_assoc();
	$noVisits=$noVisits->fetch_assoc();
?>
</head>
<style>
	div{
		margin-top:100px;
	}
	.stats{
		color:white;
		font-size:20px;
		font-family:Arial;
		padding:10px;
		background-color:#585858;
	}
</style>
<?php include_once("nav.php"); ?>
<body>
<div style ="margin-left:17%" ><br>
	<span class="stats">Total no. of accounts : <?php echo $noUser["COUNT(*)"] ?></span><br><br><br>
	<span class="stats">Total no. of movies in database : <?php echo $noMovies["COUNT(*)"] ?></span><br><br><br>
	<span class="stats">Total no. of visits : <?php echo $noVisits["sum(visits)"] ?></span><br><br><br>
</div>
</body>
</html>