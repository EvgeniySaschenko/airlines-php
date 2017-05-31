<div class="notice">
  <!--User Added-->
  <div data-notice="#noticeUpdateUserEdit" data-ancor="userEdit" class="hidden alert alert-success" role="alert">
    <?= $word[165]['name_'.$lang]; ?>
  </div>
  <!--User Exist Login-->
  <div data-notice="#noticeExistLoginUserEdit" data-ancor="userEdit" class="hidden alert alert-danger" role="alert">
    <?= $word[159]['name_'.$lang]; ?>
  </div>
  <!--User Error-->
  <div data-notice="#noticeErrorUserEdit" data-ancor="userEdit" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>
<div class="a-user-edit">
  <form role="form" method="post" enctype="multipart/form-data" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_user=<?= $_GET['id_user']; ?>&amp;action=user_edit">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[72]['name_'.$lang]; ?></caption>
      <tbody>
        <!--Раздел-->
        <tr>
          <td class="title text-bold">
            <?= $word[91]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group form-inline">
              <select class="form-control" name="id_section" data-selected-option="<?= $user[0]['id_section']; ?>">
                <?php foreach($allSections as $section): ?> 
                  <?php if($section['user'] == 1): ?> 
                    <option value="<?= $section['id']; ?>"><?= $section['name_'.$lang]; ?></option>
                  <?php endif; ?> 
                <?php endforeach; ?> 
              </select>
            </div>
          </td>
        </tr>
        
        <!--Должность-->
        <tr>
          <td class="title text-bold">
            <?= $word[15]['name_'.$lang]; ?>  
          </td>
          <td>
            <?= dropDownList('id_rank', $allRank, $user[0]['id_rank']); ?>
          </td>
        </tr>
        <!--Права доступа-->
        <tr>
          <td class="title text-bold">
            <?= $word[22]['name_'.$lang]; ?>
          </td>
          <td>
            <?= dropDownListRquiredNo('id_user_permission', $allUserPermission, $user[0]['id_user_permission']); ?>
          </td>
        </tr>
        <!--Загрузить фото-->
        <tr>
          <td class="title text-bold">
            <?= $word[160]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
              <?php if($user[0]['extension']): ?>
              <img class="a-user-edit__photo-img img-rounded img-responsive" src="<?= checkFileSign('images/user/'.$user[0]['id'].'.'.$user[0]['extension']); ?>">
              <?php endif; ?>
              <div class="input-group">
                <div class="input-group-addon">
                  <span class="fa fa-file-image-o"></span>
                </div>
                <input type="file" name="uploadfile" class="form-control" data-toggle="tooltip" title="<?= $word[161]['name_'.$lang]; ?>">
                <input type="hidden" name="extension" value="<?= $user[0]['extension'] ?>"/>
              </div>
            </div>
          </td>
        </tr>
        <!--Ф.И.О.-->
        <tr>
          <td class="title text-bold">
            <?= $word[46]['name_'.$lang]; ?>  
          </td>
          <td>
            <!--ru-->
            <div class="form-group form-inline has-success">
              <!--Фамилия-->
              <div class="input-group">
                <div class="input-group-addon">ru</div>
                <input name="last_name_ru"  value="<?= $user[0]['last_name_ru'] ?>" class="form-control" type="text" required="required" placeholder="<?= $word[20]['name_'.$lang]; ?>">
              </div>
              <!--Имя-->
              <div class="input-group">
                <input name="name_ru" value="<?= $user[0]['name_ru'] ?>" class="form-control" type="text" required="required" placeholder="<?= $word[18]['name_'.$lang]; ?>">
              </div>
              <!--Отчество-->
              <div class="input-group">
                <input name="first_name_ru" value="<?= $user[0]['first_name_ru'] ?>" class="form-control" type="text" required="required" placeholder="<?= $word[19]['name_'.$lang]; ?>">
              </div>
            </div>
            <!--en-->
            <div class="form-group form-inline has-success">
              <!--Фамилия-->
              <div class="input-group">
                <div class="input-group-addon">en</div>
                <input name="last_name_en" value="<?= $user[0]['last_name_en'] ?>" class="form-control" type="text" required="required" placeholder="<?= $word[20]['name_'.$lang]; ?>">
              </div>
              <!--Имя-->
              <div class="input-group">
                <input name="name_en" value="<?= $user[0]['name_en'] ?>" class="form-control" type="text" required="required" placeholder="<?= $word[18]['name_'.$lang]; ?>">
              </div>
              <!--Отчество-->
              <div class="input-group">
                <input name="first_name_en" value="<?= $user[0]['first_name_en'] ?>" class="form-control" type="text" required="required" placeholder="<?= $word[19]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        <!--Логин-->
        <tr>
          <td class="title text-bold">
            <?= $word[1]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group form-inline has-success">
              <div class="input-group">
                <input name="login" value="<?= $user[0]['login'] ?>" class="form-control" type="text" required="required" placeholder="<?= $word[1]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        <!--Пароль-->
        <tr>
          <td class="title text-bold">
            <?= $word[2]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group form-inline">
              <div class="input-group">
                <input name="pass" class="form-control" type="text" placeholder="<?= $word[2]['name_'.$lang]; ?>">
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
            <?= dropDownList('id_crew', $allCrew, $user[0]['id_crew']); ?>
          </td>
        </tr>
        <!--Дата рождения-->
        <tr>
          <td class="title text-bold">
            <?= $word[5]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="input-group date date-picker has-success">
              <input name="date_birth" value="<?= convertDate($user[0]['date_birth']); ?>" required="required" type="text" class="form-control" required="required" placeholder="<?= $word[5]['name_'.$lang]; ?>">
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
                <input name="address_ru" value="<?= $user[0]['address_ru']; ?>" class="form-control" type="text" placeholder="<?= $word[4]['name_'.$lang]; ?>">
              </div>
             </div>
            <!--en-->
             <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">en</div>
                <input name="address_en" value="<?= $user[0]['address_en']; ?>" class="form-control" type="text" placeholder="<?= $word[4]['name_'.$lang]; ?>">
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
              <input class="form-control" name="phone_country" value="<?= phonePartCountry($user[0]['phone']); ?>" type="text" placeholder="<?= $word[155]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 38">
             </div>
             <div class="input-group">
              <input class="form-control" name="phone_operator" value="<?= phonePartOperator($user[0]['phone']); ?>" type="text" placeholder="<?= $word[156]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 050">
             </div>
             <div class="input-group">
              <input class="form-control" name="phone_number" value="<?= phonePartNumber($user[0]['phone']); ?>" type="text" placeholder="<?= $word[157]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 2225599">
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
              <input class="form-control" name="phone_corp_country" value="<?= phonePartCountry($user[0]['phone_corp']); ?>" type="text" placeholder="<?= $word[155]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 38">
             </div>
             <div class="input-group">
              <input class="form-control" name="phone_corp_operator" value="<?= phonePartOperator($user[0]['phone_corp']); ?>" type="text" placeholder="<?= $word[156]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 050">
             </div>
             <div class="input-group">
              <input class="form-control" name="phone_corp_number" value="<?= phonePartNumber($user[0]['phone_corp']); ?>" type="text" placeholder="<?= $word[157]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[162]['name_'.$lang]; ?> 2225599">
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
                <input name="mail" value="<?= $user[0]['mail']; ?>" class="form-control" type="text" placeholder="<?= $word[310]['name_'.$lang]; ?>">
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
                <input name="mail_2" value="<?= $user[0]['mail_2']; ?>" class="form-control" type="text" placeholder="<?= $word[311]['name_'.$lang]; ?>">
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
                <input name="skype" value="<?= $user[0]['skype']; ?>" class="form-control" type="text" placeholder="<?= $word[312]['name_'.$lang]; ?>">
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
              <textarea name="additional_info" class="form-control"><?= $user[0]['additional_info']; ?></textarea>
            </div>
          </td>
        </tr>
        
        <!--Загрузить подпись-->
        <tr>
          <td class="title text-bold">
            <?= $word[163]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
               <img class="a-user-edit__signature-img img-rounded img-responsive" src="<?= checkFileSign('images/user/signature/'.$user[0]['id'].'.jpg'); ?>">
              <div class="input-group">
                <div class="input-group-addon">
                  <span class="fa fa-file-image-o"></span>
                </div>
                <input type="file" name="signature" class="form-control" data-toggle="tooltip" title="<?= $word[161]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
        </tr>
        
        <!--Убрать из разсылки-->
        <?php
          if($user[0]['remove_mailing_list'] != 0)
            $checkeRemoveMailingList = 'checked="checked"';
        ?>
        <tr>
          <td class="title text-bold">
            <?= $word[395]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
             <div class="input-group">
              <input type="checkbox" value="1" <?= $checkeRemoveMailingList; ?>>
              <input name="remove_mailing_list" type="hidden" value="<?= $user[0]['remove_mailing_list']; ?>">
             </div>
            </div>
          </td>
        </tr>
        
        <!--Скрыть пользователя-->
        <?php
          if($user[0]['hide'] != 0)
            $checkedHide = 'checked="checked"';
        ?>
        <tr>
          <td class="title text-bold">
            <?= $word[73]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
             <div class="input-group">
              <input type="checkbox" value="1" <?= $checkedHide; ?>>
              <input name="hide" type="hidden" value="<?= $user[0]['hide']; ?>">
             </div>
            </div>
          </td>
        </tr>
        
        <!--Пользователь заблокирован-->
        <?php
          if($user[0]['number_retries'] != 0)
            $checkedNumberRetries = 'checked="checked"';
        ?>
        <tr>
          <td class="title text-bold">
            <?= $word[164]['name_'.$lang]; ?>  
          </td>
          <td>
            <div class="form-group">
             <div class="input-group">
              <input type="checkbox" value="5" <?= $checkedNumberRetries; ?>>
              <input name="number_retries" type="hidden" value="<?= $user[0]['hide']; ?>">
             </div>
            </div>
          </td>
        </tr>
        
        
        <!--Права доступа-->
        <?php if(empty($user[0]['permission_new'])): ?>
        <tr>
          <td class="title text-bold">
            <?= $word[22]['name_'.$lang]; ?>  
          </td>
          <td>
          <div class="a-user-edit__permission">
            <table class="table table-condensed">
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
                  data-premission-read="<?= strstr($user[0]['permission'], ':'.$sectionHide['mark'].':'); ?>" 
                  data-premission-read-you="<?= strstr($currentUser[0]['permission'], ':'.$sectionHide['mark'].':'); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1">
                    <input name="view_section[]" type="hidden" value="0">
                   </div>
                  </div>
                </td>
                <!--Редактировать-->
                <td data-premission-edit="<?= strstr($user[0]['permission'], '!:'.$sectionHide['mark'].':'); ?>"
                    data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '!:'.$sectionHide['mark'].':'); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1">
                    <input name="edit_section[]" type="hidden" value="0">
                   </div>
                  </div>
                </td>
                <!--Удалить-->
                <td data-premission-delete="<?= strstr($user[0]['permission'], '_!:'.$sectionHide['mark'].':'); ?>"
                    data-premission-delete-you="<?= strstr($currentUser[0]['permission'], '_!:'.$sectionHide['mark'].':'); ?>">
                  <div class="form-group text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1">
                    <input name="delete_section[]" type="hidden" value="0">
                   </div>
                  </div>
                </td>
                <!--Управление пользователями-->
                <td data-premission-manage-users="<?= strstr($user[0]['permission'], '@'.$sectionHide['mark']); ?>"
                    data-premission-manage-users-you="<?= strstr($currentUser[0]['permission'], '@'.$sectionHide['mark']); ?>">
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
                    <td data-premission-read="<?= strstr($user[0]['permission'], $subsectionHide['mark'].$subsectionHide['id'].'~'); ?>"
                        data-premission-read-you="<?= strstr($currentUser[0]['permission'], $subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
                      <div class="form-group text-center">
                       <div class="input-group">
                        <input type="checkbox" value="1">
                        <input name="view_subsection[]" type="hidden" value="0">
                       </div>
                      </div>
                    </td>
                    <!--Редактировать-->
                    <td data-premission-edit="<?= strstr($user[0]['permission'], '!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>"
                        data-premission-edit-you="<?= strstr($currentUser[0]['permission'], '!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
                      <div class="form-group text-center">
                       <div class="input-group">
                        <input type="checkbox" value="1">
                        <input name="edit_subsection[]" type="hidden" value="0">
                       </div>
                      </div>
                    </td>
                    <!--Удалить-->
                    <td data-premission-delete="<?= strstr($user[0]['permission'], '_!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>"
                        data-premission-delete-you="<?= strstr($currentUser[0]['permission'], '_!'.$subsectionHide['mark'].$subsectionHide['id'].'~'); ?>">
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
                  <td data-premission-edit="<?= strstr($user[0]['permission'], '#'); ?>"
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
                  <td data-premission-edit="<?= strstr($user[0]['permission'], '*'); ?>"
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
                  <td data-premission-edit="<?= strstr($user[0]['permission'], '%'); ?>"
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
         </div>
          </td>
        </tr>
        <?php endif; ?>
        
        <?php if(!empty($user[0]['permission_new'])): ?>
        <tr class="text-bold">
          <td class="text-right" colspan="2">
            <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </form>
</div>