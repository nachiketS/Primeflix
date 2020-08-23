<?php
	$conn=new mysqli("localhost","root","","anotherone");
	$id=$_GET['id'];
	$conn->query("DELETE FROM actorjunction WHERE tid = '$id'");
	$conn->query("DELETE FROM titles WHERE tid ='$id'");
	header("Location:newview.php");

?>
<!-- <script>
	var r= confirm("?");
	if(r==true){
			<?php
						//header("Location:newview.php");
			
			?>
			}
	else{
		
	}
</script>
 -->