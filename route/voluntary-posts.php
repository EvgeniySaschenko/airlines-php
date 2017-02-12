<?php
		if($currentSection[0]['type'] == 'voluntary-posts')
		{
          if(!isset($_GET['action'])) {
            include('templates/voluntary-posts-send.php');
          }
		}
?>