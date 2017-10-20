<?php
	session_start();

	$_SESSION['type'] = "SERIE";
	header('Location: ../agendatv.php');
?>