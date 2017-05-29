<div class="a-user-permission-edit">
  <div class="notice">
    <!--User Added-->
    <div data-notice="#noticeUserPermissionUpdate" data-ancor="noticeUserPermissionUpdate" class="hidden alert alert-success" role="alert">
      <?= $word[218]['name_'.$lang]; ?>
    </div>
  </div>
    
  <form role="form" method="post" enctype="multipart/form-data" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_user_permission=<?= $_GET['id_user_permission']; ?>&amp;action=user_premission_edit">
          <table class="a-user-permission-edit__table-1 table table-condensed">
            <caption class="text-bold text-center">
                <?= $word[388]['name_'.$lang]; ?>
              <div>
                <?=  $userPermission[0]['name_'.$lang]; ?>
              </div>
            </caption>
            <tbody>
              <tr>
                <td>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><?= $word[150]['name_'.$lang]; ?> ru</div>
                      <input name="name_ru" value="<?= $userPermission[0]['name_ru']; ?>" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><?= $word[150]['name_'.$lang]; ?> en</div>
                      <input name="name_en"  value="<?= $userPermission[0]['name_en']; ?>" type="text" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group-addon"><?= $word[9]['name_'.$lang]; ?></div>
                    <textarea name="description" class="form-control" placeholder="<?= $word[9]['name_'.$lang]; ?>"><?= $userPermission[0]['description']; ?></textarea>
                  </div>
                </td> 
              </tr>
            </tbody>
          </table>
            <table class="table table-condensed a-user-permission-edit__table-2">
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
                <td 
                  data-premission-read="<?= strstr($userPermission[0]['permission'], ':'.$sectionHide['mark'].':'); ?>" 
                  data-premission-read-you="<?= strstr($currentUser[0]['permission'], ':'.$sectionHide['mark'].':'); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1" data-checkbox-select="user-premission-edit_read">
                    <input name="view_section[]" type="hidden" value="0">
                   </div>
                  </div>
                </td>
                <!--Редактировать-->
                <td data-premission-edit="<?= strstr($userPermission[0]['permission'], '!:'.$sectionHide['mark'].':'); ?>"
                    data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '!:'.$sectionHide['mark'].':'); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1" data-checkbox-select="user-premission-edit_edit">
                    <input name="edit_section[]" type="hidden" value="0">
                   </div>
                  </div>
                </td>
                <!--Удалить-->
                <td data-premission-delete="<?= strstr($userPermission[0]['permission'], '_!:'.$sectionHide['mark'].':'); ?>"
                    data-premission-delete-you="<?= strstr($currentUser[0]['permission'], '_!:'.$sectionHide['mark'].':'); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1" data-checkbox-select="user-premission-edit_delete">
                    <input name="delete_section[]" type="hidden" value="0">
                   </div>
                  </div>
                </td>
                <!--Управление пользователями-->
                <td data-premission-manage-users="<?= strstr($userPermission[0]['permission'], '@'.$sectionHide['mark']); ?>"
                    data-premission-manage-users-you="<?= strstr($currentUser[0]['permission'], '@'.$sectionHide['mark']); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1" data-checkbox-select="user-premission-edit_manage-users">
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
                    <td data-premission-read="<?= strstr($userPermission[0]['permission'], $subsectionHide['mark'].$subsectionHide['id'].'~'); ?>"
                        data-premission-read-you="<?= strstr($currentUser[0]['permission'], $subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
                      <div class="form-group text-center">
                       <div class="input-group">
                        <input type="checkbox" value="1" data-checkbox-select="user-premission-edit_read">
                        <input name="view_subsection[]" type="hidden" value="0">
                       </div>
                      </div>
                    </td>
                    <!--Редактировать-->
                    <td data-premission-edit="<?= strstr($userPermission[0]['permission'], '!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>"
                        data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
                      <div class="form-group text-center">
                       <div class="input-group">
                        <input type="checkbox" value="1" data-checkbox-select="user-premission-edit_edit">
                        <input name="edit_subsection[]" type="hidden" value="0">
                       </div>
                      </div>
                    </td>
                    <!--Удалить-->
                    <td data-premission-delete="<?= strstr($userPermission[0]['permission'], '_!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>"
                        data-premission-delete-you="<?= strstr($currentUser[0]['permission'], '_!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
                      <div class="form-group text-center">
                       <div class="input-group">
                        <input type="checkbox" value="1" data-checkbox-select="user-premission-edit_delete">
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
                  <td data-premission-edit="<?= strstr($userPermission[0]['permission'], '#'); ?>"
                      data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '#'); ?>">
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
                  <td data-premission-edit="<?= strstr($userPermission[0]['permission'], '*'); ?>"
                      data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '*'); ?>">
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
                  <td data-premission-edit="<?= strstr($userPermission[0]['permission'], '%'); ?>"
                      data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '%'); ?>">
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