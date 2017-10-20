<?php
	session_start();
	include "help.php";

	$row = getRecommendById($_POST['show']);
	if($row[0] == "MOVIE"){
		insert_movie($_SESSION['_id'],$row[1],3,$row[2]);
	}else{
		insert_show($row[1],$row[0],3,$row[2],"",$_SESSION['_id']);	//anime or serie as well
	}
	header('Location: ../what_to_see.php?show='.$_SESSION['get'].'&name='.$row[1]);
	exit();

?>