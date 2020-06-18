<?php
	@session_start();
	if(isset($_SESSION['user']))
	{
		unset($_SESSION['user']);
		unset($_SESSION['uloga']);
		
		
		session_destroy();
		header('Location: index.php');
	}
	else{
		header('Location:index.php');
	}
?>