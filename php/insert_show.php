<?php
	session_start();
	include "help.php";

	$id = $_SESSION["_id"];
	$name = filterString($_POST["name"]);
	$priority = getPriority($_POST["priority"]);
	$url = filterString($_POST["url_img"]);
	$sinopsis = filterString($_POST["sinopsis"]);
	$type = $_POST["type"];

	//empty field return tu home (agendatv.php)
	if(empty($name) || empty($priority) || empty($url)) {
		header('Location: ../agendatv.php');
	}
	if($type == "S"){
		$type = "SERIE";
	}else{
		$type = "ANIME";
	}

	if(insert_show($name,$type,$priority,$url,$sinopsis,$id)){
		header('Location: ../for_watch.php');
	}
?>