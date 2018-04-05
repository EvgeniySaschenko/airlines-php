<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>
<div class="search">
  <table class="table table-align-middle">
    <caption class="text-center text-uppercase text-bold"><?= $word[519]['name_'.$lang]; ?></caption>
    <thead>
      <tr>
        <th class="text-center"><?= $word[91]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[103]['name_'.$lang]; ?></th>
        <th colspan="2" class="text-center"><?= $word[60]['name_'.$lang]; ?></th>
        <th class="text-center"></th>
      </tr>
    </thead>

      <tr>
        <!--Раздел-->
        <td>
            <div class="form-group form-inline">
              <select class="form-control dropdown-section" name="id_section" data-id-section="<?= $allSections[0]['id']; ?>">
                <?php foreach($allSections as $section): ?> 
                  <?php if($section['user'] == 1): ?> 
                    <option value="<?= $section['id']; ?>"><?= $section['name_'.$lang]; ?></option>
                  <?php endif; ?> 
                <?php endforeach; ?> 
              </select>
            </div>
        </td>
        <!--Пользователь-->
        <td>
            <div class="form-group form-inline">
              <select class="form-control dropdown-user" name="id_user"?>">
                <?php foreach($allUser as $user): ?> 
                    <option value="<?= $user['id']; ?>" data-id-section="<?= $user['id_section']; ?>">
                    <?= linkUser($user['id_section'], $user['id'], $user['last_name_'.$lang], $user['name_'.$lang], $user['first_name_'.$lang]); ?>
                    </option>
                <?php endforeach; ?> 
              </select>
            </div>
        </td>
        <!--Дата start-->
        <td>
            <div class="input-group date date-picker text-center">
              <input name="date_start" type="text" class="form-control date-start" placeholder="<?= $word[520]['name_'.$lang]; ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
        </td>
        <!--Дата end-->
        <td>
            <dv class="input-group date date-picker text-center">
              <input name="date_end" type="text" class="form-control date-end" placeholder="<?= $word[521]['name_'.$lang]; ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
        </td>
        <!--Искать-->
        <td>
            <button type="submit" class="btn btn-success"><?= $word[522]['name_'.$lang]; ?></button>
        </td>
     </tr>
  </table>
</div>