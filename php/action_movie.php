<?php
	if(isset($_POST['edit'])){
		header('Location: ../movie.php?edit='.$_POST['id_movie']);
	}
	if(isset($_POST['finish'])){
		header('Location: ../movie.php?finish='.$_POST['id_movie']);
	}
	if(isset($_POST['delete'])){
		header('Location: ../movie.php?delete='.$_POST['id_movie']);
	}
	if(isset($_POST['move_show'])){
		header('Location: ../movie.php?move='.$_POST['id_movie']);
	}
	if(isset($_POST['detail'])){
		header('Location: ../movie.php?detail='.$_POST['id_movie'].'#movie_detail');
	}
?>