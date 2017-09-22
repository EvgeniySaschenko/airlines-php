<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="/public/modules/normalize.css">
    <link rel="stylesheet" href="/public/modules/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="/public/modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/modules/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/public/modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/modules/lightbox/css/lightbox.css">
    <link rel="stylesheet" href="/public/modules/tablesorter/styles.css">
    <link rel="stylesheet" href="/public/css/styles.css?<?= intval(microtime(1)) ?>">
    <link rel="shortcut icon" href="images/icon.ico" type="image/ico">
    <title><?= $currentSection[0]['name_'.$lang].' '.$currentSubsection[0]['name_'.$lang]; ?></title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif] -->
  </head>
  <body
  class="body__<?= $currentSection[0]['type']; ?>"     
  data-lang="<?= $lang; ?>"
  data-permission-sesion="<?php if($_SESSION['check']): echo md5($_SESSION['check']); endif;?>"
  data-permission-edit-section="<?php if($permissionEditSection): echo md5($permissionEditSection); endif;?>"
  data-permission-edit-subsection="<?php if($permissionEditSubsection): echo md5($permissionEditSubsection); endif;?>"
  data-permission-manage-users="<?php if($permissionManageUsers): echo md5($permissionManageUsers); endif;?>"
  data-permission-read-personal-doc="<?php if($permissionReadPersonalDoc): echo md5($permissionReadPersonalDoc); endif;?>"
  data-permission-manage-site="<?php if($permissionManageSite): echo md5($permissionManageSite); endif;?>"
  data-permission-assignment-flight="<? if($permissionAssignmentFlight): echo md5($permissionAssignmentFlight); endif;?>"
  data-current-id-user="<?= $currentUser[0]['id']; ?>"
  data-current-type-section="<?= $currentSection[0]['type']; ?>"
  data-current-id-section="<?= $currentSection[0]['id']; ?>"
  data-current-id-subsection="<?= $currentSubsection[0]['id']; ?>"
  data-current-id-book="<?= $currentBook[0]['id']; ?>"
  data-doc-days-red="<?= $GENERAL_SITE_SETTINGS[0]['doc_days_red']; ?>"
  data-doc-days-orange="<?= $GENERAL_SITE_SETTINGS[0]['doc_days_orange']; ?>"
  data-risk-assessment="<?= $GENERAL_SITE_SETTINGS[0]['risk_assessment']; ?>"
  data-result-query="">
<div class="box-header">    
  <header class="header">
    
    <div class="header__notice notice">
      <!--Пользователь заблокирован-->
      <div data-notice="#noticeUserLocked" data-ancor="noticeUserLocked" class="alert alert-danger hidden" role="alert">
        <?= $word[164]['name_'.$lang]; ?>
          <br>
        <?= $word[516]['name_'.$lang].' '.$GENERAL_SITE_SETTINGS[0]['mail_admin']; ?> 
      </div>
      <!--Осталось попыток входа-->
      <?php for($i = 10; $i != 0; $i--): ?>
      <div data-notice="#noticeUserLeftLoginAttempts<?= $i; ?>" data-ancor="noticeUserLeftLoginAttempts<?= $i; ?>" class="alert alert-danger hidden" role="alert">
        <?= $word[282]['name_'.$lang]; ?> <?= $i; ?>
          <br>
        <?= $word[516]['name_'.$lang].' '.$GENERAL_SITE_SETTINGS[0]['mail_admin']; ?> 
      </div>
      <?php endfor; ?>
    </div>
    
      <!-- Пользователь -->
      <div class="box-header__user container"> 
        <div class="header__user"> 
            
          <?php if(!empty($currentUser[0]['id'])): ?>
            <span class="header__user-name"><?= $langYouAreLoggedInAs ?>
              <?= linkUser($currentUser[0]['id_section'], $currentUser[0]['id'], $currentUser[0]['last_name_'.$lang], $currentUser[0]['name_'.$lang], $currentUser[0]['first_name_'.$lang]); ?> 
            </span>
            <?php if($currentUser[0]['count_not_studied_doc'] > 0)
            {
              $currentUserCountNotStudiedDoc = 'text-orange';
            }
            ?>
            <span class="fa fa-envelope <?= $currentUserCountNotStudiedDoc; ?>"></span>
            <?= $currentUser[0]['count_not_studied_doc']; ?>
          <?php endif; ?>
            
          <!--Кнопка вызова формы автроризации-->
          <div class="header__button-auth hidden-lg">
            <?php if(empty($currentUser[0]['id'])): ?>
              <button type="button" class="header__button-call-auth btn btn-default btn-xs" data-toggle="modal" data-target=".modal-auth"><?= $word[3]['name_'.$lang]; ?></button>
            <?php else: ?>
              <span class="header__button-call-auth btn btn-default btn-xs">
                <a href="authorization.php?exit=exit"><?= $word[271]['name_'.$lang]; ?></a>
              </span>
            <?php endif; ?>
          </div>
          
        </div>
      </div>


    
    <!-- Лого + Навигация + Вход -->
    <div class="header__top-container container"> 
        <!--Левая часть-->
        <div class="header__container-left col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <!--Лого-->
          <div class="header__logo">
            <img src="images/logo.png" alt="logo"> 
            <div class="header__logo-text">
              MAXIMUS AIRLINES
            </div>
          </div>
        </div>
        
        <!--Правая часть-->
        <div class="header__nav header__container-right col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <!--Навигация-->
          <nav class="header__nav-top container-fluid">
            <ul class="header__nav-top-list">
              <?php foreach($allSections as $itemSection): ?>
                <?php if($itemSection['position'] == 1): ?>
                  <li class="header__nav-top-item" data-id-section="<?= $itemSection['id']; ?>">
                    <a class="header__nav-top--link" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $itemSection['id']; ?>#navBottom">
                      <?= $itemSection['name_'.$lang]; ?>
                    </a>
                      <!--Top submenu-->
                      <?php if($itemSection['count_subsection'] > 0): ?>
                        <ul class="header__subnav-top-list">
                          <?php foreach($allSubsections as $itemSubsections): ?>
                            <?php if($itemSection['id'] == $itemSubsections['id_section']): ?>
                              <li class="header__subnav-top-list-item" data-id-subsection="<?= $itemSubsections['id']; ?>">
                                <a class="header__subnav-top--link" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $itemSubsections['id_section']; ?>&amp;id_subsection=<?= $itemSubsections['id']; ?>#navBottom">
                                  <?= $itemSubsections['name_'.$lang]; ?>
                                </a>
                              </li>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </ul>
                      <?php endif; ?>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </nav>
          
          <!--Кнопка вызова формы автроризации-->
          <div class="header__button-auth hidden-md hidden-sm hidden-xs">
            <?php if(empty($currentUser[0]['id'])): ?>
              <button type="button" class="header__button-call-auth btn btn-default btn-xs" data-toggle="modal" data-target=".modal-auth"><?= $word[3]['name_'.$lang]; ?></button>
            <?php else: ?>
              <span class="header__button-call-auth btn btn-default btn-xs">
                <a href="authorization.php?exit=exit"><?= $word[271]['name_'.$lang]; ?></a>
              </span>
            <?php endif; ?>
          </div>
          
          <!--swich lang-->
          <div class="header__lang-swich hidden-xs">
            <?php if($lang == 'ru'): ?>
              <a class="header__lang-swich--link header__lang-swich--link-1" href="index.php?lang=ru<?= removeLangUrl($lang); ?>">RU</a>
              <a class="header__lang-swich--link header__lang-swich--link-2" href="index.php?lang=en<?= removeLangUrl($lang); ?>">EN</a>
             <?php else: ?> 
              <a class="header__lang-swich--link header__lang-swich--link-1" href="index.php?lang=en<?= removeLangUrl($lang); ?>">EN</a>
              <a class="header__lang-swich--link header__lang-swich--link-2" href="index.php?lang=ru<?= removeLangUrl($lang); ?>">RU</a>
             <?php endif; ?> 
          </div>

        </div>
    </div>
    
    
  <!--Новости - если это не главная страница-->    
  <?php if($currentSection[0]['type'] != 'home'): ?>
    <div class="header__news_title container hidden-xs">
      <a class="header__news_title--link" href="index.php?lang=<?= $lang; ?>&id_section=<?= $lastNews[0]['id_section']; ?>&id_news=<?= $lastNews[0]['id']; ?>#navBottom">
         <span class="fa fa-calendar-check-o"></span> <span class="header__news_date"><?= convertDate($lastNews[0]['date_create']); ?></span> - 
            
         <?= $lastNews[0]['name_'.$lang]; ?> 
      </a>
    </div>
  <?php endif; ?>
    
    
<!--Слайдер только на Главной-->    
<?php if($currentSection[0]['type'] == 'home'): ?>
    <!--Слайдер-->
    <div class="header__slider carousel slide" id="header-slider" data-interval="5000" data-ride="carousel">
        <!-- Последняя новость -->
        <div class="box-header__slider-news container">
            <div class="header__slider-news col-lg-4 col-md-5 col-sm-7 hidden-xs">
                <div class="header__slider-news_name-block"><?= $word[105]['name_'.$lang]; ?></div>
                <!--Новость 1-->
                <div class="header__slider-news_head">
                  <div class="header__slider-news_title">
                    <a class="header__slider-news_title--link" href="index.php?lang=<?= $lang; ?>&id_section=<?= $lastNews[0]['id_section']; ?>&id_news=<?= $lastNews[0]['id']; ?>#navBottom">
                      <?= $lastNews[0]['name_'.$lang]; ?>
                    </a>
                  </div>
                  <div class="header__slider-news_date"><?= convertDate($lastNews[0]['date_create']); ?></div>
                  
                  <div class="header__slider-news_see">
                    <a href="index.php?lang=<?= $lang; ?>&id_section=<?= $lastNews[0]['id_section']; ?>#navBottom">
                      <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                  </div>
                </div>
            </div>
        </div>
        <!-- Индикаторы для карусели -->
        <ol class="carousel-indicators hidden-xs">
          <!-- Перейти к 0 слайду карусели с помощью соответствующего индекса data-slide-to="0" -->
          <li data-target="#header-slider" data-slide-to="0" class="active"></li>
          <!-- Перейти к 1 слайду карусели с помощью соответствующего индекса data-slide-to="1" -->
          <li data-target="#header-slider" data-slide-to="1"></li>
          <!-- Перейти к 2 слайду карусели с помощью соответствующего индекса data-slide-to="2" -->
          <li data-target="#header-slider" data-slide-to="2"></li>
          <!-- Перейти к 3 слайду карусели с помощью соответствующего индекса data-slide-to="3" -->
          <li data-target="#header-slider" data-slide-to="3"></li>
          <!-- Перейти к 5 слайду карусели с помощью соответствующего индекса data-slide-to="4" -->
          <li data-target="#header-slider" data-slide-to="4"></li>
        </ol>
        <!-- Фото -->
        <div class="carousel-inner">
            <!-- 1 -->
            <div class="active item">
                <img src="/images/header/00.jpg">
            </div>
            <!-- 2 -->
            <div class="item">
                <img src="/images/header/10.jpg">
            </div>
            <!-- 3 -->
            <div class="item">
                <img src="/images/header/2.jpg">
            </div>
            <!-- 4 -->
            <div class="item">
                <img src="/images/header/11.jpg">
            </div>
            <!-- 5 -->
            <div class="item">
                <img src="/images/header/8.jpg">
            </div>
        </div>
        
        <!-- Кнопка, осуществляющая переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
        <a class="carousel-control left hidden-md hidden-sm hidden-xs" href="#header-slider" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left header__slider-news--arrow-left"></span>
        </a>
        <!-- Кнопка, осуществляющая переход на следующий слайд с помощью атрибута data-slide="next" -->
        <a class="carousel-control right hidden-md hidden-sm hidden-xs" href="#header-slider" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right header__slider-news--arrow-right"></span>
        </a>
      
    </div>
<?php endif; ?>

    
<!--Навигация -->
<div class="header__nav box-header__nav-bottom header__nav-bottom--curent-section-<?= $currentSection[0]['type']; ?>">
  <nav role="navigation" class="header__nav-bottom navbar navbar-default container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" data-target="#header-nav-collapse" data-toggle="collapse" class="navbar-toggle header__nav--btn-burger">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--swich lang-->
      <div class="header__nav-bottom_lang-swich visible-xs">
          <a class="header__nav-bottom_lang-swich--link header__nav-bottom_lang-swich--link-1" href="index.php?lang=ru<?= removeLangUrl($lang); ?>">RU</a>
          <a class="header__nav-bottom_lang-swich--link header__nav-bottom_lang-swich--link-2" href="index.php?lang=en<?= removeLangUrl($lang); ?>">EN</a>
      </div>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="header-nav-collapse" class="collapse navbar-collapse header__nav-colapse">
          <ul class="header__nav-bottom-list nav navbar-nav">
            <?php foreach($allSections as $itemSection): ?>
              <?php if($itemSection['position'] == 0): ?>
                <li class="header__nav-bottom-list-item" data-id-section="<?= $itemSection['id']; ?>">
                  <span class="icon-section text-right hidden-xs"></span>

                  <a class="header__nav-bottom--link" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $itemSection['id']; ?>#navBottom">
                    <?= $itemSection['name_'.$lang]; ?>
                  </a>
                  
                  <!--Both submenu-->
                  <?php if($itemSection['count_subsection'] > 0): ?>
                    <ul class="header__subnav-bottom-list">
                      <?php foreach($allSubsections as $itemSubsections): ?>
                        <?php if($itemSection['id'] == $itemSubsections['id_section']): ?>
                          <li class="header__subnav-bottom-list-item" data-id-subsection="<?= $itemSubsections['id']; ?>">
                            <a class="header__subnav-bottom--link" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $itemSubsections['id_section']; ?>&amp;id_subsection=<?= $itemSubsections['id']; ?>#navBottom">
                              <?= $itemSubsections['name_'.$lang]; ?>
                            </a>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
    </div>
  </nav>
</div>
  </header>
</div>