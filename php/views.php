<?php

	function getNav($name){
		return '
		<!-- Navigation -->
	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="agendatv.php"> <span><img class="img-small" src="img/icon.png" width="24px" height="24px"></span> AgendaTV</a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav">
	                    <li>
	                        <a href="php/series.php"> <i class="fa fa-television" aria-hidden="true"></i> Series</a>
	                    </li>
	                    <li>
	                        <a href="php/anime.php"><i class="fa fa-eye" aria-hidden="true"></i> Anime</a>
	                    </li>
	                    <li>
	                        <a  href="movie.php"> <i class="glyphicon glyphicon-film"></i> Movies</a>
	                    </li>
	                    <li>
	                        <a href="php/destroy_session.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	                    </li>
	                </ul>
	                <h4><span class="text-white pull-right">'.$name.'</span></h4>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav> ';
	}
	function getNav2($name,$active){
		$nav = '	
		<header class="container cursive">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			  <div class="container-fluid">			    
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">	
			      	<span class="sr-only">Toggle navigation</span>			        
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="agendatv.php"><span><img class="img-small" src="img/icon.png" width="24px" height="24px"></span> AgendaTV</a>
			    </div>
			    <div class="collapse navbar-collapse" id="menu">
			      <ul class="navbar-nav">
			      	<li class="'.$active[0].'"><a href="php/series.php"> <span class="fa fa-television" aria-hidden="true"></span> Series</a></li>
	      			<li class="'.$active[1].'"><a href="php/anime.php"><span class="fa fa-eye" aria-hidden="true"></span> Anime</a></li>
	        		<li class="'.$active[2].'"><a href="movie.php"> <span class="glyphicon glyphicon-film"></span> Movies</a></li>	        
			        <li class="dropdown '.$active[3].'">
			          <a href="#" class="dropdown-toggle"><i class="fa fa-code-fork" aria-hidden="true"></i> Feedback <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li class="dropdown">
			            	<a class="dropdown-toggle"><i class="fa fa-plus-circle" aria-hidden="true"></i> What to see <b class="caret right"></b></a>
			            	<ul class="dropdown-menu">
			            		<li><a href="what_to_see.php?show=serie"><span class="pull-right fa fa-television" aria-hidden="true"></span> Serie</a></li>
			            		<li><a href="what_to_see.php?show=anime"><span class="pull-right fa fa-eye" aria-hidden="true"></span> Anime</a></li>
			            		<li><a href="what_to_see.php?show=movie"><span class="pull-right glyphicon glyphicon-film"></span> Movies</a></li>
			            	</ul>
			            </li>
			            <li class="divider"></li>
			            <li><a href="recommend.php?get=serie"><i class="fa fa-heart" aria-hidden="true"></i> Recommend shows</a></li> <!-- recommend show u register for other people vote -->
			            <li class="dropdown"> <!-- vote for shows other people recommend -->
					          <a class="dropdown-toggle"><span class="fa fa-thumbs-o-up" aria-hidden="true"></span> Vote <b class="caret right"></b></a>
					          <ul class="dropdown-menu">
					            <li><a href="vote.php?get=serie"><span class="pull-right fa fa-television" aria-hidden="true"></span> Serie</a></li>
					            <li><a href="vote.php?get=anime"><span class="pull-right fa fa-eye" aria-hidden="true"></span> Anime</a></li>
					            <li><a href="vote.php?get=movie"><span class="pull-right glyphicon glyphicon-film"></span> Movie</a></li>
					          </ul>
				        </li>
			          </ul>
			        </li>
			      </ul>			      
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#"><i class="fa fa-android" aria-hidden="true"></i> Download the App</a></li>
			        
			        <li class="dropdown '.$active[4].'">
			          <a class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i> '.$name.' <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="settings.php"><i class="pull-right glyphicon glyphicon-cog"></i> Settings </a></li>
			            <li class="divider"></li>
			            <li><a href="php/destroy_session.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			          </ul>
			        </li>
			      </ul>
			    </div>
			  </div>
			</nav>	
		</header>	
		';
		return $nav;
	}
	function getMenuSettings($val){
		return '
			<div class="col-md-3">
	            <div class="list-group" id="sidebar">
	            	<a href="settings.php?" class="list-group-item '.$val[0].'">Personal Data <i class="fa fa-book pull-right" aria-hidden="true"></i></a>
	 				<a href="settings.php?setting=2" class="list-group-item '.$val[1].'">Theme <i class="fa fa-picture-o pull-right" aria-hidden="true"></i></a>
	 				<a href="settings.php?setting=3" class="list-group-item '.$val[2].'">Export <i class="pull-right fa fa-database" aria-hidden="true"></i></a>
	 				<a href="settings.php?setting=4" class="list-group-item '.$val[3].'">Delete account <i class="pull-right fa fa-trash" aria-hidden="true"></i></a>
	            </div>
        	</div>';
	}
	function getMenuRecommend($val){
		return '
		<div class="col-md-3">
            <div class="list-group" id="sidebar">
    			<a href="recommend.php?get=serie" class="list-group-item '.$val[0].'">From my account <i class="fa fa-book pull-right" aria-hidden="true"></i></a>
 				<a href="recommend.php?option=2" class="list-group-item '.$val[1].'">Other show pretty cool <i class="fa fa-rocket pull-right" aria-hidden="true"></i></a>
    		</div>
	    </div>';
	}
	function getMenuShow($cod,$active,$count){
		$menu = '
			<div class="col-md-3"> <!-- navbar-fixed-bottom -->
                <p class="lead text-white">Shows</p>
                <div class="list-group"> 
	                <a href="agendatv.php" id="watching" class="list-group-item '.$active[0].'"><span class="glyphicon glyphicon-eye-open"></span> Watching <span class="pull-right">'.$count[0].'</span></a>
	        		<a href="for_watch.php" id="for_watch" class="list-group-item '.$active[1].'"><span class="glyphicon glyphicon-play"></span> For watch <span class="pull-right">'.$count[1].'</span></a>
	        		<a href="finished.php" id="finished" class="list-group-item '.$active[2].'"><span class="glyphicon glyphicon-ok"></span> Finished <span class="pull-right">'.$count[2].'</span></a>
	        		<a class="list-group-item" id="last" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> New show</a>
	            </div>';
            	if($cod == 0){
            		$msg= '	
            			<br>
		                <br>
		                <br>
		                <form method="post" action="php/validate_cod.php">
		                	<div class="alert alert-danger">
						  		<label>Paste the code to confirm your account. We send you an email.</label>
						  		<input type="text" name="cod" placeholder="Code activation" class="form-control"> <br>
						  		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Send</button>
							</div>
		                </form>

            		';
            		$menu .= $msg;
            	}
            	if(isset($_GET['invalid'])){
					$menu .= alert("danger","<strong>Invalid code</strong>","");
				}
                $menu .= '	
	        </div>';
		return $menu;
	}

	function getFooter(){
		return '
		<div class="container">
			<footer>
	            <div class="row">
	                <div class="col-lg-9 text-white">
	                    <p>Copyright &copy; AgendaTV 2017</p>
	                </div>
	                <div class="col-lg-3">
	                    <ul class="list-inline social-buttons">
	                        <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a>
	                        </li>
	                        <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a>
	                        </li>
	                        <li><a href="#"><i class="fa fa-youtube fa-2x"></i></a></li>
	                    </ul>
	                </div>
	            </div>
        	</footer>
        </div>
		';
	}
	function getWatching1($s){
		if($s == -1){
			$result = getFirstWatching($_SESSION['_id'],$_SESSION['type'],-1);
		}else{
			$result = getFirstWatching($_SESSION['_id'],$_SESSION['type'],$s);
		}
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_row($result);
			return '<div class="well">		<!-- 800x300 -->
                    <img class="center-block" src="'.$row['3'].'" width="260px" height="300px" alt="Poster">

                    <div class="caption-full well-background">
                        <h2 class="text-center">'.$row[1].'</h2>
                        <div class="text-center ratings">
                            <p class="text-center">'.
                                getStar($row[2]) .'
                                <span>'.$row[2].'.0 stars</span>
                                <span class="pull-right">ID:'.$row[0].'</span>
                            </p>
                        </div>
                        <form method="post" action="php/update_chapter.php">
                        	<div class="row">
                        	  	<div class="col-md-12">
	                                <div class="col-md-6">
		                                <label for="episode">Episode:</label>
		                                <input id="episode"type="number" require, placeholder="Episode" min="1" title="Episode" class="form-control " value="'.$row[5].'" name="episode">
	                                </div>
	                                <div class="col-md-6">
		                                <label for="season">Season:</label>
		                                <input id="season" type="number" require, placeholder="Season" min="1" title="Season" class="form-control " value="'.$row[4].'" name="season">
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-md-12">
	                        		<div class="col-md-6">
		                        		<input type="hidden" name="id_show" value="'.$row[0].'">
			                            <br>
			                              <div class="checkbox-inline">
			                                <label>
			                                  <input id="mark_finished" name="check" type="checkbox">Mark as finished
			                                </label>
			                              </div>
			                            <br>
			                              <button type="submit" class="btn btn-primary width-ok"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
		                            </div>
		                            <div class="col-md-6 form-inline">
				                    	<input type="hidden" name="" value="'.$row[0].'"> <br>
				                    	<div class="checkbox-inline">
			                                <label>
			                                  <input id="change" name="check" type="checkbox">Change image
			                                </label>
			                            </div>
				                    	<input id="campo_img" class="form-control" name="url" placeholder="URL new image"> 
				                    	<button type="submit" id="ok" name="change_img" class="btn btn-success">Ok</button>
		                            </div>
			                    </div>
			                </div>
                        </form>
                    </div>
                </div>';
		}

	}
	function getWatching2($result){
		//do stuff here
		$series = "";
            while($row = $result->fetch_assoc()){
            	$series .= '
            	<div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <h3>'.$row['name'].'</h3>
                            <img src="'.$row['img'].'" width="120px" height="150px">
                            <div class="ratings">'. getStar($row['rating']) .'</div>
                        </div>
                         <br>
                         <!-- <br> -->
                        <div class="col-md-9">
							<p class="text-justify cursive">'.$row['sinopsis'].'</p>
							<div class="alert alert-info"><h4><strong>Season: </strong>'.$row['season'].'<strong> Episode: </strong>'.$row['episode'].'</h4></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                         <!-- <div class="ratings pull-right">ID:'.$row['id'].'</div> -->
                        <span class="pull-right"><span title="Last view" class="glyphicon glyphicon-eye-open"></span> '.getLastSee($row['date_last_see']).' days ago</span>
                        <form method="post" action="php/action_watching.php"> 
                            <input class="pull-right" name="id_show" value="'.$row['id'].'" type="hidden">
                            <br>
                            <!-- aqui iba el sinopsis -->
                            <button type="submit" name="delete_show" class="btn btn-danger"><span title="Delete show"class="glyphicon glyphicon-trash"></span> Delete show</button>
                            <button type="submit" name="see_show" class="btn btn-success"><span title="See show" class="glyphicon glyphicon-play"></span> See show</button>
                        </form>
                    </div>
            	</div> <!-- row -->
            	<hr>';
            }//while
        return $series.'</div>'; 
	}
	function getForWatchShow($id,$name){
		$series = "";
		$result = getShowForWatch($id,$_SESSION['type'],$name);
		$aux = 0;
		while($row = $result->fetch_assoc()){
			if($aux == 2 || $aux == 0){
				$series .= '
				<div class="row">'.
	                getDataForWatch($row); 
	             if($aux == 2) $aux=0;
			}else{
				$series .= getDataForWatch($row) . '</div> <hr>';
			}
			$aux++;
        }//while
        return $series;
	}
	function getDataForWatch($row){
		$sinopsis = $row["sinopsis"];
		if(str_word_count($sinopsis) > 37){
			$sinopsis = limitWords($row["sinopsis"],36)."..";	//limit to 36 words
		}

		return '
		<div class="col-md-6">
            <h3>'.$row['name'].'</h3>
            <!-- <form method="post" action="php/edit.php"> -->
            <form method="post" action="php/action_for_watch.php">
            	<button type="submit" name="edit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-edit"></span> Edit</button>
            	           
	            <input class="pull-right" name="id_show" value="'.$row['id'].'" type="hidden">
	            <img src="'.$row['img'].'" width="120px" heigth="150px" class="img-responsive" alt="Poster">
	            <div class="ratings">'. getStar($row['rating']) .'
	              <span class="pull-right">ID:'.$row['id'].'</span>
	            </div>
	            <p class="text-justify comic">'. $sinopsis . ' </p>

	            <button type="submit" name="delete_show" id="delete_show" class="btn btn-danger"><span class="glyphicon glyphicon-trash" ></span> Delete show</button>
	            <button type="submit" name="start_to_see" id="see_show" class="btn btn-success"><span class="glyphicon glyphicon-play"></span> Start to see</button>
	        </form>
        </div>';
	}
	function getDataFinish($row){
		return '<div class="col-md-6">
	                <h3>'.$row['name'].' <span class="ratings pull-right">ID:'.$row['id'].'</span></h3>
	                <img src="'.$row['img'].'" width="120px" height="150px" alt="Poster">
	                <div class="ratings">'.getStar($row['rating']).'
	                  <span class="ratings pull-right">Finish on: '.$row['date_finished'].'</span>
	                </div>

	                <p class="text-justify cursive">'.$row['comment'].'</p>
	                <form method="post" action="php/action_finished.php">
	                	<input type="hidden" name="id_show" value="'.$row['id'].'">
		                <button type="submit" name="delete_show" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
		                <button type="submit" name="move_show" class="btn btn-success"><span title="Move to watching" class="glyphicon glyphicon-chevron-left"></span></button>
	                </form>
	            </div>';
	}
	function getFinished($result){
		$series = "";
		$aux = 0;
		while($row = $result->fetch_assoc()){
			if($aux==0 || $aux == 2){
				$series .= '
				<div class="row">'.getDataFinish($row);
		        if($aux == 2) $aux = 0;
			}else{
				$series .= getDataFinish($row).'</div> <hr>';   //div of row class
			}
			$aux++;
		}//while
		return $series;
	}
	function getMovieForWatch($data){
		$movie = "";
		while($row = $data->fetch_assoc()){
			$movie .='
			<div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
		                <img src="'.$row['img'].'" img="Poster" width="120px" height="150px">
		                <div class="ratings">
		                	'.getStar($row['rating']).'
		                </div>
		            </div>
		            <div class="col-md-8">
		                <div class="alert alert-danger">
		                    <h4><strong>'.$row['name'].'</strong></h4>
		                </div>
		                <form method="post" action="php/action_movie.php">
		                	<input type="hidden" value="'.$row['id'].'" name="id_movie">
		                    <button type="submit" name="delete" id="delete_show" class="btn btn-danger" title="Delete"><span class="glyphicon glyphicon-trash" ></span> Delete</button>
		                    <button type="submit" name="finish" id="see_show" class="btn btn-success margin-left-ok" title="Finish movie"><span class="glyphicon glyphicon-ok"></span> Finish</button>
		                    <button type="submit" name="edit" class="btn btn-primary pull-right" title="Edit movie"><span class="glyphicon glyphicon-edit"></span> Edit</button>
		                </form>
		            </div>
                </div>
            </div>
            <hr>';
		}
		return $movie;
	}
	function getMovieFinished($data){
		$movie = "";
		while($row = $data->fetch_assoc()){
			$movie .= '
				<div class="row">
                    <div class="col-md-4">
                        <img src="'.$row['img'].'" img="Poster" width="120px" height="150px">
                        <div class="ratings">'.
                        	getStar($row['rating']) .
                            '
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="alert alert-danger">
                            <h4><span class="pull-right">Finish on: '.$row['date'].'</span></h4>
                            <h4><strong>'.$row['name'].'</strong></h4>
                            <h5 class="text-justify cursive">'.$row['comment'].'</h5 class="text-justify">
                        </div>
                        <form method="post" action="php/action_movie.php">
                        	<input type="hidden" name="id_movie" value="'.$row['id'].'">
                            <button type="submit" name="delete" class="btn btn-danger margin-left-ok" title="Delete movie"><span class="glyphicon glyphicon-trash" ></span> Delete</button>
                            <button type="submit" name="move_show" class="btn btn-success pull-right" title="Move"><span class="glyphicon glyphicon-chevron-left"></span> Move to Watching</button>
                        </form>
                    </div>
                </div>
                <hr>
			';
		}//while
		return $movie;
	}

	/**************************** MODAL **************************/
	function getModal(){
		return '<!-- Modal -->
		    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h4 class="modal-title" id="exampleModalLabel">New show</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		            <form method="post" action="php/insert_show.php">
		                <div class="form-inline">
		                    <input type="text" placeholder="Name" class="form-control" title="Name" name="name" required>
		                    <input type="number" min="1"  placeholder="Priority 1 - 5" class="form-control" title="Priority" name="priority" required>
		                    <select class="form-control" name="type" title="Type of show">
		                        <option value="S">Serie</option>
		                        <option value="A">Anime</option>
		                    </select>
		                </div>
		                <br>
		                <input type="text" placeholder="URL image (e.g: the flash poster)" class="form-control" title="URL image" name="url_img" required>
		                <br>
		                <textarea class="form-control" placeholder="Sinopsis (optional)" rows="5" title="Sinopsis about the show" name="sinopsis"></textarea>
		            
		              <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Close</button>
		                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>';
	}
	function getModalMovie(){
		return '<!-- Modal -->
		    <div class="modal fade" id="modalMovie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h4 class="modal-title" id="exampleModalLabel">New movie</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		            <form method="post" action="php/insert_movie.php">
		                <div class="form-inline">
		                    <input type="text" placeholder="Name" class="form-control" title="Name" name="name" required>
		                    <input type="number" min="1"  placeholder="Priority 1 - 5" class="form-control" title="Priority" name="priority" required>
		                </div>
		                <br>
		                <input type="text" placeholder="URL image (e.g: the flash poster)" class="form-control" title="URL image" name="url_img" required>
		            
		              <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Close</button>
		                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>';
	}
	function getEditMovie($row){
		return '<!-- Modal -->
		    <div class="modal fade" id="modalMovieEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h4 class="modal-title" id="exampleModalLabel">Edit movie</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		            <form method="post" action="php/update_movie.php">
		                <div class="form-inline">
		                    <input type="text" placeholder="Name" class="form-control" title="Name" name="name" required value="'.$row[1].'">
		                    <input type="number" min="1"  placeholder="Priority 1 - 5" class="form-control" title="Priority" name="priority" required value="'.$row[2].'">
		                </div>
		                <br>
		                <input type="text" placeholder="URL image (e.g: Logan poster)" class="form-control" title="URL image" name="url_img" required value="'.$row[3].'">
		                <input type="hidden" name="id_show" value="'.$row[0].'">
		            
		              <div class="modal-footer">
		                <button type="submit" class="btn btn-secondary" name="close"><span class="glyphicon glyphicon-remove-sign"></span> Close</button>
		                <button type="submit" class="btn btn-primary" name="save"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>';
	}
	function getModalEdit($data){
		$edit= '<!-- Modal -->
		    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h4 class="modal-title" id="exampleModalLabel">Edit show</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		            <form method="post" action="php/update_show.php">
		                <div class="form-inline">
		                    <input type="text" placeholder="Name" class="form-control" title="Name" name="name" required value="'.$data[1].'">
		                    <input type="number" min="1"  placeholder="Priority 1 - 5" class="form-control" title="Priority" name="priority" required value="'.$data[2].'">
		                    <select class="form-control" name="type" title="Type of show">';
		                    	if($data[3] == 'SERIE'){
		                    		$edit .= '
		                    		<option value="S" selected>Serie</option>
		                        	<option value="A">Anime</option>';
		                    	}else{
		                    		$edit .= '
		                    		<option value="S">Serie</option>
		                        	<option value="A" selected>Anime</option>';
		                    	}
		                    	$edit .= '
		                    </select>
		                </div>
		                <br>
		                <input type="text" placeholder="URL image (e.g: the flash poster)" class="form-control" title="URL image" name="url_img" required value="'.$data[4].'">
		                <br>
		                <textarea class="form-control" placeholder="Sinopsis (optional)" rows="5" title="Sinopsis about the show" name="sinopsis">'.$data[5].'</textarea>
		              <div class="modal-footer">
		              	<input type="hidden" value="'.$data[0].'" name="id_show">
		                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Close</button>
		                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Save changes</button>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>';
		    return $edit;
	}
	function getModalDelete($data){
		return '<!-- Modal -->
		    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h4 class="modal-title" id="exampleModalLabel">Delete show</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		          	<div class="row">
		          		<div class="col-md-12">
		          			<div class="col-md-4 text-center">
				          		<h4><strong>'.$data[1].'</strong></h4>
				          		<img src="'.$data[2].'" width="120px" height="150px">
				          		<div class="ratings">'.getStar($data[3]).'</div>
		          			</div>
		          			<div class="col-md-8 text-center">
		          				<h4>Are you sure you want to delete this show?</h4>
		          			</div>
		          		</div>
		          	</div>
		          	
		          	
		            <form method="post" action="php/delete_show.php">
		              <div class="modal-footer">
		              	<input type="hidden" name="id_show" value="'.$data[0].'">
		                <button name="close" class="btn btn-secondary"><span class="glyphicon glyphicon-remove-sign"></span> No, abort!</button>
		                <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Yes, blew up that shit!</button>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>';
	}
	function getModalMove($data){
		return '<!-- Modal -->
		    <div class="modal fade" id="modalMove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h4 class="modal-title" id="exampleModalLabel">Move show</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		          	<div class="row">
		          		<div class="col-md-12">
		          			<div class="col-md-4 text-center">
				          		<h4><strong>'.$data[1].'</strong></h4>
				          		<img src="'.$data[2].'" width="120px" height="150px">
				          		<div class="ratings">'.getStar($data[3]).'</div>
		          			</div>
		          			<div class="col-md-8 text-center">
		          				<h4>Are you sure you want to move this show to <strong>"watching"?</strong></h4>
		          			</div>
		          		</div>
		          	</div>
		            <form method="post" action="php/move.php">
		              <div class="modal-footer">
		              	<input type="hidden" name="id_show" value="'.$data[0].'">
		                <button type="submit" class="btn btn-secondary" name="close"><span class="glyphicon glyphicon-remove-sign"></span> Close</button>
		                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-sort"></span> Yes, move it</button>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>';
	}
	function getModalFinish($row){
		return '<!-- Modal -->
		    <div class="modal fade" id="modalFinish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h4 class="modal-title" id="exampleModalLabel">Finish show</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		          	<div class="row">
		          		<div class="col-md-12">
		          			<div class="col-md-3 text-center">
				          		<h4><strong>'.$row[1].'</strong></h4>
				          		<img src="'.$row[2].'" alt="Poster" width="120px" height="150px">
			          		</div>
		          			<div class="col-md-9">
		          				<form method="post" action="php/finish.php">
					          	  <input type="number" name="rating" class="form-control" placeholder="Rating 1 - 5" min="1"><br>
					              <textarea name="comment" placeholder="Leave a comment" class="form-control" rows="6"></textarea>
					              <div class="modal-footer">
					              	<input type="hidden" name="id_show" value="'.$row[0].'">
					                <button type="submit" name="close" class="btn btn-secondary"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
					                <button type="submit" name="finish" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> Finish</button>
					              </div>
					            </form>
		          			</div>
		          		</div>
		          		
		          	</div>		            
		          </div>
		        </div>
		      </div>
		    </div>';
	}
	function getUser($row){
		return '
		<form method="post" action="php/update_user.php">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<label for="#user">Username:</label>
					<input type="text" name="username" value="'.$row[0].'" class="form-control" id="user" placeholder="Username" required>
				</div>
				<div class="col-md-6">
					<label for="#mail">Email:</label>
					<input type="text" name="email" value="'.$row[1].'" class="form-control" placeholder="Email" id="mail" required>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<label for="#pass">Confirm password:</label>
					<input type="password" name="pass" class="form-control" placeholder="Confirm password" id="pass" required>
					<br>
					<button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-edit"></i> Save changes</button>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>
		</form>
		';
	}
	function getTheme(){
		return '
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<figure class="figure">
							<a href="php/select_theme.php?bg1=on"><img name="first" src="img/bg1.jpg" class="img-thumbnail"></a>
							 <figcaption class="figure-caption text-center">Dark</figcaption>
						</figure>
					</div>
					<div class="col-md-6">
						<figure class="figure">
							<a href="php/select_theme.php?bg4=on"><img name="first" src="img/bg4.jpg" class="img-thumbnail"></a>
							 <figcaption class="figure-caption text-center">Anime</figcaption>
						</figure>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<figure class="figure">
							<a href="php/select_theme.php?bg5=on"><img name="first" src="img/bg5.jpg" class="img-thumbnail"></a>
							 <figcaption class="figure-caption text-center">Ichigo Hollow</figcaption>
						</figure>
					</div>
					<div class="col-md-6">
						<figure class="figure">
							<a href="php/select_theme.php?bg6=on"><img name="first" src="img/bg6.jpg" class="img-thumbnail"></a>
							 <figcaption class="figure-caption text-center">Ichigo Hollow 2</figcaption>
						</figure>
					</div>
				</div>
			</div>
		';
	}
	function getExport(){
		return '
			<div class="row">
				<div class="col-md-12">
					<form method="post" action="php/export.php">
						<button type="submit" class="btn btn-primary btn-lg center-block"><i class="fa fa-download" aria-hidden="true"></i> Download File</button>
					</form>
				</div>
			</div>
		';
	}
	function getDeleteUser($id){
		return '
			<div class="row">
				<div class="col-md-12">
					<form method="post" action="php/delete_account.php">
						<div class="alert alert-danger"><h3>This <strong>cannot be undone</strong></h3></div>
						<input type="hidden" name="id_user" value="'.$id.'">
						<button type="submit" class="btn btn-danger btn-lg center-block"><i class="fa fa-minus-circle" aria-hidden="true"></i> Delete Account</button>
					</form>
				</div>
			</div>
		';
	}
	function buttonChange(){
		return '
			<a class="btn btn-success" href="php/change_view.php?mode=detail"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
            <a class="btn btn-warning" href="php/change_view.php?mode=carousel"><i class="fa fa-gift" aria-hidden="true"></i> Carousel</a>
            <br>
            <br>
		';
	}
	function detailMovie($row){
		return '
			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-3"></div>
					<div class="col-lg-9 well" id="movie_detail">
		                <div class="col-md-4">
		                    <img src="'.$row[2].'" img="Poster" width="120px" height="150px">
		                    <div class="ratings">'.
		                    	getStar($row[3]) .
		                        '
		                    </div>
		                </div>
		                <div class="col-md-8">
		                    <div class="alert alert-danger">
		                        <h4><span class="pull-right">Finish on: '.$row[5].'</span></h4>
		                        <h4><strong>'.$row[1].'</strong></h4>
		                        <h5 class="text-justify cursive">'.$row[4].'</h5 class="text-justify">
		                    </div>
		                </div>
	                </div>
                </div>
            </div>
                
		';
	}
	function recommendItem($row){
		$item = '
			<div class="col-md-3">
				<h3 class="text-center">'.$row['name'].'</h3>
				<div class="ratings text-center">
					<img src="'.$row['img'].'" class="img-thumbnail" alt="Poster">
						'.getStar($row['rating']);
						if($row['recommend']==0){
							$item .= '
							<form method="post" action="php/recommend.php?option=account">
								<input type="hidden" name="show" value="'.$row['id'].'"><br>
								<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Recommend</button>
							</form>
							';
						}else{
							$item .= '
								<button class="btn btn-success" title="Already recommended"><i class="fa fa-check-circle" aria-hidden="true"></i> Already done</button>
							';
						}
				$item .='	
				</div>
			</div>
		';
		return $item;
	}
	function recommendShow1($result){
		$data = '
		<div class="well">
            <div class="col-md-4">
                <a href="recommend.php?get=serie" class="btn btn-primary" title="Serie"><i class="fa fa-television" aria-hidden="true"></i> </a>
                <a href="recommend.php?get=anime" class="btn btn-success" title="Anime"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="recommend.php?get=movie" class="btn btn-warning" title="Movie"><i class="glyphicon glyphicon-film"></i></a>
                <br>
                <br>
            </div>
            <form method="post" action="php/search.php?extra=1">
	            <div class="col-md-5">
	                <input type="text" name="show" placeholder="Search by Title" class="form-control">
	            </div>
	            <div class="col-md-3">
	                <button class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Find my show</button>
	            </div>
            </form>
        </div>
		';
		$aux = 1;
		$aux2 = array(1,false);
		$data .='
			<div class="row">
				<div class="col-md-12">
					<div class="well">';
						while($row = $result->fetch_assoc()){
							if($aux==5){
								$data.= '<div class="row">
									<div class="col-md-12">';
								$aux = 1;
								$aux2[0] = 0;
								$aux2[1] = true;
							}
							$data .= recommendItem($row);
							$aux2[0] += 1;
							if($aux2[0]==4 && $aux2[1]==true){
								$data .= '</div>
								</div>';
							}
							$aux++;
						}
						$data .= '
					</div> <!-- well -->
				</div> <!-- col-md-12 -->
			</div> <!-- row -->
		';
		return $data;
	}
	function recommendShow2(){
		return '
		<div class="well">
		<form method="post" action="php/recommend.php?option=new">
			<div class="col-md-3">
				<!-- <label>Type:</label> -->
				<select class="form-control" name="type">
					<option>SERIE</option>
					<option>ANIME</option>
					<option>MOVIE</option>
				</select>
			</div>
			<div class="col-md-3">
				<input type="text" placeholder="Name" name="name" title="Name of show" class="form-control">
			</div>
			<div class="col-md-6">
				<input type="text" name="img" placeholder="URL image (sieze poster)" class="form-control">
			</div>
			<div class="col-md-6">
				<br>
				<textarea rows="5" cols="40" class="form-control" placeholder="A little opinion about the show" name="review"></textarea><br>
				<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> Recommend</button>
			</div>
		</form>
			<div class="col-md-6">
				<br>
				<img src="img/icon.png" class="pull-right">
			</div>
		</div>
		';
	}
	function carouselWatching($result){
		$show = '';
		while($row = $result->fetch_assoc()){
			$show .= '
			<div class="item" >
	            <img src="'.$row['img'].'" width="176px" height="245px">
	            <div class="text-center ratings">'.
	            	getStar($row['rating']).'
	                <br>
	            </div>
	            <form method="post" action="php/action_watching.php">
		            <button type="submit" name="delete_show" class="btn btn-danger" title="Delete show"><span title="Delete show" class="glyphicon glyphicon-trash"></span></button>
		            <label class="text-center text-white margin-left-okdoky">S:'.$row['season'].' E:'.$row['episode'].'</label>
		            <button type="submit" name="see_show" class="btn btn-success pull-right" title="See show"><span title="See show" class="glyphicon glyphicon-play"></span></button>
		            <input type="hidden" value="'.$row['id'].'" name="id_show">
		        </form>
	        </div>'; 
		}//while
		return $show;
	}
	function carouselMovie1($result){
		$movie = '';
		while($row = $result->fetch_assoc()){
			$movie .= '
				<div class="item" >
                    <img src="'.$row['img'].'" width="176px" height="245px">
                    <div class="text-center ratings">'.getStar($row['rating']).'
                        <br>
                    </div>
                    <form method="post" action="php/action_movie.php" class="text-center">
                        <input type="hidden" name="id_movie" value="'.$row['id'].'">
                        <button type="submit" name="delete" class="btn btn-danger" title="Delete"><span class="glyphicon glyphicon-trash" ></span></button>
                        <button type="submit" name="edit" class="btn btn-primary" title="Edit movie"><span class="glyphicon glyphicon-edit"></span></button>
                        <button type="submit" name="finish" class="btn btn-success" title="Finish movie"><span class="glyphicon glyphicon-ok"></span></button>
                    </form>
                </div>
			';
		}//while
		return $movie;
	}
	function carouselMovie2($result){
		$movie = '';
		while($row = $result->fetch_assoc()){
			$movie .= '
				<div class="item" >
                    <img src="'.$row['img'].'" width="176px" height="245px">
                    <div class="text-center ratings">'.getStar($row['rating']).'
                        <br>
                    </div>
                    <form method="post" action="php/action_movie.php" class="text-center">
                        <input type="hidden" name="id_movie" value="'.$row['id'].'">
                        <button type="submit" name="move_show" class="btn btn-success" title="Move to \'For Watch\'"><i class="glyphicon glyphicon-chevron-left"></i></button>
                        <button type="submit" name="detail" class="btn btn-primary" title="Edit movie"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                        <button type="submit" name="delete" class="btn btn-danger" title="Delete movie"><i class="glyphicon glyphicon-trash"></i></button>
                    </form>
                </div>
			';
		}//while
		return $movie;
	}
	function carouselVote($result){
		$item = "";
		while($row = $result->fetch_assoc()){
			$item .= '
				<div class="item">
                    <img src="'.$row['img'].'" width="176px" height="245px">
                    <form method="post" action="php/vote.php">
                        <input type="hidden" name="show" value="'.$row['id'].'"><br>
                       	<div class="text-center">
                       		<button type="submit" class="btn btn-danger" name="dislike" title="Dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '.$row['bad'].'</button>
                       		<button type="submit" class="btn btn-success" title="Like" name="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$row['okydoky'].'</button>
                       	</div>   
                    </form>
                </div>
			';
		}//while
		return $item;
	}
	function carouselWhatToSee($result){
		$recommend = "";
		while($row = $result->fetch_assoc()){
			$recommend .= '
				<div class="item">
	                <img src="'.$row['img'].'" width="176px" height="245px">
	                <form method="post" action="php/add_to_list.php">
	                    <input type="hidden" name="show" value="'.$row['id'].'"><br>
	                    <button class="btn btn-primary center-block"><i class="fa fa-plus" aria-hidden="true"></i> Add to my List</button>    
	                </form>
            	</div>
			';
		}
		return $recommend;
	}
	
	function alert($type,$msg,$extra){
		return "
			<div class='alert alert-".$type.$extra."'>".
				$msg."
			</div>
		";
	}
	function notify($msg,$type,$delay){
		return '
			<script type="text/javascript">
               $.notify({
                    icon: "fa fa-plus",
                    message: "'.$msg.'"
                },{
                    type:"'.$type.'",
                    delay:'.$delay.',
                    icon_type: "class",
                    placement: {
                        from: "bottom",
                        align: "right"
                    }
                });
            </script>
		';
	}

?>