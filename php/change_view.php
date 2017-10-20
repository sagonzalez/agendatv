<?php
	session_start();

	if($_GET['mode'] == "detail"){
		setcookie("see_mode","detail", time()+(60*60*24*30),"/");
	}else{
		setcookie("see_mode","carousel", time()+(60*60*24*30),"/");
	}
	header('Location: ../'.$_SESSION['page'].".php#carousel");
	exit();
?>