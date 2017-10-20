<?php
	session_start();
	include "help.php";

	if(isset($_POST['edit'])){
		header('Location: ../for_watch.php?edit='.$_POST['id_show']);
	}
	
	if (isset($_POST['start_to_see'])) {
		if(updateState($_POST['id_show'],0,$_SESSION['_id'],"shows","detail_user_show")){
			 header('Location: ../agendatv.php?id_show='.$_POST['id_show']);
		}
	}

	if(isset($_POST['delete_show'])){
		header('Location: ../for_watch.php?delete='.$_POST['id_show']);
	}
	

?>