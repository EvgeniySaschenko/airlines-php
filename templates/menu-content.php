<div class="menu-content container">
  <div class="munu-sort-doc text-left col-lg-10 col-md-10 hidden-sm hidden-xs">
    <!--Сортировка документов-->
    <?php if($docMenuContent[0]['id'] and ($permissionEditSection or $permissionEditSubsection) and ($currentSubsection[0]['type'] == 'doc' or $currentSection[0]['type'] == 'doc')): ?>
    <ul class="nav nav-pills">
      <li class="text-bold">
         <a><?= $word[116]['name_'.$lang]; ?></a>
      </li>
      <!--Как список-->
      <li data-toggle="tooltip" title="<?= $word[120]['name_'.$lang]; ?>">
        <a href="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_book=<?= $getIdBook; ?>&amp;action=doc_sort_list#docList">
          <span class="fa fa-align-justify"></span>
          <?= $word[117]['name_'.$lang]; ?>
        </a>
      </li>
      <!--По дате документа-->
      <li data-toggle="tooltip" title="<?= $word[121]['name_'.$lang]; ?>">
        <a href="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_book=<?= $getIdBook; ?>&amp;action=doc_sort_date_doc#docList">
          <span class="fa fa-calendar"></span>
          <?= $word[118]['name_'.$lang]; ?>
        </a>
      </li>
      <!--По дате загрузки-->
      <li data-toggle="tooltip" title="<?= $word[345]['name_'.$lang]; ?>">
        <a href="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_book=<?= $getIdBook; ?>&amp;action=doc_sort_date_upload#docList">
          <span class="fa fa-calendar-plus-o"></span>
          <?= $word[344]['name_'.$lang]; ?>
        </a>
      </li>
      <!--По главам-->
      <li data-toggle="tooltip" title="<?= $word[122]['name_'.$lang]; ?>">
        <a href="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_book=<?= $getIdBook; ?>&amp;action=doc_sort_chapter#docList">
          <span class="fa fa-header"></span>
          <?= $word[119]['name_'.$lang]; ?>
        </a>
      </li>
      <!--По приоритету-->
      <li data-toggle="tooltip" title="<?= $word[347]['name_'.$lang]; ?>">
        <a href="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_book=<?= $getIdBook; ?>&amp;action=doc_sort_priority#docList">
          <span class="glyphicon glyphicon-sort-by-order"></span>
          <?= $word[346]['name_'.$lang]; ?>
        </a>
      </li>
    </ul>
    <?php endif; ?>
  </div>

  <div class="menu-manage col-lg-2 col-md-2 col-sm-12 col-xs-12 text-right">
    <?php if(empty($_GET['action'])): ?>
      <!--Редактировать текущую страницу-->
      <?php if($permissionEditSection and empty($_GET['id_subsection']) or $permissionEditSubsection): ?>
          <a class="menu-manage__link" title="<?= $word[24]['name_'.$lang]; ?>" href="index.php?<?= $_SERVER['QUERY_STRING']; ?>&amp;action=edit#navBottom">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>
      <?php endif; ?>

      <!--Управление пользователями-->
      <?php if($permissionManageUsers and empty($_GET['id_subsection']) and empty($_GET['id_user']) and $currentSection[0]['user'] == 1): ?>
          <a class="menu-manage__link" title="<?= $word[68]['name_'.$lang]; ?>" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $currentSection[0]['id']; ?>&amp;action=user_add#navBottom">
            <span class="glyphicon glyphicon-user"></span>
          </a>
      <?php endif; ?>

      <!--Управление сайтом-->
      <?php if($permissionManageSite and empty($_GET['id_subsection'])): ?>
          <a class="menu-manage__link" title="<?= $word[88]['name_'.$lang]; ?>" href="index.php?lang=<?= $lang; ?>&amp;action=manage_site#navBottom">
            <span class="glyphicon glyphicon-cog"></span>
          </a>
      <?php endif; ?>
    <?php endif; ?>
      <!--Редактировать пользователя-->
    <?php if($permissionManageUsers and $_GET['action'] == 'user_profile'): ?>
      <a class="menu-manage__link" title="<?= $word[68]['name_'.$lang]; ?>" href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $currentSection[0]['id']; ?>&amp;id_user=<?= $_GET['id_user']; ?>&amp;action=user_edit#navBottom">
          <span class="glyphicon glyphicon-user"></span>
      </a>
    <?php endif; ?>
  </div>
</div>