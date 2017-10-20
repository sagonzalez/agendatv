<?php
	session_start();
	include "help.php";

	if(isset($_POST['change_img'])){
		if(!empty($_POST['url'])){
			if(updateImg($_SESSION['_id'],$_POST['id_show'],$_POST['url'],"shows","detail_user_show")){
				header('Location: ../agendatv.php?id_show='.$_POST['id_show']);
			}
		}else{
			header('Location: ../agendatv.php');
		}
	}else{
		$id_user = $_SESSION['_id'];
		$id_show = $_POST['id_show'];
		$season = $_POST['season'];
		$episode = $_POST['episode'];
		
		$check = isset($_POST['check']) ? $_POST['check'] : "";
		
		if(updateChapter($id_user,$id_show,$season,$episode,getFec())){
			header('Location: ../agendatv.php?id_show='.$id_show);
		}
		if(!empty($check)){	//send to finish
			header('Location: ../agendatv.php?finish='.$id_show);
		}
	}
	
?>