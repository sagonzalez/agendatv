<?php
	session_start(); // Inialize session
	include "help.php";

	$username = filterString($_POST["username"]);
	$password = filterString($_POST["password"]);

	$result = login($username,$password);
	
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_row($result);	//get the first row of the virtual table
		$_SESSION["_id"] = $row[0];	//save the id in a session variable
		$_SESSION['status'] = $row[1];
		$_SESSION['username'] = $username;
		$_SESSION['type'] = "SERIE";
		$_SESSION['page'] = "agendatv";
		header('Location: ../agendatv.php');
	}else{
		header('Location: ../index.php?loginfail=1&user='.$username.'');	//send info for error
	}
?>