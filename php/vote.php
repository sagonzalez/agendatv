<?php
	session_start();
	include "help.php";

	$row = countVote($_POST['show']);
	if (isset($_POST['like'])) {
		$vote = filterVote($row[0])+1;
		setLike($_POST['show'],$vote);
	}else{
		$vote = filterVote($row[1])+1;
		setDislike($_POST['show'],$vote);
	}
	header('Location: ../vote.php?get='.$_SESSION['get']);
	exit();
?>