<?php
    session_start();
    if(!isset($_SESSION['_id'])){
        header('Location: index.php');
    }
    $_SESSION['page'] = "recommend";
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
    ?>
    

    <!-- Page Content -->
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="owl-carousel owl-theme">
                    <?php 
                        $result;
                        switch ($_GET['get']) {
                            case 'serie':
                                $_SESSION['get'] = "serie";
                                $result = getRecommend("SERIE");
                                break;
                            case 'anime':
                                $_SESSION['get'] = "anime";
                                $result = getRecommend("ANIME");
                                break;
                            case 'movie':
                                $_SESSION['get'] = "movie";
                                $result = getRecommend("MOVIE");
                        }
                        echo carouselVote($result);
                    ?>
              </div>
          </div>  
        </div> <!-- row -->
    </div>
    <?= getFooter(); ?> 
    <?php
        echo js();
        echo jsCarousel();
    ?>
</body>

</html>
