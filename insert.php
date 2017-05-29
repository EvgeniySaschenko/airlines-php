<?php
	include('general.php');
	if
		(!empty($currentUser)
	and
		$_SESSION['check'] == codeSessionCheck($currentUser[0]['login'].$currentUser[0]['pass'].session_id())
	and
		strstr($_SERVER['HTTP_REFERER'], $_SERVER["HTTP_HOST"]))
	{
    # Разделы
    include('controller/insert/section.php');
    
    # Новости / ссылки
    include('controller/insert/news-links.php');
		
    # Книга (папка)
    include('controller/insert/book.php');
    
    # Глава
    include('controller/insert/chapter.php');

    # Отправить документ
    include('controller/insert/send-doc.php');

    # Добавить документ
    include('controller/insert/doc.php');
    
    # Должность
    include('controller/insert/rank.php');
		
    # Тип документа
    include('controller/insert/doc-type.php');
    
    # Пользователь
    include('controller/insert/user.php');
    
    # Экипаж
    include('controller/insert/crew.php');
    
    # Отчет о полете
    include('controller/insert/flight-assignment.php');
    
    # Название подразделения департамента
    include('controller/insert/division-department.php');

    # Пользователи департамента
    include('controller/insert/division-department-user.php');
    
    # Воздушное судно
    include('controller/insert/aircraft.php');
    
    # Права доступа пользователя
    include('controller/insert/user-peremission.php');
    
	}
    
    # БЕЗ АВТОРИЗАЦИИ!!!!!!!!!!!!!!!!!!
    # Добровольные сообщения
    include('controller/insert/voluntary-posts.php');
?>