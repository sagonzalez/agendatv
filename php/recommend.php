<?php
	session_start();
	include "help.php";

	if($_GET['option'] == "account"){
		//we need name,img,comment,type
		$tbl1 = "";
		$tbl2 = "";
		$aux = false;
		if($_SESSION['get']=="movie"){
			$tbl1="movie";
			$tbl2="detail_user_movie";
		}else{
			$tbl1="shows";
			$tbl2="detail_user_show";
			$aux = true;
		}
		$row = infoRecommend($_SESSION['_id'],$_POST['show'],$aux);
		$row[3]=="" ? $row[3]="MOVIE" : $row[3]=$row[3];
		if(insert_recommend($row[0],$row[1],$row[2],$row[3])){
			if(updateRecommend($_SESSION['_id'],$_POST['show'],$tbl1,$tbl2)){
				header('Location: ../recommend.php?get='.$_SESSION['get']);
				exit();
			}
		}
	}else{
		//new
		$name = filterString($_POST["name"]);
		$img = filterString($_POST["img"]);
		$review = filterString($_POST["review"]);
		$type = $_POST["type"];
		//empty field return tu home (agendatv.php)
		if(empty($name) || empty($img)) {
			header('Location: ../recommend.php?option=2&msg=3');	//empty fields
			exit();
		}

		if(insert_recommend($name,$img,$review,$type)){
			header('Location: ../recommend.php?option=2&msg=1');	//insert complete
			exit();
		}
		header('Location: ../recommend.php?option=2&msg=2'); //insert failed
		exit();
	}
?>