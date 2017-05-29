<div class="a-user-permission-add">
  <div class="notice">
    <!--User Added-->
    <div data-notice="#noticeUserPermissionAdd" data-ancor="userPremissionAdd" class="hidden alert alert-success" role="alert">
      <?= $word[217]['name_'.$lang]; ?>
    </div>
    <!--User Error-->
    <div data-notice="#noticeUserPermissionError" data-ancor="userPremissionAdd" class="hidden alert alert-danger" role="alert">
      <?= $word[145]['name_'.$lang]; ?>
    </div>
  </div>
    
  <form role="form" method="post" enctype="multipart/form-data" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;action=user_premission_add">
    <table class="a-user-permission-add__permission-1 table table-condensed">
      <caption class="text-bold text-center"><?= $word[386]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">ru</div>
                <input name="name_ru" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
            </div> 
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">en</div>
                <input name="name_en" type="text" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
            </div>
            <div class="form-group">
               <textarea name="description" class="form-control" placeholder="<?= $word[9]['name_'.$lang]; ?>"></textarea>
            </div>
          </td> 
        </tr>
      </tbody>
    </table>
    <table class="a-user-permission-add__permission table table-condensed">
      <thead>
        <tr>
          <th class="title text-bold text-center"><?= $word[69]['name_'.$lang]; ?></th>
          <th class="title text-bold text-center"><?= $word[70]['name_'.$lang]; ?></th>
          <th class="title text-bold text-center"><?= $word[24]['name_'.$lang]; ?></th>
          <th class="title text-bold text-center"><?= $word[300]['name_'.$lang]; ?></th>
          <th class="title text-bold text-center"><?= $word[139]['name_'.$lang]; ?></th>
        </tr>
      </thead>
      <tbody>
          
      <!--Разделы-->
      <?php foreach($allSectionsHide as $sectionHide): ?> 
      <tr>
        <td class="text-bold">
          <?= $sectionHide['name_'.$lang]; ?>
        </td>
        <!--Чтение-->
        <td data-premission-read-you="<?= strstr($currentUser[0]['permission'], ':'.$sectionHide['mark'].':'); ?>">
          <div class="form-group text-center">
           <div class="input-group">
            <input type="checkbox" value="1" data-checkbox-select="user-premission-add_read">
            <input name="view_section[]" type="hidden" value="0">
           </div>
          </div>
        </td>
        <!--Редактировать-->
        <td data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '!:'.$sectionHide['mark'].':'); ?>">
          <div class="form-group text-center">
           <div class="input-group">
            <input type="checkbox" value="1" data-checkbox-select="user-premission-add_edit">
            <input name="edit_section[]" type="hidden" value="0">
           </div>
          </div>
        </td>
        <!--Удалить навседа-->
        <td data-premission-delete-you="<?= strstr($currentUser[0]['permission'], '_!:'.$sectionHide['mark'].':'); ?>">
          <div class="form-group text-center">
           <div class="input-group">
            <input type="checkbox" value="1" data-checkbox-select="user-premission-add_delete">
            <input name="delete_section[]" type="hidden" value="0">
           </div>
          </div>
        </td>
        <!--Управление пользователями-->
        <td data-premission-manage-users-you="<?= strstr($currentUser[0]['permission'], '@'.$sectionHide['mark']); ?>">
          <div class="form-group text-center">
           <div class="input-group">
            <input type="checkbox" value="1" data-checkbox-select="user-premission-add_manage_users">
            <input name="manage_users[]" type="hidden" value="0">
           </div>
          </div>
        </td>
      </tr>
      <?php foreach($allSubsectionsHide as $subsectionHide): ?> 
        <?php if($subsectionHide['id_section'] == $sectionHide['id']): ?> 
          <tr>
            <td>
              <?= $subsectionHide['name_'.$lang]; ?>
            </td>
            <!--Чтение-->
            <td data-premission-read-you="<?= strstr($currentUser[0]['permission'], $subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" value="1" data-checkbox-select="user-premission-add_read">
                <input name="view_subsection[]" type="hidden" value="0">
               </div>
              </div>
            </td>
            <!--Редактировать-->
            <td data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" value="1" data-checkbox-select="user-premission-add_edit">
                <input name="edit_subsection[]" type="hidden" value="0">
               </div>
              </div>
            </td>
            <!--Удалить навседа-->
            <td data-premission-delete-you="<?= strstr($currentUser[0]['permission'], '_!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" value="1" data-checkbox-select="user-premission-add_delete">
                <input name="delete_subsection[]" type="hidden" value="0">
               </div>
              </div>
            </td>
            <td></td>
          </tr>
          <?php endif; ?>
        <?php endforeach; ?> 
      <?php endforeach; ?> 
        <!--Просмотр личных документов-->
        <tr>
          <td class="text-bold"><?= $word[76]['name_'.$lang]; ?></td>
          <td data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '#'); ?>">
            <div class="form-group text-center">
             <div class="input-group">
              <input type="checkbox" value="1">
              <input name="personal_doc" type="hidden" value="0">
             </div>
            </div>
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <!--Управление сайтом-->
        <tr class="text-bold">
          <td><?= $word[88]['name_'.$lang]; ?></td>
          <td></td>
          <td data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '*'); ?>">
            <div class="form-group text-center">
             <div class="input-group">
              <input type="checkbox" value="1">
              <input name="manage_site" type="hidden" value="0">
             </div>
            </div>
          </td>
          <td></td>
          <td></td>
        </tr>
        <!--Задание на полет (Запретить редактирование)-->
        <tr class="text-bold">
          <td><?= $word[158]['name_'.$lang]; ?></td>
          <td></td>
          <td data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '%'); ?>">
            <div class="form-group text-center">
             <div class="input-group">
              <input type="checkbox" value="1">
              <input name="doc_assignment_flight" type="hidden" value="0">
             </div>
            </div>
          </td>
          <td></td>
          <td></td>
        </tr>
        
          <tr class="text-bold">
            <td>
              <?= $word[92]['name_'.$lang]; ?>
            </td>
            <!--Редактировать выбрать всех-->
            <td>
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" data-checkbox-select-all="user-premission-add_read" data-toggle="tooltip" title="" data-original-title="<?= $word[92]['name_'.$lang].' '.$word[70]['name_'.$lang]; ?>">
               </div>
              </div>
            </td>
            <!--Редактировать выбрать всех-->
            <td>
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" data-checkbox-select-all="user-premission-add_edit" data-toggle="tooltip" title="" data-original-title="<?= $word[92]['name_'.$lang].' '.$word[24]['name_'.$lang]; ?>">
               </div>
              </div>
            </td>
            <!--Удалить выбрать всех-->
            <td>
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" data-checkbox-select-all="user-premission-add_delete" data-toggle="tooltip" title="" data-original-title="<?= $word[92]['name_'.$lang].' '.$word[26]['name_'.$lang]; ?>">
               </div>
              </div>
            </td>
            <!--Удалить управление пользователями-->
            <td>
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" data-checkbox-select-all="user-premission-add_manage_users" data-toggle="tooltip" title="" data-original-title="<?= $word[92]['name_'.$lang].' '.$word[68]['name_'.$lang]; ?>">
               </div>
              </div>
            </td>
          </tr>
        
        
        
        <!--Button-->
        <tr class="text-bold">
          <td class="text-right" colspan="5">
            <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
    </tbody>
  </table>
  </form>
</div>