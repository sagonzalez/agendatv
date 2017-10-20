<?php
	session_start();

	if(isset($_GET['bg1'])){
		setcookie("theme", "bg1", time()+(60*60*24*30),"/");
	}
	if(isset($_GET['bg2'])){
		setcookie("theme", "bg2", time()+(60*60*24*30),"/");
	}
	if(isset($_GET['bg3'])){
		setcookie("theme", "bg3", time()+(60*60*24*30),"/");
	}
	if(isset($_GET['bg4'])){
		setcookie("theme", "bg4", time()+(60*60*24*30),"/");
	}
	if(isset($_GET['bg5'])){
		setcookie("theme", "bg5", time()+(60*60*24*30),"/");
	}
	if(isset($_GET['bg6'])){
		setcookie("theme", "bg6", time()+(60*60*24*30),"/");
	}
	
	header("Location: ../settings.php?theme=".$_SESSION['_id']); # this will reload your theme selector
	exit(); # this will make sure the cookie gets loaded next time.
?>