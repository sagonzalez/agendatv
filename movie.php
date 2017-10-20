<?php
    session_start();
    if(!isset($_SESSION['_id'])){
        header('Location: index.php');
    }
    $_SESSION['page'] = "movie";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AgendaTV</title>

    <?php
        //css import
        include "php/import_files.php";
        if(isset($_COOKIE['theme'])){
            echo css($_COOKIE['theme']);
        }else{
            echo css("bg1");
        }
        echo cssCarousel();

        if($_SESSION['screen_width'] > 800){
            echo cssMenuChidori();   
        }
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
            <div class="col-md-12"> <!--all section of data-->
                <div class="well">
                    <div class="row">
                        <div class="col-md-9">
                            <form method="post" action="php/search.php">   
                                <input type="text" name="show" class="form-control" placeholder="Search by Title">
                                <br>
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Find my movie</button>
                                <!-- <br> -->
                                <a class="btn btn-success" data-toggle="modal" data-target="#modalMovie"><span class="glyphicon glyphicon-plus" ></span> Movie</a>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <!-- <img class="img-responsive pull-right" src="img/icon.png"> -->
                        </div>
                    </div>
                    <hr>
                </div>
            </div> <!-- col-md-12 -->
        </div> <!-- row -->
            
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="alert alert-info text-center">
                        <h2><strong>Movies for Watch</strong></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="owl-carousel owl-theme">
                <?= carouselMovie1(resultMovies(0))?>
            </div>
            <br>
            <br>
        </div>
        
        <div class="row col-lg-12">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="alert alert-success text-center">
                    <h2><strong>Movies Finished</strong></h2>
                </div>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="owl-carousel owl-theme">
                <?= carouselMovie2(resultMovies(1))?>
            </div>
            <br>
            <br>
            <br>
        </div>
            
    <!-- <?= getFooter(); ?> --> 

    <?php
        if(isset($_GET['detail'])){
            echo detailMovie(getDetailMovie($_SESSION['_id'],$_GET['detail']));
        }
    ?>

    <?= getModalMovie(); ?>
        

    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <?php
       
        if(isset($_GET['delete'])){
            $data = getInfoDeleteMovie($_GET['delete'],$_SESSION['_id']);
            echo getModalDelete($data);
            echo "
            <script type='text/javascript'>
                $('#modalDelete').modal('show');
            </script>"; 
        }
        else if(isset($_GET['edit'])){
            $row = getInfoEditMovie($_SESSION['_id'],$_GET['edit']);
            echo getEditMovie($row);
            echo "
            <script type='text/javascript'>
                $('#modalMovieEdit').modal('show');
            </script>"; 
        }
        else if(isset($_GET['finish'])){
            $row = getInfoFinishMovie($_SESSION['_id'],$_GET['finish']);
            echo getModalFinish($row);
            echo "
            <script type='text/javascript'>
                $('#modalFinish').modal('show');
            </script>";
        }
        else if(isset($_GET['move'])){
            $row = getInfoDeleteMovie($_GET['move'],$_SESSION['_id']);
            echo getModalMove($row);
            echo "
            <script type='text/javascript'>
                $('#modalMove').modal('show');
            </script>";
        }else{
             echo jsCarousel();
        }
    ?>
</body>

</html>
