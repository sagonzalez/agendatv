<?php
	session_start();
	if(isset($_POST['close'])){
		header('Location: ../'.$_SESSION['page'].'.php');	
		exit();
	}
	include "help.php";

	$rat = getPriority($_POST['rating']);
	$comment = filterString($_POST['comment']);

	if($_SESSION['page'] != "movie"){
		if(finishShow($_SESSION['_id'],$_POST['id_show'],$rat,getFec(),$comment)){
			header('Location: ../finished.php');
		}
	}else{
		//finish movie
		if(finishMovie($_SESSION['_id'],$_POST['id_show'],$rat,$comment,getFec())){
			header('Location: ../movie.php');
		}
	}

?>