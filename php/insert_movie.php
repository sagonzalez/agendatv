<?php
	session_start();
	include "help.php";

	$id_user = $_SESSION["_id"];
	$name = filterString($_POST["name"]);
	$priority = getPriority($_POST["priority"]);
	$url = filterString($_POST["url_img"]);
	
	//empty field return tu home (agendatv.php)
	if(empty($name) || empty($priority) || empty($url)) {
		header('Location: ../movie.php');
	}

	if(insert_movie($id_user,$name,$priority,$url)){
		header('Location: ../movie.php');
	}
?>