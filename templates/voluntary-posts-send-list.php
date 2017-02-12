<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>

<div class="voluntary-posts-list">
  
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
        <!--Дата-->
        <th><?= $word[130]['name_'.$lang]; ?></th>
        <!--Время-->
        <th><?= $word[254]['name_'.$lang]; ?></th>
        <!--Тема-->
        <th><?= $word[365]['name_'.$lang]; ?></th>
        <!--Ответственный департамент-->
        <th class="text-center"><?= $word[372]['name_'.$lang]; ?></th>
      </tr>
    </thead>
    <tbody>
      <!--Задание на полет-->
      <?php foreach($allNews as $news): ?>
      <tr>
        <!--Дата-->
        <td><?= convertDate($news['date_create']); ?></td>
        <!--Время-->
        <td><?= convertTime($news['date_create']); ?></td>
        <!--Тема-->
        <td>
          <a href="index.php?lang=<?=$_GET['lang'];?>&id_section=<?=$news['id_section'];?>&id_news=<?=$news['id'];?>#navBottom">
            <?= $news['name_'.$lang]; ?>
          </a>
        </td>
        <!--Ответственный департамент-->
        <td class="text-center">
          <?= $news['section_name_'.$lang]; ?>
        </td>
          
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>