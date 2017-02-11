<div class="a-division-department__list-division" data-anchor-pagination="#newsList">

  <table class="table table-striped">
    <caption class="text-center text-uppercase text-bold">
      <?= $word[24]['name_'.$lang]; ?>
    </caption>
    <tbody>
      <!--Задание на полет-->
      <?php foreach($allDivisionDepartment as $key => $divisionDepartment): ?>
      <tr>
        <!--Редактировать-->
          <td class="text-left">
            <a href="index.php?lang=<?=$_GET['lang'];?>&amp;id_section=<?=$divisionDepartment['id_section'];?>&amp;id_news=<?=$divisionDepartment['id'];?>&amp;action=edit">
              <?= $key.' '.$divisionDepartment['name_'.$lang]; ?>
            </a>
          </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>