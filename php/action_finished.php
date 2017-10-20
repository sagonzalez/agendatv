<?php
	if(isset($_POST['delete_show'])){
		header('Location: ../finished.php?delete='.$_POST['id_show']);
	}
	if (isset($_POST['move_show'])) {
		header('Location: ../finished.php?move='.$_POST['id_show']);
	}

?>