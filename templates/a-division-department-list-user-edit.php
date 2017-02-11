<div class="notice">
  <!--Rank Error-->
  <div data-notice="#noticeErrorUpdateUserDivisionDepartment" data-ancor="userList" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
  <!--Rank Update-->
  <div data-notice="#noticeUpdateUserDivisionDepartment" data-ancor="userList" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
</div>



<div class="a-division-department-list-user">
  <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;action=division_department_list_user">
    
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
            <!--Удалить--> 
            <th class="title"><?= $word[26]['name_'.$lang]; ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($allUserDivisionDepartment as $userDivisionDepartment): ?>
            <tr>
              <input name="id_division_user[]" type="hidden" value="<?= $userDivisionDepartment['id']; ?>">
              <!--Должность-->
              <td class="form-group">
                <?= dropDownList('id_rank[]', $allRank, $userDivisionDepartment['id_rank']); ?>
              </td>
              
              <!--Имя--> 
              <td class="a-division-department-list-user__name">
                 <?= linkUser($userDivisionDepartment['id_section'], $userDivisionDepartment['id'], $userDivisionDepartment['last_name_'.$lang], $user['name_'.$lang], $userDivisionDepartment['first_name_'.$lang]); ?>
              </td>
              <!--Экипаж--> 
              <td class="a-division-department-list-user__crew">
                  <?= $userDivisionDepartment['crew_'.$lang]; ?>
              </td>
              <!--Приоритет--> 
              <td class="a-division-department-list-user__priority-division">
                <div class="form-group">
                 <div class="input-group">
                   <input name="priority[]" value="<?= $userDivisionDepartment['priority']; ?>" lass="form-control" type="text" placeholder="<?= $word[53]['name_'.$lang]; ?>">
                 </div>
               </div>
              </td>
              <!--Подразделение--> 
              <td class="a-division-department-list-user__division-department">
                  <?= dropDownList('id_news[]', $allDivisionDepartment, $userDivisionDepartment['id_news']); ?>
              </td>
              <!--Скрыть--> 
              <td class="text-center">
                <div class="input-group">
                  <input type="checkbox" value="1">
                  <input type="hidden" name="hide[]" value="0">
                </div>
              </td>
            </tr> 
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