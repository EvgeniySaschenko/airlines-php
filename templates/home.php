<div class="home__logo-company">
   <img class="home__logo-company--img" src="images/logo.png"> 
</div> 

<h1 class="home__title-page title-page text-center text-uppercase text-bold"> <?= $allNews[0]['name_'.$lang]; ?> </h1>



<div class="home__box-director">
   <img class="home__director--img" src="images/news/<?= $allNews[0]['id'].'.'.$allNews[0]['extension']?>"> 
</div> 

<div class="home__content" data-status="hidden">
  <?= addParagraph($allNews[0]['content_'.$lang]) ?> 
</div>
  
<!-- Кнопка показать контент -->
<div class="home_btn-show-content"></div>
<!-- Линия под контентом -->
<div class="home_line-content"></div>
  
<div class="home__care-by-air">
  <img class="home__care-by-air--img" src="/images/care-by-air.png">
  <div class="home__care-by-air--text">
    <div> care by air </div> 
    a helping from the UAE
  </div>
</div>



<!-- Сертификаты -->
<div class="home__certificate">
  <?php foreach($allDoc as $img): ?>
    <?php if($img['extension'] == 'jpg' or $img['extension'] == 'jpeg' or $img['extension'] == 'png'): ?>
     <div class="home__certificate--item">
       <a data-lightbox="example-set" href="doc.php?lang=<?= $lang; ?>&id_section=<?= $img['id_section']; ?>&id_subsection=<?= $img['id_subsection']; ?>&id_doc=<?= $img['id']; ?>&action=view">
         <img src="doc.php?lang=<?= $lang; ?>&id_section=<?= $img['id_section']; ?>&id_subsection=<?= $img['id_subsection']; ?>&id_doc=<?= $img['id']; ?>&action=view">
       </a>
     </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>