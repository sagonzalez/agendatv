<?php
	session_start();
	include "help.php";

	deleteUser($_SESSION['_id']);
	header('Location: ../index.php');
?>