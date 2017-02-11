<div id="headerSlider" class="header__slider carousel slide" data-interval="5000" data-ride="carousel">
  
    <!--Menu Top container-->
    <div class="header__container-2 row">
      <div class="col-lg-1"></div>
      <div class="col-lg-9">
        <!--Top menu-->
        <nav class="header__menu header__menu-top">
          <ul class="header__menu-top-list nav navbar-nav col-xs-12">
            <?php foreach($allSections as $itemSection): ?>
              <?php if($itemSection['position'] == 1): ?>
                <li class="header__menu-top-item" data-id-section="<?= $itemSection['id']; ?>">
                  <a class="header__menu-top--link" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $itemSection['id']; ?>">
                    <?= $itemSection['name_'.$lang]; ?>
                  </a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </nav>
      </div>
      <!--swich lang-->
      <div class="header__lang-swich text-right col-lg-1">
        <a class="header__lang-swich--link" href="index.php?lang=ru<?= removeLangUrl($lang); ?>">ru</a>
        <a class="header__lang-swich--link" href="index.php?lang=en<?= removeLangUrl($lang); ?>">en</a>
      </div>
      <div class="col-lg-1"></div>
    </div>
    
    <div class="header__container-3 row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <!--News-->
        <div class="header__news">
          <div class="header__news-name-block"><?= $word[105]['name_'.$lang]; ?></div>
          <div class="header__news-title">
            <a class="header__news-title--link" href="index.php?lang=<?= $lang; ?>&id_section=2"><?= $lastNews[0]['name_'.$lang]; ?></a>
          </div>
          <div class="header__news-date text-right"><?= convertDate($lastNews[0]['date_create']); ?></div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
    
  <!-- Индикаторы для карусели -->
  <ol class="carousel-indicators">
    <!-- Перейти к 0 слайду карусели с помощью соответствующего индекса data-slide-to="0" -->
    <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
    <!-- Перейти к 1 слайду карусели с помощью соответствующего индекса data-slide-to="1" -->
    <li data-target="#headerSlider" data-slide-to="1"></li>
    <!-- Перейти к 2 слайду карусели с помощью соответствующего индекса data-slide-to="2" -->
    <li data-target="#headerSlider" data-slide-to="2"></li>
  </ol>   
  <!-- Слайды карусели -->
  <div class="carousel-inner">
    <!-- Слайды создаются с помощью контейнера с классом item, внутри которого помещается содержимое слайда -->
    <div class="active item">
       <img src="images/slider/1.jpg" alt="">
    </div>
    <!-- Слайд №2 -->
    <div class="item">
       <img src="images/slider/2.jpg" alt="">
    </div>
    <!-- Слайд №3 -->
    <div class="item">
       <img src="images/slider/4.jpg" alt="">
    </div>
  </div>
  <!-- Навигация для карусели -->
  <!-- Кнопка, осуществляющая переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
  <a class="carousel-control left" href="#headerSlider" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <!-- Кнопка, осуществляющая переход на следующий слайд с помощью атрибута data-slide="next" -->
  <a class="carousel-control right" href="#headerSlider" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>