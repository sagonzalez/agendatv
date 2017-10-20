<?php
	session_start();
	include "help.php";
	$summary = "";

	$summary .= "*****************************************************<br />";
	$arr = getSeries($_SESSION['_id'],"SERIE",0);
	$summary .= "Series Watching [".$arr['number']."]<br /><br />";
	// $summary .= "*****************************************************<br />";
	$summary .= $arr['content'];

	$summary .= "*****************************************************<br />";
	$arr = getSeries($_SESSION['_id'],"ANIME",0);
	$summary .= "Anime Watching [".$arr['number']."]<br /><br />";
	// $summary .= "<br />*****************************************************<br />";
	$summary .= $arr['content'];
	
	$summary .= "*****************************************************<br />";
	$arr = getSeries($_SESSION['_id'],"SERIE",1);
	$summary .= "Series For Watch [".$arr['number']."]<br /><br />";
	// $summary .= "<br />*****************************************************<br />";
	$summary .= $arr['content'];

	$summary .= "*****************************************************<br />";
	$arr = getSeries($_SESSION['_id'],"ANIME",1);
	$summary .= "Anime For Watch [".$arr['number']."]<br /><br />";
	// $summary .= "<br />*****************************************************<br />";
	$summary .= $arr['content'];

	$summary .= "*****************************************************<br />";
	$arr = getSeries($_SESSION['_id'],"SERIE",2);
	$summary .= "Series Finished [".$arr['number']."]<br /><br />";
	// $summary .= "<br />*****************************************************<br />";
	$summary .= $arr['content'];

	$summary .= "*****************************************************<br />";
	$arr = getSeries($_SESSION['_id'],"ANIME",2);
	$summary .= "Anime Finished [".$arr['number']."]<br /><br />";
	// $summary .= "<br />*****************************************************<br />";
	$summary .= $arr['content'];

	$summary .= "*****************************************************<br />";
	$arr = getMovie($_SESSION['_id'],0);
	$summary .= "Movies For Watch [".$arr['number']."]<br /><br />";
	// $summary .= "<br />*****************************************************<br />";
	$summary .= $arr['content'];

	$summary .= "*****************************************************<br />";
	$arr = getMovie($_SESSION['_id'],1);
	$summary .= "Movies Finished [".$arr['number']."]<br /><br />";
	// $summary .= "<br />*****************************************************<br />";
	$summary .= $arr['content'];

	echo $summary;
?>