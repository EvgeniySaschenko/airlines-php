<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>

<div class="links list-group" data-anchor-pagination="#linksList" id="linksList">
  <nav class="text-right">
    <ul class="pagination" data-page="<?= $_GET['page']; ?>">
        <li><span class="fa fa-arrows-h"></span></li>
      <?php for($i = 1; ceil($allNews[0]['count_news'] / 30) >= $i; $i++): ?>
        <li class="pagination__page" data-page="<?= $i - 1; ?>">
          <?php if(isset($_GET['page']) or $_GET['page'] === 0): ?>
            <a href="<?= substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '&page')); ?>&amp;page=<?= $i - 1; ?>"><?= $i;  ?></a>
          <?php else: ?>
            <a href="<?= $_SERVER['REQUEST_URI']; ?>&amp;page=<?= $i - 1; ?>"><?= $i; ?></a>
          <?php endif; ?>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
  
  <table class="table table-striped">
    <thead>
      <tr>
        <!--Название-->
        <th><?= $word[51]['name_'.$lang]; ?></th>
        
        <!--Редактировать-->
        <?php if($permissionEditSection): ?>
          <th>
            <span class="hidden-xs"><?= $word[24]['name_'.$lang]; ?></span>
            <span data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>" class="glyphicon glyphicon-pencil hidden-lg hidden-md hidden-sm"></span>
          </th>
        <?php endif; ?> 
      </tr>
    </thead>
    <tbody>
      <!--Список ссылок-->
      <?php foreach($allNews as $news): ?>
      <tr>
        <!--Название-->
        <td>
          <div class="links__box">
            <span class="glyphicon glyphicon-link"></span>
            <a class="links__item--link text-bold" target="_blank" href="<?= $news['link']; ?>"><?= $news['name_'.$lang]; ?></a>
            <?= addParagraph($news['content_'.$lang]); ?>
          </div>
        </td>
        <!--Редактировать-->
        <?php if($permissionEditSection): ?>
          <th class="text-center">
            <a href="index.php?lang=<?=$_GET['lang'];?>&amp;id_section=<?=$news['id_section'];?>&amp;id_news=<?=$news['id'];?>&amp;action=edit#navBottom">
              <span data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>" class="glyphicon glyphicon-pencil"></span>
            </a>
          </th>
        <?php endif; ?> 
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  
</div>