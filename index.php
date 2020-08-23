<!-- LOGIN-->
<?php 
	session_start();
?>
<HTML>
<head>
<title>LOGIN</title>
<style>
.error{
	color:red;
}
form{
	background-color:white;
	width:20%;
	margin :0 auto;
	padding:20;
	border-radius: 5px;
	border:none;
	font-size:20px;
}
input{
		width:80%;
		height:50px;
		background-color:#b7b9bc;
		//border:solid black 2px;
		font-size:20
			border-radius: 5px;
	border:none;
		font-size:20px;

}

button{
		width:100%;
		height:50px;
		//border:solid black 2px;
		background-color: red;
		width:100%;
		cursor:pointer;
		font-size:20;
			border-radius: 5px;
	border:none;
}
button:hover{
	opacity:0.8;

}
img{
	width:20%;
	float:left;
}
#unam{
	float:right;
}
#pass{
	float:right;
}
body{
	font-family:Calibri;
	background: url("background.jpg");
	background-size:fill;
}
</style>
</head>
<!--Login back -->
<?php
	$unamErr=$pswErr=$loginErr="<br>";
	$flag=0;
	$conn=new mysqli("localhost","root","","anotherone");
	$result=$conn->query("SELECT * FROM login");
		if(empty($_POST["unam"])){
			$unamErr ="Username is empty";
		}
		else{
			$unam=$_POST["unam"];
			$flag++;
			$_SESSION["unam"]=$unam;
		}
		if(empty($_POST["psw"])){
			$pswErr="Password is empty";
		}
		else{
			$psw=$_POST["psw"];
			$flag++;
		}
		if($flag==2){
			while($row=$result->fetch_assoc()){
				if($row["uname"]==$unam && $row["pass"] == $psw){
					$flag++;
					echo "Correct";
					header("Location: gateway.php");
				}
			}
		}
		if($flag==2){
			$loginErr= "The username password combination doesnt exist<br>";
		}
?>

<body>
<div class="container">
<form name='login' method='post' action="">
<h1>Sign In </h1>
<br><span class=error><?php echo $loginErr; ?></span><br>
<img src= "usericon.png">
<input type = "text" name='unam' placeholder="Username" id='unam'><br><span class=error><?php echo $unamErr; ?></span><br><br>
<img src="passwordicon.png">
<input type = "password" name='psw' placeholder="Password" id="pass"><br><span class=error><?php echo $pswErr; ?></span><br><br>
<button type="submit" name=Submit value="login">Login
</button>
Not a member ? <a href="signup.php">Sign Up </a>
</form>
</div>
</body>
</html>
