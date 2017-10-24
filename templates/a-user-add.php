<div class="notice">
  <!--User Added-->
  <div data-notice="#noticeAddedUserAdd" data-ancor="userAdd" class="hidden alert alert-success" role="alert">
    <?= $word[147]['name_'.$lang]; ?>
  </div>
  <!--User Exist Login-->
  <div data-notice="#noticeAddedUserAddExistLogin" data-ancor="userAdd" class="hidden alert alert-danger" role="alert">
    <?= $word[159]['name_'.$lang]; ?>
  </div>
  <!--User Error-->
  <div data-notice="#noticeErrorUserAdd" data-ancor="userAdd" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-user-add">
  <div class="alert alert-warning" role="alert">
    <?= $word[394]['name_'.$lang]; ?>
  </div>
  <form role="form" method="post" enctype="multipart/form-data" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;action=user_add">
    <table class="table table-bordered table-align-middle">
      <caption class="text-bold text-center"><?= $word[141]['name_'.$lang]; ?></caption>
      <tbody>
        <!--Должность-->
        <tr>
          <td class="title text-bold">
            <?= $word[15]['name_'.$lang]; ?> *
          </td>
          <td>
            <?= dropDownListRquired('id_rank', $allRank); ?>
          </td>
        </tr>
        <!--Права доступа-->
        <tr>
          <td class="title text-bold">
            <?= $word[22]['name_'.$lang]; ?> *
          </td>
          <td>
            <?= dropDownListPermission('id_user_permission', $allUserPermission); ?>    
          </td>
        </tr>
        <!--Ф.И.О.-->
        <tr>
          <td class="title text-bold">
            <?= $word[46]['name_'.$lang]; ?> *
          </td>
          <td>
            <!--ru-->
            <div class="form-group form-inline has-success">
              <!--Фамилия-->
              <div class="input-group">
                <div class="input-group-addon">ru</div>
                <input name="last_name_ru" class="form-control" type="text" required="required" placeholder="<?= $word[20]['name_'.$lang]; ?>">
              </div>
              <!--Имя-->
              <div class="input-group">
                <input name="name_ru" class="form-control" type="text" required="required" placeholder="<?= $word[18]['name_'.$lang]; ?>">
              </div>
              <!--Отчество-->
              <div class="input-group">
                <input name="first_name_ru" class="form-control" type="text" required="required" placeholder="<?= $word[19]['name_'.$lang]; ?>">
              </div>
            </div>
            <!--en-->
            <div class="form-group form-inline has-success">
              <!--Фамилия-->
              <div class="input-group">
                <div class="input-group-addon">en</div>
                <input name="last_name_en" class="form-control" type="text" required="required" placeholder="<?= $word[20]['name_'.$lang]; ?>">
              </div>
              <!--Имя-->
              <div class="input-group">
                <input name="name_en" class="form-control" type="text" required="required" placeholder="<?= $word[18]['name_'.$lang]; ?>">
              </div>
              <!--Отчество-->
              <div class="input-group">
                <input name="first_name_en" class="form-control" type="text" required="required" placeholder="<?= $word[19]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        <!--Логин-->
        <tr>
          <td class="title text-bold">
            <?= $word[1]['name_'.$lang]; ?> *
          </td>
          <td>
            <div class="form-group form-inline has-success">
              <div class="input-group">
                <input name="login" class="form-control" type="text" required="required" placeholder="<?= $word[1]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        <!--Пароль-->
        <tr>
          <td class="title text-bold">
            <?= $word[2]['name_'.$lang]; ?> *
          </td>
          <td>
            <div class="form-group form-inline has-success">
              <div class="input-group">
                <input name="pass" class="form-control" type="text" required="required" placeholder="<?= $word[2]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        <!--Экипаж-->
        <tr>
          <td class="title text-bold">
            <?= $word[16]['name_'.$lang]; ?>  
          </td>
          <td>
            <?= dropDownList('id_crew', $allCrew); ?>
          </td>
        </tr>
        <!--Дата рождения-->
        <tr>
          <td class="title text-bold">
            <?= $word[5]['name_'.$lang]; ?> *
          </td>
          <td>
            <div class="input-group date date-picker has-success">
                <input name="date_birth" type="text" class="form-control" required="required" placeholder="<?= $word[5]['name_'.$lang]; ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </td>
        <!--Адрес-->
        <tr>
          <td class="title text-bold">
            <?= $word[4]['name_'.$lang]; ?>  
          </td>
          <td>
            <!--ru-->
             <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">ru</div>
                <input name="address_ru" class="form-control" type="text" placeholder="<?= $word[4]['name_'.$lang]; ?>">
              </div>
            </div>
            <!--en-->
             <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">en</div>
                <input name="address_en" class="form-control" type="text" placeholder="<?= $word[4]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        <!--Личный телефон-->
        <tr>
          <td class="title text-bold">
            <?= $word[6]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group form-inline">
             <div class="input-group">
              <input class="form-control" name="phone_country" type="text" placeholder="<?= $word[155]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 38">
             </div>
             <div class="input-group">
              <input class="form-control" name="phone_operator" type="text" placeholder="<?= $word[156]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 050">
             </div>
             <div class="input-group">
              <input class="form-control" name="phone_number" type="text" placeholder="<?= $word[157]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 2225599">
             </div>
           </div>
          </td>
        </tr>
        <!--Рабочий телефон-->
        <tr>
          <td class="title text-bold text-nowrap">
            <?= $word[7]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group form-inline">
             <div class="input-group">
              <input class="form-control" name="phone_corp_country" type="text" placeholder="<?= $word[155]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 38">
             </div>
             <div class="input-group">
              <input class="form-control" name="phone_corp_operator" type="text" placeholder="<?= $word[156]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 050">
             </div>
             <div class="input-group">
              <input class="form-control" name="phone_corp_number" type="text" placeholder="<?= $word[157]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 2225599">
             </div>
           </div>
          </td>
        </tr>
        <!--Личный E-mail-->
        <tr>
          <td class="title text-bold">
            <?= $word[310]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">@</div>
                <input name="mail" class="form-control" type="text" placeholder="<?= $word[310]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        <!--Рабочий E-mail-->
        <tr>
          <td class="title text-bold">
            <?= $word[311]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">@</div>
                <input name="mail_2" class="form-control" type="text" placeholder="<?= $word[311]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        <!--Skype-->
        <tr>
          <td class="title text-bold">
            <?= $word[312]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-skype" aria-hidden="true"></span></div>
                <input name="skype" class="form-control" type="text" placeholder="<?= $word[312]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        <!--Дополнительная информация-->
        <tr>
          <td class="title text-bold">
            <?= $word[313]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
                <textarea name="additional_info" class="form-control"></textarea>
            </div>
          </td>
        </tr>
        <!--Загрузить фото-->
        <tr>
          <td class="title text-bold">
            <?= $word[160]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <span class="fa fa-file-image-o"></span>
                </div>
                <input type="file" name="uploadfile" class="form-control" data-toggle="tooltip" title="<?= $word[161]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        
        
      
        <!--Права доступа-->
      <? if(false): ?>
        <tr>
          <td class="title text-bold">
            <?= $word[22]['name_'.$lang]; ?>  
          </td>
          <td>
              
              
            <table class="a-user-add__permission table table-condensed">
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
                    <input type="checkbox" value="1">
                    <input name="view_section[]" type="hidden" value="0">
                   </div>
                  </div>
                </td>
                <!--Редактировать-->
                <td data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '!:'.$sectionHide['mark'].':'); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1">
                    <input name="edit_section[]" type="hidden" value="0">
                   </div>
                  </div>
                </td>
                <!--Удалить навседа-->
                <td data-premission-delete-you="<?= strstr($currentUser[0]['permission'], '_!:'.$sectionHide['mark'].':'); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1">
                    <input name="delete_section[]" type="hidden" value="0">
                   </div>
                  </div>
                </td>
                <!--Управление пользователями-->
                <td data-premission-manage-users-you="<?= strstr($currentUser[0]['permission'], '@'.$sectionHide['mark']); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1">
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
                        <input type="checkbox" value="1">
                        <input name="view_subsection[]" type="hidden" value="0">
                       </div>
                      </div>
                    </td>
                    <!--Редактировать-->
                    <td data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
                      <div class="form-group text-center">
                       <div class="input-group">
                        <input type="checkbox" value="1">
                        <input name="edit_subsection[]" type="hidden" value="0">
                       </div>
                      </div>
                    </td>
                    <!--Удалить навседа-->
                    <td data-premission-delete-you="<?= strstr($currentUser[0]['permission'], '_!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
                      <div class="form-group text-center">
                       <div class="input-group">
                        <input type="checkbox" value="1">
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
                <!--Button-->
                <tr class="text-bold">
                  <td class="text-right" colspan="5">
                    <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
                  </td>
                </tr>
            </tbody>
          </table>
          </td>
        </tr>
     <? endif; ?>
     
        <tr class="text-bold">
          <td class="text-right" colspan="2">
            <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>