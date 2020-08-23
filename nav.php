<html>
<style>
	h1{
		color:white;
		font-family:Arial;
		margin:0 auto;
		
		position:fixed;
		top:0px;
		background-color:#383838;
		font-size:50px;
	}
		body{
			background-color: #383838;
		}
		.navbar{
			margin:0px;
			background-color: black;
			position:fixed;
		}
	.navbar ul{
		margin:0;
		width:10%;
		//border:1px solid orange;
		padding:0px;
		//padding-top:0px;
		background-color:#585858;
		height:100%;
		position:fixed;
		top:70px;
		overflow:auto;	
		width:15%;
	}
	.navbar li a:hover{
		background-color: #383838;		
	}
	.navbar li{
		//height:50px;
		
		margin:0px;
		padding:0px;	
		font-family: "Arial";
		background-color:#585858;
		overflow:none;
		font-size:20px;
		font-color:white;
		border-top:orange 1px solid;
	}
	.navbar li:last-child{
		border-bottom:orange 1px solid;
	}
	.navbar li a{
		//height:50px;
		padding:8px;
		color:white;
		display:block;
		margin:0px;
		text-decoration:none;
		text-align:center;
	}

	</style>
</head>

<h1>PRIME FLIX</h1>
<div class="navbar">
<ul type="none">
<li><a href="login.php">Login</a></li>
<li><a href="adminHome.php">Home</a></li>
<li><a href="trynewMov.php">Add</a></li>
<li><a href="newview.php">View All</a></li>
</ul>
</div>

</html>