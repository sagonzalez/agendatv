<?php
    session_start();
    if(!isset($_SESSION['_id'])){
        header('Location: index.php');
    }
    $_SESSION['page'] = "what_to_see";
    include "php/screen.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AgendaTV</title>

    <?php
        include "php/import_files.php";
        if(isset($_COOKIE['theme'])){
            echo css($_COOKIE['theme']);
        }else{
            echo css("bg1");    //theme 1
        }
    
        if($_SESSION['screen_width'] > 800){
            echo cssMenuChidori();   
        }
        echo cssCarousel();
    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php
        include "php/help.php";
        include "php/views.php";
        
        if($_SESSION['screen_width'] > 800){
           $active = array("","","","active","");
            switch ($_SESSION['page']) {
                case 'agendatv':
                    if($_SESSION['type'] == "SERIE"){
                        $active = array("active","","","","");
                    }else{
                        $active = array("","active","","","");
                    }
                    break;
                case 'movie':
                    $active = array("","","active","","");
                    break;
                case 'settings':
                    $active = array("","","","","active");
                    break;
            }
            echo getNav2($_SESSION["username"],$active); //print the nav bar
        }else{
            echo getNav($_SESSION["username"]); //print the nav bar
        }
        $_SESSION['get'] = $_GET['show'];
    ?>
    

    <!-- Page Content -->
    <div class="container">
        <div class="row col-lg-12">
            <div class="owl-carousel owl-theme">
                <?= carouselWhatToSee(recommendShow($_GET['show'])); ?>
            </div>
                
        </div>
    </div>
    
    <div class="container">
        <hr>
        <?= getFooter(); ?> <!-- Footer -->
    </div>
        
    <?php
        echo js();
        echo jsCarousel();    

        if(isset($_GET['name'])){
            echo notify("<strong> ".$_GET['name']." </strong> has been added to your list.","info",6000);
        }
    ?>
</body>

</html>
