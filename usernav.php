<HTML>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

/*body{
  font-family:Calibri;
  background: url("background.jpg");
  background-size:fill;
}*/
body{
	background-color:#000816;
	letter-spacing: 2px;
	width:100%;
  margin:0px;
  margin-top:50px;
  padding:0px;
}
body {font-family: Calibri, sans-serif;}

.top{
	position:fixed;
	width:100%;
	top:0px;
  padding:0px;
	margin:0px;
	z-index:2;
	background-color:rgba(20,20,20,0.8);
	//border:solid 2px black;
	overflow:hidden;
	color:white;
	
}
.dropdown {
  position:fixed;
  overflow: hidden;
  margin:0px;
  padding:0px;
  background-color: inherit;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 20px;
  border: none;
  margin:0;
  padding:0;
 //border-left:solid black 2px;
  //outline: none;
  color: white;
 background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones 
  */margin-top: 0;  /*Important for vertical align on mobile phones*/ 
	

}

.dropdown-content {
    display: none;
    position: static;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 3;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: white;
  padding:0px;
  margin:0px;
  text-decoration: none;
  display: block;
  text-align: left;
  background-color: inherit;
  
  /*border:solid black 2px;*/
	

}
/*
Add a grey background color to dropdown links on hover*/ 
.dropdown-content a:hover {
  background-color: transparent;
   // border:solid black 2px;
}
.dropdown:hover {background-color: rgba(0,0,0,1);}

/* Show the dropdown menu on hover 
*/.dropdown:hover .dropdown-content {
  background-color: transparent;
  display:ruby-text-container;
   // border:solid black 2px;
  margin:0;
}

.top h1{
	font-size:40px;
	letter-spacing: 0px;
	margin:0px;
	padding-right:0px;
	float:left;
	//border-right:solid black 2px;
	color:red;
	position:relative;

}

.top h1 a{
	text-decoration:none;
	font-size:40px;
	letter-spacing: 0px;
	margin:0px;
  padding:0px;
	padding-right:0px;
	float:left;
	//border-right:solid black 2px;
	color:red;
  position:relative;
	

}
.toptext{
	position:relative;
  top:0px;
  margin:0;
	padding:0;
  float:right;
	/*//border:solid 2px black;
	//float:right;
	//margin-right:10px;
	//margin-top:10px;
	*/

}
.top .search-container {
  position:fixed;
  right:150px;
  padding:0;
  margin:0px;
   // border:solid black 2px;
	

}

.top input[type=text] {
  font-size: 20px;
  padding: 1px;
  border: none;
  margin-top:10px;
	

}

.top .search-container button {
  float: right;
  margin-top:10px;
  background: #ddd;
  font-size:15px;
  border: none;
  padding:5px;
  cursor: pointer;
	

 }

.top .search-container button:hover {
  background: #ccc;
  //  border:solid black 2px;
}
.top a{
	//margin:20px;
		//margin-left:20px;
	
	
	font-size:20px;

}
</style>
</head>
<body>
<div class=top>
<div class=toptext> 
<?php	
	session_start();
	if(isset($_SESSION['unam'])){
	echo "<div class=dropdown style="."\"right:10\"".">
			<button class=dropbtn>".$_SESSION['unam'].
    		"</button>
    		<div class=dropdown-content>
      		<a href=\"mylist.php\">My List</a>
      		<a href=\"userEdit.php\">Edit info	</a>
      		<a href=\"logout.php\">Logout</a>
			</div>
 		 	</div>";
  }
	else{
		header("Location: login.php");
	}
?>


 <div class="dropdown" style="left:400px">
    <button class="dropbtn">Browse
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="atoz.php">A to Z</a>
      <a href="genre.php">Genre	</a>
	</div>

  </div>
</div>
  <h1><a href="userHome.php">WEBSITE NAME HERE</a> </h1>

<div class="search-container" style="float:right">
    <form action="search.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" ><i class="fa fa-search"></i></button>
    </form>
 </div>
</div>

</body>
</html>


