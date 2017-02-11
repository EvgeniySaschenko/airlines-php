<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/public/modules/normalize.css">
    <link rel="stylesheet" href="/public/modules/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="/public/modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/modules/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/public/modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/modules/lightbox/css/lightbox.css">
    <link rel="stylesheet" href="/public/modules/tablesorter/styles.css">
    <link rel="stylesheet" href="/public/css/styles.css">
    <title><?= $currentSection[0]['name_'.$lang].' '.$currentSubsection[0]['name_'.$lang]; ?></title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif] -->
  </head>
  <body
  data-lang="<?= $lang; ?>"
  data-permission-edit-section="<?php if($permissionEditSection): echo md5($permissionEditSection); endif;?>"
  data-permission-edit-subsection="<?php if($permissionEditSubsection): echo md5($permissionEditSubsection); endif;?>"
  data-permission-manage-users="<?php if($permissionManageUsers): echo md5($permissionManageUsers); endif;?>"
  data-permission-read-personal-doc="<?php if($permissionReadPersonalDoc): echo md5($permissionReadPersonalDoc); endif;?>"
  data-permission-manage-site="<?php if($permissionManageSite): echo md5($permissionManageSite); endif;?>"
  data-permission-assignment-flight="<? if($permissionAssignmentFlight): echo md5($permissionAssignmentFlight); endif;?>"
  data-current-id-user="<?= $currentUser[0]['id']; ?>"
  data-current-id-section="<?= $currentSection[0]['id']; ?>"
  data-current-id-subsection="<?= $currentSubsection[0]['id']; ?>"
  data-current-id-book="<?= $currentBook[0]['id']; ?>"
  data-result-query="">
    <header class="header container">
      <!--Top container-->
      <div class="header__box-top-1 row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <!--Logo Title-->
          <div class="box col-lg-6">
            <img class="header__logo" src="images/logo.png" alt="logo">
            <span class="header__title">Maximus Airlines</span>
          </div>
          <div class="box col-lg-6 text-right">
            <!--User-->
            <?php if(!empty($currentUser[0]['id'])): ?>
              <div class="container__user">
                <div class="header__user">
                  <div class="header__user-link">
                    <?= linkUser($currentUser[0]['id_section'], $currentUser[0]['id'], $currentUser[0]['last_name_'.$lang], $currentUser[0]['name_'.$lang], $currentUser[0]['first_name_'.$lang]); ?>
                    <div class="header__box-user-photo">
                      <img src="<?= linkPhotoUser($currentUser[0]['id'], $currentUser[0]['extension']); ?>" alt="<?= $word[103]['name_'.$lang]; ?>" class="header__user-img img-circle">
                    </div>
                  </div>
                  <a href="authorization.php?exit=exit">
                    <?= $word[104]['name_'.$lang]; ?>
                  </a>
                </div>
              </div>
            <?php endif; ?>

            <!--Auth. form-->
            <?php if(empty($currentUser[0]['id'])): ?>
              <form class="header__form-auth form-inline" action="authorization.php?enter=enter" method="post">
                <div class="form-group">
                  <input name="login" type="text" class="form-control header__form-auth-field header__form-auth-field--login" placeholder="<?= $langLogin; ?>">
                </div>
                <div class="form-group">
                  <input name="pass" type="password" class="form-control header__form-auth-field header__form-auth-field--pass" placeholder="<?= $langPass; ?>">
                </div>
                <button name="enter" type="submit" class="header__form-auth-btn--submit btn btn-success"><?= $langEnter; ?></button>
              </form>
            <?php endif; ?>
          </div>

        </div>
        <div class="col-lg-1"></div>
      </div>
      
      <div class="header__line-flag row">
        <div class="header__line-flag-item header__line-flag--green col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
        <div class="header__line-flag-item header__line-flag--black col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
        <div class="header__line-flag-item header__line-flag--red col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
      </div>
      
      <?php include('templates/header-slider.php'); ?>
      
    <!--Both menu-->
      <nav class="header__menu header__menu-bottom row">
        <div class="col-lg-1"></div>
        <ul class="header__menu-bottom-list nav navbar-nav col-xs-12 col-lg-10 row">
          <?php foreach($allSections as $itemSection): ?>
            <?php if($itemSection['position'] == 0): ?>
              <li class="header__menu-bottom-list-item col-lg-2" data-id-section="<?= $itemSection['id']; ?>">
                <span class="icon-section text-right"></span>
                <a class="header__menu-bottom--link" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $itemSection['id']; ?>">
                  <?= $itemSection['name_'.$lang]; ?>
                </a>
                <!--Both submenu-->
                <?php if($itemSection['count_subsection'] > 0): ?>
                  <ul class="header__submenu-bottom-list">
                    <?php foreach($allSubsections as $itemSubsections): ?>
                      <?php if($itemSection['id'] == $itemSubsections['id_section']): ?>
                        <li class="header__submenu-bottom-item" data-id-subsection="<?= $itemSubsections['id']; ?>">
                          <a class="header__submenu-bottom--link" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $itemSubsections['id_section']; ?>&amp;id_subsection=<?= $itemSubsections['id']; ?>">
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
        <div class="col-lg-1"></div>
      </nav>
    </header>
