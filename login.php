<?php
	session_start();
	if(!isset($_POST['session'])) {
		$user = array('name' => $_POST['username'],'pass' => md5($_POST['password']));
		$user['dir'] = 'users/'.$user['name'].'-'.$user['pass'].'/';
		if(!isset($_SESSION['logedin'])) {
			if (!file_exists($user['dir'].'/conf.php')) {
				mkdir($user['dir'].'uploads/', 0777, true);
				file_put_contents($user['dir'].'conf.php', serialize($user));
				
			} 
			$_SESSION = unserialize(file_get_contents($user['dir'].'/conf.php'));
			$_SESSION['logedin'] = true;
		}
	}
	
?>