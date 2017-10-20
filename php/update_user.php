<?php
	session_start();
	include "help.php";

	if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['pass'])){
		//empty fields
		header('Location  ../settings.php?user_data='.$_SESSION['_id']."&msg=1");
	}else{
		if(regex($_POST['username'])){
			if(exitsUsername($_POST['username'])){
				if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
					//update
					if(updateUser($_SESSION['_id'],$_POST['username'],$_POST['email'],$_POST['pass'])){
						header('Location: ../settings.php?user_data='.$_SESSION['_id']);
					}else{
						//password wrong
						header('Location: ../settings.php?user_data='.$_SESSION['_id']."&msg=5");
					}
				}else{
					//wrong email
					header('Location: ../settings.php?user_data='.$_SESSION['_id']."&msg=4");
				}
			}else{
				//the username already exits
				header('Location: ../settings.php?user_data='.$_SESSION['_id'].'&msg=3');
			}
			
		}else{
			//the username is not fit the regex
			header('Location: ../settings.php?user_data='.$_SESSION['_id'].'&msg=2');
		}
	}

	
?>