<?php

	session_start();
	if(isset($_POST['close'])){
		header('Location: ../'.$_SESSION['page'].'.php');
		exit();
	}
	include "help.php";

	$name = filterString($_POST["name"]);
	$priority = getPriority($_POST["priority"]);
	$url = filterString($_POST["url_img"]);
	
	//empty field return to home (movie.php)
	if(empty($name) || empty($priority) || empty($url)) {
		header('Location: ../movie.php');
	}

	if(updateInfoMovie($_SESSION['_id'],$_POST['id_show'],$name,$priority,$url)){
		header("Refresh:0");
	}
?>