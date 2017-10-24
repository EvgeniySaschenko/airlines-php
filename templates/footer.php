    <div class="box-footer">
      <div class="footer container">
        <!--Верх-->
        <div class="footer__top-container row"> 
          
          <div class="col-lg-1 hidden-md hidden-sm hidden-xs"></div>
          <!--Правая часть-->
          <div class="footer__container-left col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <!--Лого-->
            <div class="footer__logo">
              <img src="images/logo.png" alt="logo"> 
              <div class="footer__logo-text">
                MAXIMUS AIRLINES
              </div>
            </div>
          </div>

          <!--Левая часть-->
          <div class="footer__container-right col-lg-6 hidden-md hidden-sm hidden-xs">
            <!--Навигация-->
            <nav class="footer__nav-top">
              <ul class="footer__nav-top-list nav navbar-nav">
                <?php foreach($allSections as $itemSection): ?>
                  <?php if($itemSection['position'] == 1): ?>
                    <li class="footer__nav-top-item" data-id-section="<?= $itemSection['id']; ?>">
                      <a class="footer__nav-top--link" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $itemSection['id']; ?>#navBottom">
                        <?= $itemSection['name_'.$lang]; ?>
                      </a>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </nav>

          </div>
          <div class="col-lg-1 hidden-md hidden-sm hidden-xs"></div>
          
        </div>
        
      <!--Колонка с разделами сайта--> 
      <div class="footer__center-container row">
        <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
        <!--Навигация-->
        <div class="footer__nav-bottom col-lg-4 col-md-4 col-sm-4 hidden-xs">
          <nav>
            <ul class="footer__nav-bottom-list">
              <?php foreach($allSections as $itemSection): ?>
                <?php if($itemSection['position'] == 0): ?>
                  <li class="footer__nav-bottom-list-item" data-id-section="<?= $itemSection['id']; ?>">
                    <a class="footer__nav-bottom--link" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $itemSection['id']; ?>#navBottom">
                      <?= $itemSection['name_'.$lang]; ?>
                    </a>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </nav> 
          <!--Счетчик-->  
          <div class="footer__counter">
            <div class="footer__counter-visitors">
              <div class="footer__counter-visitors--mame">
                <?= $word[286]['name_'.$lang]; ?>: 
              </div>
              <div class="footer__counter-visitors--count">
                <?= $countVisitorsToday; ?>
              </div>
            </div>
            <div class="footer__counter-visits">
              <div class="footer__counter-visits--mame">
                <?= $word[287]['name_'.$lang]; ?>: 
              </div>
              <div class="footer__counter-visits--count">
                <?= $countVisitsToday; ?>
              </div>
            </div>
          </div>
        </div>
        
        <!--Контакты Эмираты-->
        <div class="footer__contacts-uae col-lg-3 col-md-3 col-sm-3 hidden-xs">
          <ul class="footer__contacts-uae-list">
            <li class="footer__contacts-uae-list--item footer__contacts-uae-list--item-header">Company Headquarters</li>
            <li class="footer__contacts-uae-list--item"><span class="text-bold">PO Box: </span>35367, Abu Dhabi, U.A.E </li>
            <li class="footer__contacts-uae-list--item"><span class="text-bold">Tel: </span>+971 2 419 8666</li>
            <li class="footer__contacts-uae-list--item"><span class="text-bold">Fax: </span>+971 2 447 4901</li>
            <li class="footer__contacts-uae-list--item">info@maximus.aero</li>
            <li class="footer__contacts-uae-list--item">info@maximus-air.com</li>
            <li class="footer__contacts-uae-list--item footer__contacts-uae-list--item-header footer__contacts-uae-list--item-commercial-enquiries">Commercial enquiries</li>
            <li class="footer__contacts-uae-list--item">commercial@maximus.aero</li>
            <li class="footer__contacts-uae-list--item">commercial@maximus-air.com</li>
            <li class="footer__contacts-uae-list--item footer__contacts-uae-list--item-location-map">
              <span class="text-bold">Location map: </span>
              <a class="footer__contacts-uae-list--item-location-map--link" target="_blank" href="/public/maximus_map.pdf">
                PDF format
              </a>
            </li>
          </ul>
        </div> 
        
        <!--Контакты Украина-->
        <div class="footer__contacts-ukr col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <ul class="footer__contacts-uae-list">
            <li class="footer__contacts-uae-list--item footer__contacts-uae-list--item-header">Ukraine office</li>
            <li class="footer__contacts-uae-list--item"><span class="text-bold">Tel: </span>+38 044 227 91 03</li>
            <li class="footer__contacts-uae-list--item"><span class="text-bold">Fax: </span>+38 044 538 02 34</li>
            <li class="footer__contacts-uae-list--item footer__contacts-uae-list--item--mail--maximus-airlines">office@maximus-airlines.com</li>
            <li class="footer__contacts-uae-list--item footer__logo-creators hidden-xs">
              <!--Дизайн-->
              <a class="footer__logo-design--link" target="_blank" href="https://www.facebook.com/dennis.putiy" data-toggle="tooltip" title="Дизайн ★ Денис Путий">
                <img class="footer__logo-design--img" src="images/desegn-logo.jpg">
              </a>
              <!--Разработка-->
              <div class="footer__box-logo-developer--link">
                <a class="footer__logo-developer--link" href="#" data-toggle="tooltip" title="Разработка ★ Евгений Сащенко +38 093 459 62 41 evgeniy.saschenko@gmail.com">
                </a>
              </div>
            </li> 
            <li class="footer__contacts-uae-list--item footer__contacts-uae-list--item-copyright">
              Copyright 2016 © Maximus Airlines.  All rights reserved.
            </li> 
          </ul>
        </div> 
        <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
      </div>
      </div>
    </div>

    <script type="text/javascript" src="/public/modules/jquery.min.js"></script>
    <script type="text/javascript" src="/public/modules/jqueryrotate.2.1.js"></script>
    <script type="text/javascript" src="/public/modules/jquery.textchange.js"></script>
    <script type="text/javascript" src="/public/modules/jquery.dotdotdot.min.js"></script>
    <script type="text/javascript" src="/public/modules/tablesorter/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="/public/modules/moment.min.js"></script>
    <script type="text/javascript" src="/public/modules/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="/public/modules/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="/public/modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/public/modules/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/public/modules/lightbox/js/lightbox.min.js"></script>
    <script type="text/javascript" src="/public/modules/spruto-player/player.js?3"></script>
    <script type="text/javascript" src="/public/modules/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="/public/js/app.js?version=<?= $_SESSION['check']; ?>17"></script>
  </body>
</html>
