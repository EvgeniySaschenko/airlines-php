<?php
	include('general.php');
	//Вход
	if(!empty($_GET['enter']) and strstr($_SERVER['HTTP_REFERER'], $_SERVER["HTTP_HOST"]))
	{
		$login = clearStr($_POST['login']);
		$pass = codePass($_POST['pass']);
		$currentUser = selectUserСurrent($login, $pass);
		$numberRetries = selectUserLogin($login);
        # Если вход в систему успешный
		if(!empty($currentUser) and $currentUser[0]['number_retries'] < 10)
		{
			# Обновляем дату входа на сайт, сбрасываем счетчик неудачных попыток
			$login = clearStr($currentUser[0]['login']);
			$dateEntered = date("Y-m-d H:i:s");
			$numberRetries = 0;
			updateUserLogin($login, $dateEntered, $numberRetries, $currentUserIp, $currentUserAgent);
			$currentUser = selectUserСurrent($login, $pass);
			$_SESSION['login'] = $currentUser[0]['login'];
			$_SESSION['pass'] = $currentUser[0]['pass'];
			$_SESSION['check'] = codeSessionCheck($currentUser[0]['login'].$currentUser[0]['pass'].session_id());
			//Обновляем статистику посещений
			insertVisitor($currentUser[0]['id'], $currentUserIp, $currentUserAgent);
		}
        # Если вход в систему не успешный но попытки еще есть
		else if($numberRetries[0]['number_retries'] < 10)
		{
			$login = clearStr($_POST['login']);
			$dateEntered = 0;
			$numberRetries = $numberRetries[0]['number_retries'] + 1;
			updateUserLogin($login, $dateEntered, $numberRetries, $currentUserIp, $currentUserAgent);
			SetCookie('noticeLoginPass', $langNotRightLoginPass);
			SetCookie('noticeNumberRetries', $langLeftLogonAttempts.' '.$numberRetries);
            # Осталось попыток
            $ancor = '#noticeUserLeftLoginAttempts'.(10 - $numberRetries);
            # Блокировать пользователя если использовано 5 попыток
            if($numberRetries == 10) {
              $ancor = '#noticeUserLocked';
            }
		}
        # Если попыток уже не осталось - Блокировать пользователя
		elseif($numberRetries[0]['number_retries'] == 10)
		{
          $ancor = '#noticeUserLocked';
		}
	}
	if(!empty($_GET['exit']))
	{
		//Обновляем дату входа на сайт, сбрасываем счетчик неудачных попыток
		$login = clearStr($_SESSION['login']);
		$dateEntered = 0;
		$numberRetries = 0;
		updateUserLogin($login, $dateEntered, $numberRetries, $currentUserIp, $currentUserAgent);
		unset($_SESSION['login']);
		unset($_SESSION['pass']);
		unset($_SESSION['check']);
	}
  
	if(strstr($_SERVER['HTTP_REFERER'], $_SERVER["HTTP_HOST"]))
		header('location: '.$_SERVER['HTTP_REFERER'].$ancor);
	else
		header('location: http://'.$_SERVER['HTTP_HOST'].$ancor);

?>
