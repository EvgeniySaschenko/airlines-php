<h1 class="title-page text-center text-uppercase"><?= $word[141]['name_'.$lang]; ?></h1>
<div class="notice">
  <!--Rank Error-->
  <div data-notice="#noticeErrorAddUserDivisionDepartment" data-ancor="userListAdd" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
  <!--Rank Update-->
  <div data-notice="#noticeAddUserDivisionDepartment" data-ancor="userListAdd" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
</div>


<div class="a-division-department-list-user-add accordion-open-first-tab panel-group" id="collapse-division-department-list-user-add">
  <?php foreach($allSections as $section): ?>
    <?php if($section['count_user'] > 0): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <!--Раскрыть блок-->
        <h4 class="panel-title text-bold">
          <a data-toggle="collapse" data-parent="#collapse-division-department-list-user-add" href="#section<?= $section['id']; ?>"><?= $section['name_'.$lang]; ?></a>
        </h4>
      </div>
       <!--Блок-->
      <div id="section<?= $section['id']; ?>" class="panel-collapse collapse accordion-item">
        <div class="panel-body">
          <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;action=division_department_user_add">
          <table class="table table-striped">
            <thead>
              <tr>
                <!--Должность--> 
                <th class="title hidden-xs"><?= $word[15]['name_'.$lang]; ?></th>
                <!--Имя--> 
                <th class="title"><?= $word[18]['name_'.$lang]; ?></th>
                <!--Экипаж--> 
                <th class="title hidden-xs"><?= $word[16]['name_'.$lang]; ?></th>
                <!--Приоритет--> 
                <th class="title"><?= $word[53]['name_'.$lang]; ?></th>
                <!--Подразделение--> 
                <th class="title"><?= $word[69]['name_'.$lang]; ?></th>
                <!--Добавить пользователя--> 
                <th class="title">
                  <span class="fa fa-user-plus" data-toggle="tooltip" title="<?= $word[141]['name_'.$lang]; ?>"></span>
                </th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($allUser as $user): ?>
              <?php if($user['hide'] == 0 and $user['id_section'] == $section['id']): ?>
                <tr>
                  <input type="hidden" name="id_user[]" value="<?= $user['id']; ?>">
                  <!--Должность-->
                  <td class="form-group">
                    <?= dropDownList('id_rank[]', $allRank, $user['id_rank']); ?>
                  </td>
                  <!--Имя--> 
                  <td class="a-division-department-list-user__name">
                     <?= linkUser($user['id_section'], $user['id'], $user['last_name_'.$lang], $user['name_'.$lang], $user['first_name_'.$lang]); ?>
                  </td>
                  <!--Экипаж--> 
                  <td class="a-division-department-list-user__crew">
                      <?= $user['crew_'.$lang]; ?>
                  </td>
                  <!--Приоритет--> 
                  <td class="a-division-department-list-user__priority-division">
                    <div class="form-group">
                     <div class="input-group">
                       <input name="priority[]" class="form-control" type="text" placeholder="<?= $word[53]['name_'.$lang]; ?>">
                     </div>
                   </div>
                  </td>
                  <!--Подразделение--> 
                  <td class="a-division-department-list-user__division-department">
                      <?= dropDownList('id_news[]', $allDivisionDepartment, 0); ?>
                  </td>
                  <!--Добавить пользователя--> 
                  <td class="text-center">
                    <div class="input-group">
                      <input type="checkbox" data-checkbox-select="<?= $sentDoc['id_section']; ?>" value="1">
                      <input type="hidden" name="add[]" value="0">
                    </div>
                  </td>
                </tr>
                <?php endif; ?>
              <?php endforeach; ?>
              <!--Отправить-->
              <tr>
                <td colspan="6">
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          </form>  
        </div>
      </div>
    </div>
    <?php endif; ?>
  <?php endforeach; ?> 
</div>
