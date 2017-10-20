<?php
	session_start();
	if(isset($_POST['close'])){
		header('Location: ../'.$_SESSION['page'].'.php');
		exit();
	}
	include "help.php";
	
	$tbl1 = "";
	$tbl2 = "";
	if($_SESSION['page'] != "movie"){
		$tbl1 = "shows";
		$tbl2 = "detail_user_show";
	}else{
		$tbl1 = "movie";
		$tbl2 = "detail_user_movie";
	}
	if(updateState($_POST['id_show'], 0, $_SESSION['_id'],$tbl1,$tbl2)){
		header('Location: ../'.$_SESSION['page'].'.php?id_show='.$_POST['id_show']);
	}
	
?>