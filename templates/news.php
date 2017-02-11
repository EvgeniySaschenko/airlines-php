<div class="news">
  <div class="news__current">
    <h1 class="title-page text-bold text-uppercase"> <?= $currentNews[0]['name_'.$lang]; ?> </h1>
    
    <?php if(!empty($currentNews[0]['extension'])): ?>
        <img class="news__cover" src="images/news/<?=$currentNews[0]['id'].'.'.$currentNews[0]['extension']?>">
    <?php endif; ?>
        
    <div class="news__content">
      <?= addParagraph($currentNews[0]['content_'.$lang]) ?>      
    </div>
        
    <?php if(!empty($currentNews[0]['link'])): ?>
        <a href="<?=$currentNews[0]['link']?>"  target="_blank"><?=$currentNews[0]['link']?></a>
    <?php endif; ?>
        
    <!--Документы-->
    <?php if(!empty($allDoc[0]['id'])): ?>
      <div class="news__current-doc">
        <table class="table table-striped">
         <caption class="text-bold"><?= $word[85]['name_'.$lang]; ?></caption>

         <tbody>
           <?php foreach($allDoc as $doc): ?>
            <?php if($doc['extension'] != 'jpg' and $doc['extension'] != 'jpeg' and $doc['extension'] != 'png'): ?>
             <tr class="doc-data"
               data-id-doc="<?= $doc['id']; ?>"
               data-id-section="<?= $doc['id_section']; ?>"
               data-id-subsection="<?= $doc['id_subsection']; ?>"
               data-date-uploads="<?= $doc['date_uploads']; ?>"
               data-date-end-doc="<?= $doc['date_end']; ?>"
               data-date-doc="<?= $doc['date_doc']; ?>"
               data-link-doc="<?= $doc['link']; ?>"
               data-id-sent-doc="0"
               data-name="<?= $doc['name_'.$lang]; ?>"
               data-doc-extension="<?= $doc['extension']; ?>">

               <td class="doc__download text-center">
                 <? if($doc['extension'] != 'mp4'): ?>
                  <?= linkDocDownload($doc['id_section'], $doc['id_subsection'], $doc['id'], 0) ?>
                 <? else: ?>
                  <a id="download0" class="download fa fa-film text-color-video" data-toggle="tooltip"></a>
                 <? endif; ?>
               </td>

               <td class="doc__name">
                 <div class="call-modal-doc cut-text" data-toggle="modal" data-target=".modal-doc">
                   <?= $doc['name_'.$lang]; ?>
                 </div>
               </td>
             </tr>
             <?php endif; ?>
           <?php endforeach; ?>
         </tbody>
       </table>
      </div>   
   <?php endif; ?>
    
    <!--Галлерея-->
    <div class="news__gallery">
      <?php foreach($allDoc as $img): ?>
        <?php if($img['extension'] == 'jpg' or $img['extension'] == 'jpeg' or $img['extension'] == 'png'): ?>
         <div class="news__gallery--item">
           <a data-lightbox="example-set" href="doc.php?lang=<?= $lang; ?>&id_section=<?= $img['id_section']; ?>&id_subsection=<?= $img['id_subsection']; ?>&id_doc=<?= $img['id']; ?>&action=view">
             <img src="doc.php?lang=<?= $lang; ?>&id_section=<?= $img['id_section']; ?>&id_subsection=<?= $img['id_subsection']; ?>&id_doc=<?= $img['id']; ?>&id_sent_doc=0action=view">
           </a>
         </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="news__list hidden-md hidden-sm hidden-xs">
    <h4><?= $word[255]['name_'.$lang]; ?></h4>
    <?php foreach($allNewsLast as $news): ?>
      <div class="news__list--item">
        <span class="news__list--item-time">
          <?= convertTime($news['date_create']); ?>
        </span>
        <a class="news__list--link" href="index.php?lang=<?=$_GET['lang'];?>&id_section=<?=$news['id_section'];?>&id_news=<?=$news['id'];?>#navBottom">
          <?= $news['name_'.$lang]; ?>
        </a>
        <div class="news__list--item-date">
          <?= convertDate($news['date_create']); ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>