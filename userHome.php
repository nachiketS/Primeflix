<?php 
	//session_start();
	//echo $_SESSION['unam'];
	include_once("try2.php");
  $conn=new mysqli("localhost","root","","movies");
	$result=$conn->query("SELECT * FROM posters ORDER BY id DESC LIMIT 3");
	$i=0;
	while($row=$result->fetch_assoc()){
		$bg[$i]=$row['bg'];
    $id[$i]=$row['id'];
		$i++;
	}
	$i=0;
	$result=$conn->query("SELECT * FROM titless ORDER BY id DESC limit 3");
	while($row=$result->fetch_assoc()){
		$title[$i]=$row['title'];
		$i++;
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

/*body{
	background-color: #585858;
	letter-spacing: 1px;
}*/
body {font-family: Calibri, sans-serif;}
.mySlides {display: none;}
/* Slideshow container */
.slideshow-container {
 width:100%;
 height:400px;
 position: relative;
  //margin: auto;
  //margin-top:30px;
  padding:0;
  margin:0px;
  //top:20px;
  //margin-bottom:50px;
}

.slideshow-container img{
	height:400px;
	width:100%;
	object-fit: cover;
	object-position:0 20%;
 }
/* Caption text */
.text a{
  color: white;
  font-size: 30px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 20%;
 // text-align: center;
 //border:solid 2px black;
 background-color:rgba(88,88,88,0.8);


}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
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
  padding-left:4%;
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

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <?php echo "<img src=\"".$bg[0]."\"width=\"100%\">" ?>
  <div class="text"><?php echo "<a href=\"movie.php?id=".$id[0]."\">".$title[0]."</a>"; ?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <?php echo "<img src=\"".$bg[1]."\"width=\"100%\">" ?>
  <div class="text"><?php echo "<a href=\"movie.php?id=".$id[1]."\">".$title[1]."</a>"; ?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <?php echo "<img src=\"".$bg[2]."\"width=\"100%\">" ?>
  <div class="text"><?php echo "<a href=\"movie.php?id=".$id[2]."\">".$title[2]."</a>"; ?></div>
</div>

</div>
<br>
<div class = row>
<h2>Top Rated</h2>
<?php 
	$result=$conn->query("SELECT * FROM titles join titless on titles.id = titless.id join posters on titles.id = posters.id ORDER BY rating DESC LIMIT 6");
	while($row=$result->fetch_assoc()){
		echo "<div class=columns>".
		"<a href=\"movie.php?id=".$row['id']."\"><img src=".$row['poster'].">".
		"<div class=overlay><div class=otext>"."<a href=\"movie.php?id=".$row['id']."\">".$row['title']."</a></div></div>".
		"</div>";
	}
?>
</div>
<div class = row>
<h2>Latest</h2>
<?php
	$result=$conn->query("SELECT * FROM titles join titless on titles.id = titless.id join posters on titles.id = posters.id ORDER BY year DESC LIMIT 6");
	while($row=$result->fetch_assoc()){
		echo "<div class=columns>".
		"<a href=\"movie.php?id=".$row['id']."\"><img src=".$row['poster'].">".
		"<div class=overlay><div class=otext>"."<a href=\"movie.php?id=".$row['id']."\">".$row['title']." (".$row['year'].") "."</a></div></div>".
		"</div>";
	}
?>
</div>
<div class="row">
<h2>Oldest First</h2>
<?php
	$result=$conn->query("SELECT * FROM titles join titless on titles.id = titless.id join posters on titles.id = posters.id ORDER BY year ASC LIMIT 6");
	while($row=$result->fetch_assoc()){
		echo "<div class=columns>".
		"<a href=\"movie.php?id=".$row['id']."\"><img src=".$row['poster'].">".
		"<div class=overlay><div class=otext>"."<a href=\"movie.php?id=".$row['id']."\">".$row['title']." (".$row['year'].") "."</a></div></div>".
		"</div>";
	}
?>
<!--<video width="320" height="240" controls>
  <source src="Yee.mkv"  >
  
Your browser does not support the video tag.
</video> 
<iframe width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe>
-->
<script>

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
   if (slideIndex > slides.length) {slideIndex = 1}    
   slides[slideIndex-1].style.display = "block";  
   setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

</body>
</html> 
