<?php
    session_start();
    if(!isset($_SESSION['_id'])){
        header('Location: index.php');
    }
    $_SESSION['page'] = "settings";
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
                $arr = array("active","","","");
                $val = 1;
                if(isset($_GET['setting'])){
                   switch ($_GET['setting']) {
                       case 2:
                            $val = 2;
                           $arr = array("","active","","");
                           break;
                       case 3:
                           $val = 3;
                           $arr = array("","","active","");
                           break;
                        case 4:
                            $val = 4;
                            $arr = array("","","","active");
                   }//switch
                }
                echo getMenuSettings($arr); 
            ?> 

            <div id="content-right" class="col-md-9"> <!--all section of data-->
                <div class="well">
                    <?php
                        switch ($val) {
                            case 1:
                                echo getUser(editUser($_SESSION['_id']));
                                break;
                            case 2:
                                echo getTheme();
                                break;
                            case 3:
                                echo getExport();
                                break;
                            case 4:
                                echo getDeleteUser($_SESSION['_id']);
                        }
                    ?>
                    <hr>
                    <?php
                        if(isset($_GET['msg'])){
                            $text = "";
                            switch ($_GET['msg']) {
                                case 1:
                                   $text = "";
                                    break;
                                case 2:
                                    $text = "The <strong>username</strong> must contain only <strong>letters and numbers</strong> and have <strong>[6-45] characters.</strong>";
                                    break;
                                case 3:
                                    $text = "The <strong>username already exist</strong> try with another.";
                                    break;
                                case 4:
                                    $text = "The <strong>email</strong> is invalid";
                                    break;
                                case 5:
                                    $text = "<strong>Password incorrect</strong>";
                            }//switch
                            echo alert("danger",$text," col-lg-6 pull-left");
                        }
                    ?>
                </div>

        </div> <!-- row -->

    </div>
    <!-- /.container -->

    <div class="container">
        <hr>
        <?= getFooter(); ?> <!-- Footer -->
    </div>
        
    <?php
        echo js();
    ?>
</body>

</html>
