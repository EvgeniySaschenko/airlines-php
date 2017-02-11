<div class="notice">
  <!--User Added-->
  <div data-notice="#noticeAddAircraft" data-ancor="aircraftSite" class="hidden alert alert-success" role="alert">
    <?= $word[217]['name_'.$lang]; ?>
  </div>
  <!--User Update-->
  <div data-notice="#noticeEditAircraft" data-ancor="aircraftSite" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
  <!--User Error-->
  <div data-notice="#noticeErrorAddAircraft" data-ancor="aircraftSite" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-aircraft-site-list-add">
  <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;action=add_aircraft">
    <table class="table">
      <caption class="text-bold text-center"><?= $word[301]['name_'.$lang]; ?></caption>
      <thead class="crew__table-head--<?= $crew['location_en']; ?>">
        <tr>
          <th class="text-center"><?= $word[150]['name_'.$lang]; ?> ru</th>
          <th class="text-center"><?= $word[150]['name_'.$lang]; ?> en</th>
          <th class="text-center"><?= $word[304]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[305]['name_'.$lang].' ('.$word[283]['name_'.$lang]; ?>)</th>
          <th class="text-center"><?= $word[203]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[205]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[204]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[53]['name_'.$lang]; ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <!--Название ru-->
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">ru</div>
                <input name="name_ru" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
            </div> 
          </td>
          <!--Название en-->
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">en</div>
                <input name="name_en" type="text" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
            </div>
          </td>
          <!--Модель-->
          <td>
            <div class="form-group">
              <div class="input-group">
                <input name="model" type="text" class="form-control" required="required" placeholder="<?= $word[304]['name_'.$lang]; ?>">
              </div>
            </div> 
          </td>
          <!--Полетная масса допустимая (кг)-->
          <td>
            <div class="form-group">
              <div class="input-group">
                <input name="flight_weight" type="text" class="form-control" required="required" placeholder="<?= $word[305]['name_'.$lang]; ?>">
              </div>
            </div> 
          </td>
          <!--Масса снаряженного воздушного судна (кг)-->
          <td>
            <div class="form-group">
              <div class="input-group">
                <input name="weight_aircraft" type="text" class="form-control" required="required" placeholder="<?= $word[203]['name_'.$lang]; ?>">
              </div>
            </div> 
          </td>
          <!--Служебный груз (кг)-->
          <td>
            <div class="form-group">
              <div class="input-group">
                <input name="curb_weight_aircraft" type="text" class="form-control" required="required" placeholder="<?= $word[205]['name_'.$lang]; ?>">
              </div>
            </div> 
          </td>
          <!--Центровка пустого ВС (%САХ)-->
          <td>
            <div class="form-group">
              <div class="input-group">
                <input name="centering_empty_aircraft" type="text" class="form-control" required="required" placeholder="<?= $word[204]['name_'.$lang]; ?>">
              </div>
            </div> 
          </td>
          <!--Приоритет-->
          <td>
            <div class="form-group">
              <div class="input-group">
                <input name="priority" type="text" class="form-control" required="required" placeholder="<?= $word[53]['name_'.$lang]; ?>">
              </div>
            </div> 
          </td>
        </tr>
        
        <tr>
          <!--Служебный груз (кг)-->
          <td class="a-doc__submit text-right" colspan="8">
             <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>



<div class="a-aircraft-site-list-edit">
  <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;action=edit_aircraft">
    <table class="table">
      <caption class="text-bold text-center"><?= $word[302]['name_'.$lang]; ?></caption>
      <thead class="crew__table-head--<?= $crew['location_en']; ?>">
        <tr>
          <th class="text-center"><?= $word[150]['name_'.$lang]; ?> ru</th>
          <th class="text-center"><?= $word[150]['name_'.$lang]; ?> en</th>
          <th class="text-center"><?= $word[304]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[305]['name_'.$lang].' ('.$word[283]['name_'.$lang]; ?>)</th>
          <th class="text-center"><?= $word[203]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[205]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[204]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[53]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[73]['name_'.$lang]; ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($allAircraftHide as $aircraftHide): ?>
          <tr>
            <input name="id_aircraft[]" type="hidden" value="<?= $aircraftHide['id']; ?>">
            <!--Название ru-->
            <td>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">ru</div>
                  <input name="name_ru[]" type="text" class="form-control" value="<?= $aircraftHide['name_ru'] ?>" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
                </div>
              </div> 
            </td>
            <!--Название en-->
            <td>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">en</div>
                  <input name="name_en[]" type="text" class="form-control" value="<?= $aircraftHide['name_en'] ?>" placeholder="<?= $word[150]['name_'.$lang]; ?>">
                </div>
              </div>
            </td>
            <!--Модель-->
            <td>
              <div class="form-group">
                <div class="input-group">
                  <input name="model[]" type="text" class="form-control" value="<?= $aircraftHide['model'] ?>" required="required" placeholder="<?= $word[304]['name_'.$lang]; ?>">
                </div>
              </div> 
            </td>
            <!--Полетная масса допустимая (кг)-->
            <td>
              <div class="form-group">
                <div class="input-group">
                  <input name="flight_weight[]" type="text" class="form-control" value="<?= $aircraftHide['flight_weight'] ?>" required="required" placeholder="<?= $word[305]['name_'.$lang]; ?>">
                </div>
              </div> 
            </td>
            <!--Масса снаряженного воздушного судна (кг)-->
            <td>
              <div class="form-group">
                <div class="input-group">
                  <input name="weight_aircraft[]" type="text" class="form-control" value="<?= $aircraftHide['weight_aircraft'] ?>" required="required" placeholder="<?= $word[203]['name_'.$lang]; ?>">
                </div>
              </div> 
            </td>
            <!--Служебный груз (кг)-->
            <td>
              <div class="form-group">
                <div class="input-group">
                  <input name="curb_weight_aircraft[]" type="text" class="form-control" value="<?= $aircraftHide['curb_weight_aircraft'] ?>" required="required" placeholder="<?= $word[205]['name_'.$lang]; ?>">
                </div>
              </div> 
            </td>
            <!--Центровка пустого ВС (%САХ)-->
            <td>
              <div class="form-group">
                <div class="input-group">
                  <input name="centering_empty_aircraft[]" type="text" class="form-control" value="<?= $aircraftHide['centering_empty_aircraft'] ?>" required="required" placeholder="<?= $word[204]['name_'.$lang]; ?>">
                </div>
              </div> 
            </td>
            <!--Приоритет-->
            <td>
              <div class="form-group">
                <div class="input-group">
                  <input name="priority[]" type="text" value="<?= $aircraftHide['priority'] ?>" class="form-control" required="required" placeholder="<?= $word[53]['name_'.$lang]; ?>">
                </div>
              </div> 
            </td>
            <!--Скрыть-->
            <td>
             <div class="form-group" data-aircraft-site-list-hide="<?= $aircraftHide['hide']; ?>">
                <div class="input-group">
                 <input class="a-aircraft-site-list-edit__hide" type="checkbox" value="1">
                 <input name="hide[]" type="hidden" value="0">
               </div> 
             </div> 
            </td>
            
          </tr>
        
        <?php endforeach; ?>
        
        <tr>
          <!--Отправить-->
          <td class="a-doc__submit text-right" colspan="9">
             <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>