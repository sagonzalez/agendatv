<?php
	session_start();

	$_SESSION['type'] = "ANIME";
	header('Location: ../agendatv.php');
?>