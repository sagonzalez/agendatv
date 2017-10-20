<?php
	function css($id){
		// <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400">
		return '
		<!-- Bootstrap Core CSS -->
	    <link href="css/bootstrap.css" rel="stylesheet">
	    <!-- Custom CSS -->
	    <link href="css/shop-item.css" rel="stylesheet">
	    <!-- app style -->
	    <link href="css/app.css" rel="stylesheet">
	    <!-- background -->'.getCssId($id).'

	    <!--fonst and  icons-->
	    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	    <!--favicon-->
	    <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
		';
	}
	function cssIndex($id){
		return '
			<!-- Bootstrap Core CSS -->
		    <link href="css/bootstrap.css" rel="stylesheet">
		    <!--fonst and  icons-->
		    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		    <!-- login style -->
		    <link rel="stylesheet" type="text/css" href="css/login.css">
		    <!-- background -->'.getCssId($id).'
		    <!--favicon-->
		    <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
		';
	}
	function cssCarousel(){
		return '
			<!--carousel--> 
			<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
    		<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
		';
	}
	function cssMenuChidori(){
		return '<!-- menu 2 -->
	    <link href="css/menu.css" rel="stylesheet">';
	}
	function js(){
		return '
			<!-- jQuery -->
		    <script type="text/javascript" src="js/jquery.js"></script>
		    <!-- Bootstrap Core JavaScript -->
		    <script type="text/javascript" src="js/bootstrap.min.js"></script>
		    <!--notify-->
		    <script src="js/bootstrap-notify.min.js"></script>';
	}
	function jsChangeImg(){
		return '<script type="text/javascript" src="js/change_img.js"></script>';
	}
	function jsIndex(){
		return '
			<!-- jQuery -->
		    <script type="text/javascript" src="js/jquery.js"></script>
		    <!-- Bootstrap Core JavaScript -->
		    <script type="text/javascript" src="js/bootstrap.min.js"></script>
		';
	}
	function jsCarousel(){
		return '
			<!--js carousel-->
    		<script src="js/owl.carousel.min.js"></script>
			<script src="js/jquery.mousewheel.min.js"></script>
    		<script src="js/start_carousel.js"></script>
		';
	}
	function getCssId($id){
		switch ($id) {
			case "bg1":
				return '<link href="css/background/bg1.css" rel="stylesheet">';
			case "bg2":
				return '<link href="css/background/bg2.css" rel="stylesheet">';
			case "bg3":
				return '<link href="css/background/bg3.css" rel="stylesheet">';
			case "bg4":
				return '<link href="css/background/bg4.css" rel="stylesheet">';
			case "bg5":
				return '<link href="css/background/bg5.css" rel="stylesheet">';
			case "bg6":
				return '<link href="css/background/bg6.css" rel="stylesheet">';
		}
	}

?>