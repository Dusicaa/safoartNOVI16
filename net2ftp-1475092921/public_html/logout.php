<?php
@session_start();

if(isset($_SESSION['idUloge'])){
	
	
	unset($_SESSION['idUloge']);
	unset($_SESSION['username']);
	
	session_destroy();
	header("Location:index.php");
}
else{
	
	header("Location:index.php");
}

 ?>