<?php
	session_start();
	if(!isset($_GET['extra'])){
		header('Location: ../'.$_SESSION['page'].'.php?search='.$_POST['show']);
		exit();
	}
	header('Location: ../'.$_SESSION['page'].'.php?search='.$_POST['show'].'&get='.$_SESSION['get']);
?>