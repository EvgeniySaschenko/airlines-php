<?php
		if
			($currentSection[0]['type'] == 'voluntary-posts')
		{
			if($_GET['action'] == 'voluntary_posts')
			{
              
              // Добавление в БД
              $idSection = $getIdSection;
              $idSubsection = $getIdSubsection;
              $idDepartment = clearInt($_POST['id_department']);
              $nameRu = clearStr($_POST['name_ru']);
              $nameEn = $nameRu;
              $contentRu = clearStr(str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $_POST['content_ru']));
              $contentEn = $contentRu;
              $mail = clearStr($_POST['mail']);
              $userName = clearStr($_POST['user_name']);
              $numberFlight = clearStr($_POST['number_flight']);
              $routeFlight = clearStr($_POST['route_flight']);
              
              $ip = $currentUserIp;
              $userAgent = $currentUserAgent;
      
              $idVoluntaryPosts = insertVoluntaryPosts($idSection, $idSubsection, $idDepartment, $nameRu, $nameEn, $contentRu, $contentEn, $mail, $userName, $numberFlight, $routeFlight, $ip, $userAgent);	
        
              
          // Отправка на маил

          if($idVoluntaryPosts) {
            
            $protocol = strstr($_SERVER['HTTP_REFERER'], 'https://');
            if($protocol) {
              $protocol = 'https://';
            } else {
              $protocol = 'http://';
            }
              // Удаление пробелов между E-mail
              $mailsVoluntaryPosts = str_replace(" ","",$GENERAL_SITE_SETTINGS[0]['mails_voluntary_posts']);
              // Создание массива E-mail 
              $arrMail = explode(",", $mailsVoluntaryPosts);

               $subject = 'Voluntary posts '.$_SERVER['SERVER_NAME'].' - '.$nameRu; 
               $message = "Hello,\n". 
                       "It's a new message with the content:\n".
                       $contentRu." ".$mail."\n To get acquainted with him, go to the link\n".
                       $protocol.$_SERVER['SERVER_NAME']."/index.php?lang=".$_GET['lang']."&id_section=".$getIdSection."&id_news=".$idVoluntaryPosts;
                  
               $headers = "From: doc <doc@".$_SERVER['SERVER_NAME'].">";
  
               foreach($arrMail as $itemMail){
                 $to = $itemMail;
                  mail($to, $subject, $message, $headers); 
               }
               
          }
          

              
              
              if($idVoluntaryPosts)
              {
                $ancor = '#noticeAddVoluntaryPostsSend';
              }
              else 
              {
                $ancor = '#noticeErrorAddVoluntaryPostsSend';
              }

              redirect($ancor);

            }
        }
?>