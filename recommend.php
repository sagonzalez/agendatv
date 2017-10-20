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
                $val = 1;
                $arr = array("active","");
                if(isset($_GET['option'])){
                    $val = 2;
                    $arr = array("","active");
                }
                echo getMenuRecommend($arr); 

            ?> 

            <div id="content-right" class="col-md-9"> <!--all section of data-->
                <?php
                    switch ($val) {
                        case 1:
                            $result = recommendResult1("SERIE",2);
                            $_SESSION['get'] = "serie";
                            if(isset($_GET['get'])){
                                switch ($_GET['get']) {
                                    case "serie":
                                        $result = recommendResult1("SERIE",2);
                                        $_SESSION['get'] = "serie";
                                        break;
                                    case "anime":
                                        $_SESSION['get'] = "anime";
                                        $result = recommendResult1("ANIME",2);
                                        break;
                                    case "movie":
                                        $_SESSION['get'] = "movie";
                                        $result = recommendResult2(1);  
                                }
                            }
                            echo recommendShow1($result);
                            break;
                        case 2:
                            echo recommendShow2();
                            break;
                    }
                
                    if(isset($_GET['msg'])){
                        switch ($_GET['msg']) {
                            case 1:
                                echo alert("info","<h3><strong>Thank you for your feedback <i class='fa fa-handshake-o' aria-hidden='true'></i></strong></h3>"," col-md-6 pull-left");
                                break;
                            case 2:
                                echo alert("danger","<h3><strong>We can do it. Please try again later. <i class='fa fa-frown-o' aria-hidden='true'></i></strong></h3>"," col-md-6 pull-left");
                                break;
                            case 3:
                                echo alert("warning","<h3><strong>Empty fields <i class='fa fa-arrow-circle-up' aria-hidden='true'></i></strong></h3>"," col-md-6 pull-left");
                        }
                    }

                ?>
        </div> <!-- content-right -->

    </div> <!-- row -->
    <!-- <?= getFooter(); ?> -->         
    <?php
        echo js();
    ?>
</body>

</html>
