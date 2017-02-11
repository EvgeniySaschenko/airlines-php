<?php
	$noticeNumberRetries = $_COOKIE['noticeNumberRetries'];
	setcookie('noticeNumberRetries', ' ', time()-3600);
	$noticeIssetUser = $_COOKIE['noticeIssetUser'];
	setcookie('noticeIssetUser', ' ', time()-3600);
	$noticeLoginPass = $_COOKIE['noticeLoginPass'];
	setcookie('noticeLoginPass', ' ', time()-3600);
	$noticeUserBlocked = $_COOKIE['noticeUserBlocked'];
	setcookie('noticeUserBlocked', ' ', time()-3600);
	//Загрузкаа файлов
	$noticeUploadsFile = $_COOKIE['noticeUploadsFile'];
	setcookie('noticeUploadsFile', ' ', time()-3600);
	$noticeUploadsFile = $_COOKIE['noticeUploadsFile'];
	setcookie('noticeUploadsFile', ' ', time()-3600);
	$noticeAddBook = $_COOKIE['noticeAddBook'];
	setcookie('noticeAddBook', ' ', time()-3600);
	$noticeAddChapter = $_COOKIE['noticeAddChapter'];
	setcookie('noticeAddChapter', ' ', time()-3600);
	$noticeAddRank = $_COOKIE['noticeAddRank'];
	setcookie('noticeAddRank', ' ', time()-3600);
	$noticeAddUser = $_COOKIE['noticeAddUser'];
	setcookie('noticeAddUser', ' ', time()-3600);
	$noticeAddTypeDoc = $_COOKIE['noticeAddTypeDoc'];
	setcookie('noticeAddTypeDoc', ' ', time()-3600);
	$noticeDocSent = $_COOKIE['noticeDocSent'];
	setcookie('noticeDocSent', ' ', time()-3600);
?>