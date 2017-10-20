<?php
	include "help.php";
	
	$usr = $_POST['username'];
	$email = $_POST['email'];
	$pass = filterString($_POST['pass']);

	if(empty($usr) || empty($email) || empty($pass)){
		echo "<script type='text/javascript'>alert('Empty field(s)');</script>";
		header('Location: ../index.php');
	}else{
		if(regex($usr)==true){
			if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				register($usr,$email,$pass);
			}else{
				header('Location: ../index.php?email_fail='.$email."&usr=".$usr);
			}
		}else{
			header('Location: ../index.php?usr_fail='.$usr.'&email='.$email);
		}
		
	}

	function register($usr,$email,$pass){
		$cod = getCodeActivation();
		if(insert_user($usr,$email,$pass,$cod)){
			$msg = "Hi <strong>".$usr."</strong> we hope you be well. Here's your code for activated your account: <strong>".$cod ."</strong> Enjoy! =)";
			if(sendEmail($email,"AgendaTv: Verification code",$msg)){
				header('Location: ../index.php?register=1');
			}else{
				header('Location: ../index.php?send_email_fail=1');
			}
		}else{
			header('Location: ../index.php?usr_exist='.$usr.'&email='.$email);
		}
	}
?>