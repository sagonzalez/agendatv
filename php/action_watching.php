<?php
	session_start();
	
	if(isset($_POST['see_show'])){
		header('Location: ../agendatv.php?id_show='.$_POST['id_show']);
	}
	if(isset($_POST['delete_show'])){
		header('Location: ../agendatv.php?delete='.$_POST['id_show']);
	}
?>