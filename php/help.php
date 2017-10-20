<?php
	//Load PHPMailer dependencies
	require_once 'mail/PHPMailerAutoload.php';
	require_once 'mail/class.phpmailer.php';
	require_once 'mail/class.smtp.php';
	require_once 'connection.php';

	function executeQuery($sql){
		$conn = getConnection();
		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
		    return true;
		}
		echo "<img src='../img/face.jpg'>";
		echo $conn->error;
		mysqli_close($conn);
		return false;
	}
	function getRow($sql){
		$conn = getConnection();
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		return mysqli_fetch_row($result);	//return a row
	}
	function getResult($sql){
		$conn = getConnection();
		if($result = mysqli_query($conn,$sql)){
			mysqli_close($conn);
			return $result;
		}
		echo $conn->error;
	}
	function regex($var){
		/* REGEX: Must start with letter, 6-45 characters Letters and numbers only*/
		if (preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST["username"])){
		    return true;
		}
		return false;
	}

	/* ***********************************************************************************/

	function resultWatching(){
        if(isset($_GET['search'])){
            $result = getShowWatching($_SESSION['_id'],$_SESSION['type'],$_GET['search']);//empty for all a name for one show
        }else{
            $result = getShowWatching($_SESSION['_id'],$_SESSION['type'],"");//empty for all a name for one show
        }
        return $result;
    }
    function resultMovies($meth){
    	$search = "";
    	if(isset($_GET['search'])){
    		$search = $_GET['search'];
        }
       return switchMeth($meth,$search); 
    }
    function switchMeth($meth,$search){
    	switch ($meth) {
    		case 0:
    			return getMovies($_SESSION['_id'],$search);
    		case 1:
    			return getFinishMovie($_SESSION['_id'],$search);
    	}
    }
    function recommendResult1($type,$state){
    	$search = "";
    	if(isset($_GET['search'])){
    		$search = $_GET['search'];
    	}
    	return recommendShows($_SESSION['_id'],$type,$state,$search);
    }
    function recommendResult2($state){
    	$search = "";
    	if(isset($_GET['search'])){
    		$search = $_GET['search'];
    	}
    	return recommendMovie($_SESSION['_id'],$state,$search);
    }
    function recommendShow($type){
    	$sql = "select id,name,img,okydoky,bad from recommend where type = '".$type."';";
    	return getResult($sql);
    }
	/* ***********************************************************************************/
	function login($username,$password){
		$sql = "SELECT id, status FROM user WHERE username = '".$username."' and password = '".md5($password)."'";
		return getResult($sql); //this return a virtual table
	}
	function getCodeActivation(){
		$cod = "";
		for($i=0; $i<4; $i++){
			$cod = $cod . rand(1, 9);
		}
		return $cod;
	}
	function updateImg($id_user,$id_show,$img,$tbl1,$tbl2){
		$sql = "update ".$tbl1." set img = '".$img."' where id in (select id_show from ".$tbl2." where id_user = ".$id_user." and id_show = ".$id_show.");";
		return executeQuery($sql);
	}
	function insert_user($usr, $email, $pass, $cod){
		$sql = "INSERT INTO user(username,email,password,cod_activation,status)
		VALUES ('".$usr."','".$email."','".md5($pass)."',".$cod.",0);";
		return executeQuery($sql);
	}
	function insert_show($name,$type,$rating,$url_img,$sinopsis,$id_user){
		$sql = "INSERT INTO shows(name,type,state,rating,img,sinopsis,recommend) 
		values('".$name."','".$type."',1,".$rating.",'".$url_img."','".$sinopsis."',0)";
		$conn = getConnection();
		if(mysqli_query($conn,$sql)){
			return insert_detail($id_user,$conn->insert_id,$conn,"detail_user_show");
		}
		echo "Insert show: ".$conn->error;
		mysqli_close($conn);
		return false;
	}
	function insert_detail($id_user,$id_show,$conn,$tbl){
		$sql = "INSERT INTO ".$tbl." (id_user,id_show) 
		VALUES(".$id_user.",".$id_show.")";
		if(mysqli_query($conn,$sql)){
			mysqli_close($conn);
			return true;
		}
		echo $conn->error;
		mysqli_close($conn);
		return false;
	}
	function insert_movie($id_user,$name,$rating,$img){
		$sql = "insert into movie(name,rating,img,state) values ('".$name."', ".$rating.",'".$img."',0)";
		$conn = getConnection();
		if(mysqli_query($conn,$sql)){
			return insert_detail($id_user,$conn->insert_id,$conn,"detail_user_movie");
		}
		echo "Insert movie: ".$conn->error;
		mysqli_close($conn);
		return false;
	}
	function insert_recommend($name,$img,$review,$type){
		$sql = "insert into recommend(name,img,okydoky,review,type) 
			values('".$name."','".$img."',1,'".$review."','".$type."')";
		return executeQuery($sql);
	}
	function recommendShows($id_user,$type,$state,$search){
		$sql = "";
		if (empty($search)) {
			$sql = "select id,name,img,rating,recommend from shows where type = '".$type."' and state = ".$state." and id in(select id_show from detail_user_show where id_user = ".$id_user.") order by rating desc;";
		}else{
			$sql = "select id,name,img,rating,recommend from shows where name like '%".$search."%' and type = '".$type."' and state = ".$state." and id in(select id_show from detail_user_show where id_user = ".$id_user.") order by rating desc;";
		}
		return getResult($sql);
	}
	function infoRecommend($id_user,$id_show,$aux){
		$sql = "";
		if($aux){
			$sql = "select name,img,comment,type from shows where id in (select id_show from detail_user_show where id_user = ".$id_user." and id_show = ".$id_show.");";
		}else{
			$sql = "select name,img,comment from movie where id in (select id_show from detail_user_movie where id_user = ".$id_user." and id_show = ".$id_show.");";
		}
		return getRow($sql);
	}
	function getRecommend($type){
		$sql = "select id,name,img,okydoky,bad from recommend where type = '".$type."';";
		return getResult($sql);
	}
	function getRecommendById($id_show){
		$sql = "select type,name,img from recommend where id = ".$id_show.";";
		return getRow($sql);
	}
	function setLike($id_show,$vote){
		$sql = "update recommend set okydoky = ".$vote." where id = ".$id_show;
		echo $sql;
		return executeQuery($sql);
	}
	function setDislike($id_show,$vote){
		$sql = "update recommend set bad = ".$vote." where id = ".$id_show;
		return executeQuery($sql);
	}
	function filterVote($val){
		if($val != ""){
			return $val;
		}
		return 0;
	}
	function countVote($id_show){
		$sql = "select okydoky,bad from recommend where id = ".$id_show.";";
		return getRow($sql);
	}
	function updateRecommend($id_user,$id_show,$table,$table2){
		$sql = "update ".$table." set recommend = 1 where id in (select id_show from ".$table2." where id_user = ".$id_user." and id_show = ".$id_show.");";
		echo $sql;
		return executeQuery($sql);
	}
	function recommendMovie($id_user,$state,$search){
		$sql = "";
		if (empty($search)) {
			$sql = "select id,name,img,rating,recommend from movie where state = ".$state." and id in(select id_show from detail_user_movie where id_user = ".$id_user.") order by rating desc;";
		}else{
			$sql = "select id,name,img,rating,recommend from movie where name like '%".$search."%' and state = ".$state." and id in(select id_show from detail_user_movie where id_user = ".$id_user.") order by rating desc;";
		}
		return getResult($sql);
	}
	function getShowForWatch($id,$type,$name){
		$sql = "";
		if(empty($name)){
			$sql = "SELECT id,name,img,rating,sinopsis FROM shows WHERE state = 1 AND type = '".$type."' AND id IN (SELECT id_show from detail_user_show WHERE id_user = ".$id.")";
		}else{
			$name = str_replace("'","",$name);
			$name = str_replace("\"","",$name);
			$sql = "SELECT id,name,img,rating,sinopsis FROM shows WHERE name LIKE '%".$name."%' AND state = 1 AND type = '".$type."' AND id IN (SELECT id_show from detail_user_show WHERE id_user = ".$id.")";
		}
		$conn = getConnection();
		return mysqli_query($conn,$sql);
	}
	function getStar($num){
		$temp = round($num);
		$cad = "";
		switch($temp){
			case 1:
			$cad ='
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star-empty"></span>
				<span class="glyphicon glyphicon-star-empty"></span>
				<span class="glyphicon glyphicon-star-empty"></span>
				<span class="glyphicon glyphicon-star-empty"></span>';
				break;
			case 2:
			$cad ='
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star-empty"></span>
				<span class="glyphicon glyphicon-star-empty"></span>
				<span class="glyphicon glyphicon-star-empty"></span>';
				break;
			case 3:
			$cad ='
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star-empty"></span>
				<span class="glyphicon glyphicon-star-empty"></span>';
				break;
			case 4:
			$cad ='
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star-empty"></span>';
				break;
			case 5:
			$cad ='
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>';
		}
		return $cad;
	}
	function limitWords($text,$limit){
		if(empty($text)){
			return $text;
		}
		$arr = explode(" ", $text);
	    $new_arr = array_slice($arr, 0, $limit);
	    return implode(" ", $new_arr);
	}
	function updateState($id, $state, $id_user,$tbl1,$tbl2){
		$sql = "UPDATE ".$tbl1." SET state = ".$state." WHERE id in (select id_show from ".$tbl2." where id_user = ".$id_user." and id_show = ".$id.");";
		return executeQuery($sql);
	}
	function deleteFK($id_user,$id_show,$tbl1,$tbl2){
		$sql = "DELETE FROM ".$tbl1." WHERE id_user = ".$id_user." AND id_show = ".$id_show;
		// echo $sql;
		if(executeQuery($sql)){
			return deleteShow($id_show,$tbl2); 
		}
	}
	function deleteShow($id_show,$tbl){
		$sql = "DELETE FROM ".$tbl." WHERE id = ".$id_show;
		return executeQuery($sql);
	}
	function deleteUser($id){
		$sql = "select id from shows where id in (select id_show from detail_user_show where id_user = ".$id.");";
		$result1 = getResult($sql);	//shows to delete
		$sql = "select id from movie where id in (select id_show from detail_user_movie where id_user = ".$id.");";
		$result2 = getResult($sql);

		$sql = "delete from detail_user_show where id_user = ".$id; //ok
		executeQuery($sql);
		$sql = "delete from detail_user_movie where id_user = ".$id; //ok
		executeQuery($sql);
		/********************/
		while($row = $result1->fetch_assoc()){
			$sql = "delete from shows where id = ".$row['id'];
			executeQuery($sql);
		}
		while ($row = $result2->fetch_assoc()) {
			$sql = "delete from movie where id = ".$row['id'];
			executeQuery($sql);
		}
		/********************/
		$sql = "delete from user where id = ".$id; //ok
		executeQuery($sql);
	}
	function getFirstWatching($id_user,$type,$id_show){
		$sql = "";
		if($id_show == -1){
			$sql = "SELECT id,name,rating,img,season,episode FROM shows WHERE state = 0 and type='".$type."' and id in (select id_show from detail_user_show where id_user = ".$id_user.") order by name limit 1";
		}else{
			if(!is_string($id_show)){
				$sql = "SELECT id,name,rating,img,season,episode FROM shows WHERE state = 0 and type='".$type."' and id in (select id_show from detail_user_show where id_user = ".$id_user." and id_show = ".$id_show.");";
			}else{
				//search for a show
				$id_show = filterString($id_show);
				$sql = "SELECT id,name,rating,img,season,episode FROM shows WHERE state = 0 and type='".$type."' and name like '%".$id_show."%' and id in (select id_show from detail_user_show where id_user = ".$id_user.") order by name limit 1;";
			}
		}
		$conn = getConnection();
		return mysqli_query($conn,$sql);	//virtual table
	}
	function getShowWatching($id_user,$type,$name){	//all shows from user: $id_user
		$sql = "";
		if(empty($name)){
			$sql = "SELECT id,name,rating,img,sinopsis,date_last_see,season,episode FROM shows WHERE state = 0 and type = '".$type."' and id in (select id_show from detail_user_show where id_user = ".$id_user.") order by name";
		}else{
			$name = filterString($name);
			$sql = "SELECT id,name,rating,img,sinopsis,date_last_see,season,episode FROM shows WHERE state = 0 and type = '".$type."' and name like '%".$name."%' and id in (select id_show from detail_user_show where id_user = ".$id_user.") order by name";
		}
		return getResult($sql);
	}
	function getFec(){
		$today = getdate();	//return an array
		return $today['year']."-".$today['mon']."-".$today['mday'];
	}
	function getLastSee($fec){
		if(empty($fec)){
			return " 0";
		}else{
			$date1 = date_create($fec);
			$date2 = date_create(getFec());
			$diff = date_diff($date1,$date2);
			return $diff->format("%r%a");
		}
	}
	/*******************************************************************************/
	function getInfoDelete($id,$id_user){
		$sql = "SELECT id,name,img,rating FROM shows WHERE id in (select id_show from detail_user_show where id_user = ".$id_user." and id_show = ".$id.");";
		return getRow($sql);	//return a row
	}

	function getInfoDeleteMovie($id,$id_user){
		$sql = "SELECT id,name,img,rating FROM movie WHERE id in (select id_show from detail_user_movie where id_user = ".$id_user." and id_show = ".$id.");";
		return getRow($sql);	//return a row
	}

	/*******************************************************************************/
	function getInfoEdit($id,$id_user){
		$sql = "SELECT id,name,rating,type,img,sinopsis FROM shows WHERE id in (select id_show from detail_user_show where id_user = ".$id_user." and id_show = ".$id.");";
		return getRow($sql);	//return a row
	}
	function getInfoEditMovie($id_user,$id_show){
		$sql = "select id,name,rating,img from movie where id in (select id_show from detail_user_movie where id_user = ".$id_user." and id_show = ".$id_show.");";
		return getRow($sql);
	}
	/*******************************************************************************/
	function getInfoFinish($id_user,$id_show){
		$sql = "SELECT id,name,img from shows where id in (select id_show from detail_user_show where id_user = ".$id_user." and id_show = ".$id_show.");";
		return getRow($sql);	//return a row
	}
	function getInfoFinishMovie($id_user,$id_show){
		$sql = "select id,name,img from movie where id in (select id_show from detail_user_movie where id_user = ".$id_user." and id_show = ".$id_show.");";
		return getRow($sql);
	}
	function getDetailMovie($id_user,$id_show){
		$sql = "select id,name,img,rating,comment,date from movie where id in (select id_show from detail_user_movie where id_user = ".$id_user." and id_show = ".$id_show.");";
		return getRow($sql);
	}
	/*******************************************************************************/
	function updateInfoShow($id_show,$id_user,$name,$rating,$img,$type,$sinopsis){
		$sql = "UPDATE shows SET 
			name = '".$name."',
			type = '".$type."',
			rating = ".$rating.",
			img = '".$img."',
			sinopsis = '".$sinopsis."'
			 WHERE id in (select id_show from detail_user_show where id_user = ".$id_user." and id_show = ".$id_show.");";
		return executeQuery($sql);
	}
	function updateInfoMovie($id_user,$id_show,$name,$rating,$img){
		$sql = "UPDATE movie SET 
			name = '".$name."',
			rating = ".$rating.",
			img = '".$img."'
			 WHERE id in (select id_show from detail_user_movie where id_user = ".$id_user." and id_show = ".$id_show.");";
		return executeQuery($sql);
	}
	/*******************************************************************************/

	function countShow($id_user, $state, $type){
		$sql = "SELECT count(*) FROM `shows` where state = ".$state." and type='".$type."' and id in (select id_show from detail_user_show where id_user = ".$id_user.")";
		$row = getRow($sql);
		return $row[0];
	}
	function updateChapter($id_user,$id_show,$season,$episode,$date){
		$sql = "UPDATE shows SET season= ".$season.", episode = ".$episode.", 
			date_last_see = '".$date."' where id in (select id_show from detail_user_show where id_user = ".$id_user." and id_show = ".$id_show.")";
		return executeQuery($sql);
	}
	/*******************************************************************************/
	function finishShow($id_user,$id_show,$rating,$date,$comment){
		$sql = "UPDATE shows SET state = 2, rating =".$rating.", date_finished = '".$date."', comment = '".$comment."' WHERE id in (SELECT id_show from detail_user_show WHERE id_user = ".$id_user." and id_show = ".$id_show.");";
		return executeQuery($sql);
	}
	function finishMovie($id_user,$id_show,$rating,$comment,$date){
		$sql = "update movie set state = 1, rating = ".$rating.", comment = '".$comment."', date = '".$date."' where id in (select id_show from detail_user_movie where id_user = ".$id_user." and id_show = ".$id_show.");";
		return executeQuery($sql);
	}
	/*******************************************************************************/
	function getFinish($id_user,$type,$search){
		$sql = "";
		if(empty($search)){
			$sql = "select id,name,rating,img,date_finished,comment from shows where state = 2 and type = '".$type."' and id in (select id_show from detail_user_show where id_user = ".$id_user.") order by name;";
			
		}else{
			$sql = "select id,name,rating,img,date_finished,comment from shows where state = 2 and type = '".$type."' and name like '%".$search."%' and id in (select id_show from detail_user_show where id_user = ".$id_user.") order by name;";
		}
		return getResult($sql);
	}
	function getFinishMovie($id_user,$search){
		$sql = "";
		if(empty($search)){
			$sql = "select id,name,rating,img,comment,date from movie where state = 1 and id in (select id_show from detail_user_movie where id_user = ".$id_user.");";
		}else{
			$sql = "select id,name,rating,img,comment,date from movie where name like '%".$search."%' and state = 1 and id in (select id_show from detail_user_movie where id_user = ".$id_user.");";
		}
		return getResult($sql);
	}
	/*******************************************************************************/
	function getMovies($id_user,$name){
		$sql = "";
		if(empty($name)){
			$sql = "select id,name,rating,img from movie where state = 0 and id in (select id_show from detail_user_movie where id_user = ".$id_user.") order by name;";
		}else{
			$sql = "select id,name,rating,img from movie where state = 0 and name like '%".$name."%' and id in (select id_show from detail_user_movie where id_user = ".$id_user.") order by name;";
		}
		return getResult($sql);
	}
	function editUser($id_user){
		$sql = "select username,email from user where id = ".$id_user;
		return getRow($sql);
	}
	function exitsUsername($name){
		$sql = "select username from user";
		$result = getResult($sql);
		while($row = $result->fetch_assoc()){
			if($row['username'] == $name){
				return false;	//the username already exits
			}
		}
		return true;	//the username not exists
	}
	function updateUser($id_user,$username,$email,$pass){
		$sql = "update user set username='".$username."', email='".$email."' where id = ".$id_user." and password = '".md5($pass)."';";
		if(executeQuery($sql)){
			$sql2 = "select username from user where id = ".$id_user;
			$row = getRow($sql2);
			if($row[0] == $username){
				return true;
			}
			return false;
		}
		return false;
	}
	function getSeries($id_user,$type,$state){
		$cad = "";
		$sql = "select name,season,episode from shows where type ='".$type."' and state = ".$state." and id in(select id_show from detail_user_show where id_user = ".$id_user.");";
		$result = getResult($sql);
		if(mysqli_num_rows($result) > 0){
			while($row = $result->fetch_assoc()){
				$cad .= $row['name'].": ".$row['season']."x".$row['episode']."<br />";
			}
			$arr = array('content' => $cad, 'number' => mysqli_num_rows($result));
		}else{
			$arr = array('content' => "", 'number' => mysqli_num_rows($result));
		}
		
		return $arr;
	}
	function getMovie($id_user,$state){
		$cad = "";
		$sql = "select name from movie where state = ".$state." and id in(select id_show from detail_user_movie where id_user = ".$id_user.");";
		$result = getResult($sql);
		if(mysqli_num_rows($result) > 0){
			while($row = $result->fetch_assoc()){
				$cad .= $row['name']."<br />";
			}
			$arr = array('content' => $cad, 'number' => mysqli_num_rows($result));
		}else{
			$arr = array('content' => "", 'number' => mysqli_num_rows($result));
		}
		return $arr;
	}
	function filterString($var){
		$var = str_replace("'","",$var);
		$var = str_replace("\"","",$var);
		return $var;
	}
	function getPriority($val){
		if($val > 0 && $val < 6){
			return $val;
		}
		$val = $val<1 ? 1 : $val;
		$val = $val>5 ? 5 : $val;
		return $val;
	}

	/*********************** SEND EMAIL ****************************************/
	function sendEmail($to, $title, $msg){
		error_reporting(-1);
		/* CONFIGURATION */
		$crendentials = array(
		    'email'     => 'agendatv2017@gmail.com',    //Your GMail adress. Google probably is going to block out this emaila, check you account and give permissions
		    'password'  => 'Medrano7502'               //Your GMail password
		    );

		/* SPECIFIC TO GMAIL SMTP */
		$smtp = array(

		// 'host' => 'smtp.gmail.com',
		'host' => 'ssl://smtp.gmail.com',
		// 'port' => 587,
		'port' => 465,
		'username' => $crendentials['email'],
		'password' => $crendentials['password'],
		// 'secure' => 'tls' //SSL or TLS
		'secure' => 'ssl' //SSL or TLS

		);
		/* TO, SUBJECT, CONTENT */
		// $to         = ''; //The 'To' field
		// $subject    = 'This is a test email sent with PHPMailer';
		// $content    = 'This is the HTML message body <b>in bold!</b>';

		$mailer = new PHPMailer();

		//SMTP Configuration
		$mailer->isSMTP();
		$mailer->SMTPDebug = 2;
		$mailer->SMTPAuth   = true; //We need to authenticate
		$mailer->Host       = $smtp['host'];
		$mailer->Port       = $smtp['port'];
		$mailer->Username   = $smtp['username'];
		$mailer->Password   = $smtp['password'];
		$mailer->SMTPSecure = $smtp['secure']; 

		//Now, send mail :
		//From - To :
		$mailer->From       = $crendentials['email'];
		$mailer->FromName   = 'AgendaTv'; //Optional
		$mailer->addAddress($to);  // Add a recipient

		//Subject - Body :
		$mailer->Subject        = $title;
		$mailer->Body           = $msg;
		$mailer->isHTML(true); //Mail body contains HTML tags

		//Check if mail is sent :
		if(!$mailer->send()) {
		    echo 'Error sending mail : ' . $mailer->ErrorInfo;
		    echo '<img src="../img/face.jpg">';
		    // return false;
		} else {
		    echo 'Message sent !';
		    return true;
		}

		// $cabeceras = 'From: sagonzalezll@ittepic.edu.mx' . "\r\n" .
		//     'Reply-To: sagonzalezll@ittepic.edu.mx' . "\r\n" .
		//     'X-Mailer: PHP/' . phpversion();
		// ini_set ( "SMTP", "smtp.gmail.com" );
		// return mail($to, $title, $msg, $cabeceras);
	}
?>