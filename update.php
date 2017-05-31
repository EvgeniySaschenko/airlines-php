<?php
include('general.php');
//Отправить файл пользователю
if
	(!empty($currentUser)
and
	$_SESSION['check'] == codeSessionCheck($currentUser[0]['login'].$currentUser[0]['pass'].session_id())
and
	strstr($_SERVER['HTTP_REFERER'], $_SERVER["HTTP_HOST"]))
{
  
  # Задание на полёт - Права доступа
  $allUserFlight = selectAllUserFlight($getIdFlightAssignment);
  foreach($allUserFlight as $userFlight)
  {
    if($userFlight['id_user'] == $currentUser[0]['id'])
    {
      $permissionEditFlightGenerateDoc = $userFlight['id_user'];
      break;
    }
  }
  # Таблица рабочего времени экипажа
  include('controller/update/flight-operating-crew-time.php');
  
  # Воздушное судно
  include('controller/update/aircraft.php');
  
  # Добавить разделы
  include('controller/update/section.php');
  
  # Главная
  include('controller/update/home.php');
  
  # Новости / ссылки
  include('controller/update/news-links.php');

  # Книга
  include('controller/update/book.php');

  # Глава
  include('controller/update/chapter.php');  

  # Подтвердить изучение документа
  include('controller/update/studied-doc.php');  

  # Редактировать отправленый документ
  include('controller/update/sent-doc.php');  
  
  # Редактировать документ
  include('controller/update/doc.php');  
  
  # Загрузить документ
  include('controller/update/doc-upload.php');  
  
  # Редактировать сортировка документов в Разделе / Книге
  include('controller/update/doc-sort.php'); 

  # Редактировать раздел
  include('controller/update/edit-section.php');  

  # Редактировать должность
  include('controller/update/rank.php');  
  
  # Редактировать тип документа
  include('controller/update/doc-type.php'); 

  # Редактировать пользователя
  include('controller/update/user.php'); 
  
  # Редактировать экипаж 
  include('controller/update/crew.php'); 
  
	# Создать задание на полет
  include('controller/update/flight-assignment-add.php'); 
  
	# Удалить задание на полет
  include('controller/update/flight-delete.php'); 
  
	# Редактировать задание на полет
  include('controller/update/flight-assignment-edit.php'); 
  
	# Редактировать отчет о полёте
  include('controller/update/flight-assignment-edit.php'); 
  
	# Редактировать отчет о полёте
  include('controller/update/flight-report.php'); 
  
	# Редактировать отчет о полёте (Для заметок)
  include('controller/update/flight-report-notes.php'); 
  
	# Редактировать летный Экипаж
  include('controller/update/user-assignment-flight.php'); 
  
	# Редактировать взлёты и заходы в аеропортах
  include('controller/update/flight-takeoff-approach.php'); 
  
	# Предварительная подготовка
  include('controller/update/flight-preparing.php'); 
  
	# Обновить Подразделения раздела
  include('controller/update/division-department.php'); 
  
    # Главные настройки сайта
  include('controller/update/general-site-settings.php'); 
  
    # Добровольные сообщения
  include('controller/update/voluntary-posts.php'); 
  
    # Права доступа пользователя
  include('controller/update/user-peremission.php'); 
  
  # Обновить всех пользователей
  include('controller/update/users-all.php'); 

}
?>
