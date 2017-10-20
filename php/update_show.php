<?php
	session_start();
	include "help.php";

	$name = filterString($_POST["name"]);
	$priority = getPriority($_POST["priority"]);
	$type = $_POST["type"];
	$url = filterString($_POST["url_img"]);
	$sinopsis = filterString($_POST["sinopsis"]);

	//empty field return tu home (agendatv.php)
	if(empty($name) || empty($priority) || empty($url)) {
		header('Location: ../for_watch.php');
	}
	if($type == "S"){
		$type = "SERIE";
	}else{
		$type = "ANIME";
	}
	
	if(updateInfoShow($_POST['id_show'],$_SESSION['_id'],$name,$priority,$url,$type,$sinopsis)){
		header("Refresh:0");
	}
?>