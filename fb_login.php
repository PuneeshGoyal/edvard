<?php 
	require_once("init.php");
	require_once("config_db.php");
	require_once("config.php");
	//redirect_loggedin('group.php', $user_status);

	require_once("include/fb_connect.php");
	$tabl = "users";
	
	if($user){
		// chk if already registered
	 	$sql = "SELECT uniq from $tabl where fid='".$user_profile['id']."' and archived <> 1";
		$exec = mysql_query($sql);
		$num = mysql_num_rows($exec);
		
		if($num == 0){
			// register user here
			$fb_dvar['fid'] = $user_profile['id'];
			$fb_dvar['first_name'] = $user_profile['first_name'];
			$fb_dvar['last_name'] = $user_profile['last_name'];
			$fb_dvar['email'] = $user_profile['email'];
			$fb_dvar['password'] = $user_profile['password'];
			$_SESSION['fb'] = $fb_dvar;
			$fb_dvar['uniq']=random_generator(10);
			//header("Location:register.php");
			
			
			$sql = "insert into $tabl(fid, uniq, first_name, last_name, email, password,status, time) values('".$fb_dvar['fid']."','".$fb_dvar['uniq']."', '".$fb_dvar['first_name']."', '".$fb_dvar['last_name']."', '".$fb_dvar['email']."', '".$fb_dvar['password']."', '1', NOW())"; 
			if(mysql_query($sql)){
				header("Location:time_tap.php");	
			}
			else{
				//echo $sql;
				die(mysql_error());
			}
		}
		else{
			$dvar['fid'] = $user_profile['fid'];
			$fetch = mysql_fetch_assoc($exec);
			$dvar['uniq'] = $fetch['uniq'];
			//$_SESSION['uniq']=$dvar['uniq'];
			//login
			user_login($dvar['uniq']);
			header('location:time_tap.php');
		}
		
		
	}
	else { 
	  $loginUrl = $facebook->getLoginUrl(array('scope'=>'email,publish_stream,status_update'));
	 header("Location: $loginUrl");
      echo "If you don't get redirected automatically, Please Click <a href='$loginUrl' title='Click here to Login using facebook'>Login</a>";
	}
?>
