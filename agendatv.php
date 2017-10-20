<?php
    session_start();
    if(!isset($_SESSION['_id'])){
        header('Location: index.php');
    }
     $_SESSION['page'] = "agendatv";
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
        //print css import
        include "php/import_files.php";
        if(isset($_COOKIE['theme'])){
            echo css($_COOKIE['theme']);
        }else{
            echo css("bg1");    //theme 1
        }
        if(isset($_COOKIE['see_mode'])){
            if($_COOKIE['see_mode'] == "carousel"){
                echo cssCarousel();
            }
        }
    
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
            <?php
                $count = array(countShow($_SESSION['_id'],0,$_SESSION['type']),countShow($_SESSION['_id'],1,$_SESSION['type']),countShow($_SESSION['_id'],2,$_SESSION['type']));
                $active = array("active","","");
                switch ($_SESSION['page']) {
                    case "for_watch":
                        $active = array("","active","");
                        break;
                    case "finished":
                        $active = array("","","active");
                }
                echo getMenuShow($_SESSION['status'],$active,$count); 
             ?> 

            <div id="content-right" class="col-md-9"> <!--all section of data-->

                <?php
                    if(isset($_GET['id_show']) || isset($_GET['search'])){
                        if(isset($_GET['id_show'])){
                            settype($_GET['id_show'], "integer");
                            echo getWatching1($_GET['id_show']);
                        }
                        if(isset($_GET['search'])){
                            settype($_GET['id_show'], "string");
                            echo getWatching1($_GET['search']);
                        }
                    }
                    else{
                        settype($_GET['id_show'], "integer");
                        echo getWatching1(-1); //print all
                    }

                ?>
                <div class="well">
                    <div class="row">
                        <form method="post" action="php/search.php">
                            <div class="col-md-9">
                                <input type="text" name="show" class="form-control" placeholder="Search by Title">
                                <br>
                                <label><span title="Last view" class="glyphicon glyphicon-eye-open"></span> View shows: </label>
                                <br>
                                <?= buttonChange() ?>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary"><span  class="glyphicon glyphicon-search"></span> Find my show</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                </div>
             </div> <!-- content right -->
        </div> <!-- row -->

        <?php
            function detail_mode(){
                echo '<div class="row ">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-9">
                                <div class="well">';
                echo getWatching2(resultWatching());
                echo '</div>';  //well
                echo '</div>';  //col-md-9
                echo '</div>';  //col-md-12
                echo '</div>';  //row
            }
            if(isset($_COOKIE['see_mode'])){
                switch ($_COOKIE['see_mode']) {
                    case 'detail':
                        detail_mode();
                        break;
                    case 'carousel':
                        echo '
                            <div class="container" id="carousel">
                            <div class="row col-lg-12">
                                <div class="owl-carousel owl-theme">';
                                    echo carouselWatching(resultWatching());
                        echo '
                                </div>
                            </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                        ';
                        break;
                }
            }else{
                //detail mode
                detail_mode(); //as default
            }
        
            if(isset($_COOKIE['see_mode'])){
                    if($_COOKIE['see_mode'] == "detail"){
                        echo getFooter();                  
                    } 
            }else{
                echo getFooter();
            }

        ?>

    <?= getModal(); ?>
        
    <?php
        echo js();
        // if($_SESSION['screen_width'] > 800){
        //     // echo jsMenuChidori();
        // }
        echo jsChangeImg();
        if(isset($_COOKIE['see_mode']) && isset($_GET['delete'])==false && isset($_GET['finish'])==false){
            // 
            if($_COOKIE['see_mode'] == "carousel"){
                echo jsCarousel();
            }
        }

        if(isset($_GET['delete'])){
            $data = getInfoDelete($_GET['delete'],$_SESSION['_id']);
            echo getModalDelete($data);
            echo "
            <script type='text/javascript'>
                $('#modalDelete').modal('show');
            </script>"; 
        }

        if(isset($_GET['finish'])){
            $row = getInfoFinish($_SESSION['_id'],$_GET['finish']);
            echo getModalFinish($row);
             echo "
            <script type='text/javascript'>
                $('#modalFinish').modal('show');
            </script>"; 
        }
    ?>
</body>

</html>
