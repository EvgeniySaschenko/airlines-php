<?php
	include('general.php');
  # Шапка сайта
	include('templates/header.php');
?>
<div class="box-content box-content_<?= $currentSection[0]['type']; ?>">

  <?php 
    # Хлебные крошки
    include('templates/breadcrumb.php');
  ?>

  <?php 
    # Для главных страниц подразделений container-fluid
    if(!isset($_GET['id_news']) and !isset($_GET['id_subsection']) and !isset($_GET['action']) and $currentSection[0]['type'] == 'department') 
    {
      $classContainerFluid = '-fluid';
    }
  ?>
  
  <div class="content container<?= $classContainerFluid; ?>">
  <?php
  
    # Вход на сайт
    include('route/enter-site.php');

    # Закрытые разделы
    if(!empty($currentUser) and $_SESSION['check'] == codeSessionCheck($currentUser[0]['login'].$currentUser[0]['pass'].session_id()))
    {
      # Иконки управления
      $docMenuContent = selectDocMenuContent($getIdSection, $getIdSubsection, $getIdBook);
      include('templates/menu-content.php');

      # Главные страницы подразделений 
      include('route/division-department.php');

      # Управление сайтом 
      include('route/manage-site.php');

      # Новости
      include('route/news.php');

      # Ссылки
      include('route/links.php');

      # Просмотр профиля пользователя
      include('route/user.php');

      # Контроль
      include('route/control.php');

      # Отправить документ
      include('route/send-doc.php');

      # Отправленные документы
      include('route/sent-doc.php');

      # Разделы с документами
      include('route/doc-and-book.php');

      # ЛС-Задание на полет
      include('route/flight.php');

      # Экипажи
      include('route/crew.php');

      # Статистика
      include('route/statistics.php');
      
      # Авиационная безопасность
      include('route/aviation-security.php');
      
      # Контактная информация
      include('route/contact.php');
      
      # Оценка рисков
      include('route/pool.php');
    }
    
    # Добровольные сообщения
    include('route/voluntary-posts.php');
    
    # Главная
    include('route/home.php');
    
    
    $countVisitorsToday = selectCountVisitorsToday();
    $countVisitsToday = selectCountVisitsToday();
  ?>

    <?php
      if($_GET['action'] == "word") {
        include('templates/word.php');
      }
    ?>
  </div>
</div>
<?php include('templates/modal-notice.php'); ?>
<?php include('templates/modal-doc.php'); ?>
<?php include('templates/modal-auth.php'); ?>
<?php include('templates/a-modal-edit-doc.php'); ?>
<?php include('templates/a-modal-edit-doc-link.php'); ?>
<?php include('templates/footer.php'); ?>
