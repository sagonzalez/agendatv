<?php
	session_start();
	if(isset($_POST['close'])){
		header("Location: ../".$_SESSION['page'].".php");
		exit();
	}
	
	include "help.php";

	if($_SESSION['page'] != "movie"){
		if(deleteFK($_SESSION['_id'],$_POST['id_show'],"detail_user_show","shows")){
			header("Location: ../".$_SESSION['page'].".php");
		}else{
			echo "Something goes wrong. Try again";
		}
	}else{
		//delete movie
		if(deleteFK($_SESSION['_id'],$_POST['id_show'],"detail_user_movie","movie")){
			header("Location: ../".$_SESSION['page'].".php");
		}else{
			echo "Something goes wrong. Try again";
		}
	}
	
	
?>