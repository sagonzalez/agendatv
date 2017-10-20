<?php
	// Inialize session
	session_start();
	
	include "help.php";
	// $sql = "";

	$sql = "SELECT cod_activation FROM user WHERE id = ".$_SESSION["_id"];
	$row = getRow($sql);
	if($row[0] == $_POST["cod"]){
		//query for update
		$sql = "UPDATE user SET status = 1 WHERE id = ".$_SESSION["_id"];
		if (executeQuery($sql)) {
			$_SESSION['status'] = 1;	//update the var session status
		    header('Location: ../agendatv.php');
		}
	}else{
		//the cod is incorrect
		header('Location: ../agendatv.php?invalid=1');
	}
?>