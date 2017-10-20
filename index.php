<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="sagonzalez">

	  <?php
      include "php/import_files.php";
      if(isset($_COOKIE['theme'])){
            echo cssIndex($_COOKIE['theme']);
        }else{
            echo cssIndex("bg1");    //theme 1
        }
    ?>

</head>
<body>
	<?php
		include "php/views.php";
    $type = "";
    $msg = "";
    $extra = "";
    
	?>
 	<div class="container">
      <form class="form-signin" action="php/login.php" method="post">
        <h2 class="form-signin-heading text-white">Login Access</h2>
        
        <div class="form-group has-feedback">

          <?php
          	if(isset($_GET['loginfail'])){	//show the username the he use
          		$prev_user = $_GET['user'];
          		echo'<input type="text" class="form-control" placeholder="Username" required name="username"
          			value="'.$prev_user.'">';
          	}else{
          		echo '<input type="text" class="form-control" placeholder="Username" required name="username">';
          	}
           ?>
           <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" id="inputPass" class="form-control" placeholder="Password" name="password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>	
        </div> -->
        <div class="form-inline">
        	<button class="btn btn-lg btn-primary " type="submit"><span class="glyphicon glyphicon-log-in"></span> Login</button>
        	<button class="btn btn-lg btn-primary pull-right" data-toggle="modal" data-target="#modalSignIn"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign In</button>
        </div>

      </form>
      <?php
        if(isset($_GET['usr_exist'])){
          $type = "warning";
          $msg = "The <strong>username already exist</strong> try with another.";
          $extra = "";
        }
        if(isset($_GET['usr_fail'])){
          $type = "warning";
          $msg = "The <strong>username</strong> must contain only <strong>letters and numbers</strong> and have <strong>[6-45] characters.</strong>";
          $extra = "";
        }
        if(isset($_GET['email_fail'])){
          $type = "warning";
          $msg = "The <strong>email</strong> is invalid";
          $extra = "";
        }
    		if(isset($_GET['send_email_fail'])){
          echo alert("danger","We <strong>can't send you the email</strong>. But you can login <br> ( ͡◉ ͜> ͡◉) ／"," col-lg-4 pull-right");
        }
        if (isset($_GET['loginfail'])) {
          echo alert("danger","Username or password <strong>incorrect!</strong>"," col-lg-4 pull-right");
        }
        if(isset($_GET['register'])){
          echo alert("info","We send you an <strong>email</strong> for activated your account. <strong>Please check.</strong>"," col-lg-4 pull-right");
        }
      ?>
    </div> <!-- /container -->

	<!-- Modal -->
    <div class="modal fade" id="modalSignIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Sign In</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="php/register.php">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <img src="img/icon.png" class="center-block"  width="90px">
                  <?php
                    if(!empty($type)){  //print alert
                        echo "<br>";
                        echo alert($type,$msg,"");
                    }
                  ?>
                </div>
                <div class="col-md-6">
                   <img src="img/user.png" class="center-block"> 
                    <?php
                      if(isset($_GET['usr_exist']) || isset($_GET['usr_fail'])){
                        $val = isset($_GET['usr_exist']) ? $_GET['usr_exist'] : $_GET['usr_fail'];
                        echo '
                          <div class="form-group has-error has-feedback">
                          <input type="text" placeholder="Username" class="form-control" title="Username" name="username" required value="'.$val.'" id="user">
                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                          </div>

                          <input type="email" min="1" placeholder="Email" class="form-control" title="Email" name="email"  required value="'.$_GET['email'].'" id="email">
                        ';
                      }else{
                        if(isset($_GET['email_fail'])){
                          echo '
                            <div class="form-group has-success has-feedback">
                              <input type="text" placeholder="Username" class="form-control" title="Username" name="username" required value="'.$_GET['usr'].'" id="user">
                                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>
                            <br>
                            <div class="form-group has-error has-feedback">
                              <input type="email" placeholder="Email" class="form-control" title="Email" name="email" required
                              value="'.$_GET['email_fail'].'" id="email">
                              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                            </div>
                          ';
                        }else{
                          echo '
                            <input type="text" placeholder="Username" class="form-control" title="Username" name="username" required id="email">
                            <br>
                            <input type="email" placeholder="Email" class="form-control" title="Email" name="email" required id="email">';
                        }
                      }
                    ?>
                    <br>
                    <input type="password" placeholder="Password" class="form-control" title="Password" name="pass" required id="pass">
                <br>
                  
                </div>
              </div> <!-- col-md-12 -->
            </div> <!-- row -->
          </div> <!-- modal body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="register" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <?php
      echo jsIndex();
      if(!empty($type)){
        echo "<script type='text/javascript'>
          $('#modalSignIn').modal('show');
        </script>";
      }
    ?>

</body>
</html>