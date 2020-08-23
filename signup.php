<!-- SIGNUP -->
<HTML>
<head>
<title>SIGNUP</title>
<style>
.error{
	color:red;
}
form{
	background-color:white;
	width:40%;
	margin :0 auto;
	padding:20;
	border:none;
	border-radius:5px;
	font-size:20px;
}
input{
		width:100%;
		height:50px;
		background-color:#b7b9bc;
		border:none;
		font-size:20px;

}
button{
		width:100%;
		height:50px;
		border:none;
		background-color: red;
		width:100%;
		cursor:pointer;
		font-size:20;
			border-radius:5px;

}
button:hover{
	opacity:0.8;

}
img{
	height:50;
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
	background:url("background.jpg");
}
</style>
</head>
<?php 
$conn=new mysqli("localhost","root","","anotherone");
	$name=$age=$email=$unam=$psw=$cpsw="";
	$nameErr = $ageErr = $emailErr = $unamErr = $pswErr=$cpswErr= "";
	$msg="<a href=\"login.php\"> Login </a>";
	//$_POST["name"]=$_POST["age"]=$_POST["email"]=$_POST["unam"]=$_POST["psw"]=$_POST["cpsw"]="";
	$flag=$uflag=0;
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(empty($_POST["name"])){
			$nameErr="Please fill out name";
		}
		else{
		    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) 
				$nameErr="Only letters and whitespaces allowed in name";
			else{
				$nameErr="";
				$name=$_POST["name"];
				$flag++;
			}
		}
		if(empty($_POST["age"])){
			$ageErr="Enter Age";
		}
		else{
			if(!preg_match("/^[0-9]*$/",$_POST["age"]))
				$ageErr="Enter proper age";
			else{
				$ageErr="";
				$age=$_POST["age"];
				$flag++;
			}
		}
		if(empty($_POST["email"])){
			$emailErr="Enter Email";
		}
		else{
		    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
				$emailErr="Invalid email format";
			else{
				$emailErr="";
				$email=$_POST["email"];
				$flag++;
			}
		}
		if(empty($_POST["unam"]))
			$unamErr="Enter Username";
		else{
			
			$result=$conn->query("SELECT * FROM login");
			while($row=$result->fetch_assoc()){
				if($row["uname"]==$_POST["unam"]){
					$unamErr="Username already exists !";
					$uflag=1;
					break;
				}
			}
			if($uflag==0){
				$unamErr="";
				$unam=$_POST["unam"];
				$flag++;
			}
			
		}
		if(empty($_POST["psw"])){
			$pswErr="Enter Password";
		}
		else
			$pswErr="";
		if(empty($_POST["cpsw"])){
			$cpswErr="Enter Confirm Password";
		}
		else{
			if($_POST["cpsw"]!=$_POST["psw"]){
				$cpswErr="The passwords do not match";
			}
			else{
				$cpswErr="";
				$psw=$_POST["cpsw"];
				$flag++;			
			}
		}

		echo $flag;
		if($flag==5){
			echo "INSIDE IF";
			echo $name,$age,$email,$unam,$psw;
			$conn->query("INSERT into login(name,age,email,uname,pass) VALUES ('$name','$age','$email','$unam','$psw')");
			echo mysqli_error($conn);
			$msg= "Account Created Successfully ... <a href = \"login.php\"> Login </a> Again ";
		}
	}
?>
<form method="post">
<h1> Sign Up</h1>
<input type="text" name = "name" placeholder="Name" value=<?php echo $name; ?>>
<span class="error"><?php echo $nameErr; ?><br><br></span>
<input type="text" name="age" placeholder="Age" value=<?php echo $age; ?>>
<span class="error"><?php echo $ageErr; ?><br><br></span>
<input type="text" name="email" placeholder="E-Mail" value=<?php echo $email; ?>>
<span class="error"><?php echo $emailErr; ?><br><br></span>
<input type="text" name="unam" placeholder="Username" value=<?php echo $unam; ?>>
<span class="error"><?php echo $unamErr; ?><br><br></span>
<input type="Password" name ="psw" placeholder="Password" value=<?php echo $psw; ?>>
<span class="error"><?php echo $pswErr; ?><br><br></span>
<input type = "password" name ="cpsw" placeholder="Confirm Password" value=<?php echo $cpsw; ?>>
<span class="error"><?php echo $cpswErr; ?><br><br></span>
<button type="Submit">Sign Up</button>

<?php echo $msg ?>
</form>