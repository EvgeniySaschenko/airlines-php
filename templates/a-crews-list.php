<div class="notice">
  <!--User Added-->
  <div data-notice="#noticeAddCrew" data-ancor="crewsList" class="hidden alert alert-success" role="alert">
    <?= $word[184]['name_'.$lang]; ?>
  </div>
  <!--User Update-->
  <div data-notice="#noticeUpdateCrews" data-ancor="crewsList" class="hidden alert alert-success" role="alert">
    <?= $word[180]['name_'.$lang]; ?>
  </div>
  <!--User Error-->
  <div data-notice="#noticeErrorAddCrew" data-ancor="crewsList" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
  
</div>
<div class="a-crew-add">
  <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;action=crew_add">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[183]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td>
            <!--ru-->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">ru</div>
                <input name="name_ru" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
            </div> 
            <!--en-->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">en</div>
                <input name="name_en" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
            </div>
            <!--location-->
            <div class="row">
              <div class="form-group col-lg-2 col-md-2 col-sm-3 col-xs-12">
                <select class="" name="location_en">
                  <option value="UKR">RESERVE</option>
                  <option value="UAE">WORK</option>
                </select>
              </div>
            </div>
            <div class="form-group text-right">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>

<div class="a-crews-edit">
    <form method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;action=crew_edit">
      <table class="table table-striped">
        <caption class="text-bold text-center"><?= $word[185]['name_'.$lang]; ?></caption>
        <thead>
          <tr>
            <th class="title text-center"><?= $word[51]['name_'.$lang]; ?></th>
            <th class="title text-center"><?= $word[17]['name_'.$lang]; ?></th>
            <th class="title text-center"><?= $word[53]['name_'.$lang]; ?></th>
            <th class="title text-center">
              <span class="glyphicon glyphicon-trash visible-xs" data-toggle="tooltip" title="<?= $word[26]['name_'.$lang]; ?>"></span>
              <span class="hidden-xs"><?= $word[26]['name_'.$lang]; ?></span>
            </th>
          </tr>
        </thead>
        <tbody>
      <?php foreach($allCrewSection as $key => $crew): ?>
         <tr class="a-crews-edit--<?= $crew['location_en']; ?>">
           <!--Название-->
           <td>
             <input name="id_crew[]" type="hidden" value="<?= $crew['id']; ?>">
             <div class="row">

               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                 <div class="form-group">
                   <div class="input-group">
                     <div class="input-group-addon">ru</div>
                     <input type="text" required="required" class="form-control" placeholder="<?= $word[51]['name_'.$lang]; ?>" value="<?= $crew['name_ru']; ?>">
                     <input name="name_ru[]" type="hidden" value="<?= $crew['name_ru']; ?>">
                   </div>
                 </div>
               </div>

               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                 <div class="form-group">
                   <div class="input-group">
                     <div class="input-group-addon">en</div>
                     <input type="text" required="required" class="form-control" placeholder="<?= $word[51]['name_'.$lang]; ?>" value="<?= $crew['name_en']; ?>">
                     <input name="name_en[]" type="hidden" value="<?= $crew['name_en']; ?>">
                   </div>
                 </div>
               </div>

             </div>
           </td>
           
           <!--Расположение-->
           <td>
              <div class="form-group">
                <div class="input-group">
                <select name="location_en[]" data-selected-option="<?= $crew['location_en']; ?>">
                  <option value="UKR">RESERVE</option>
                  <option value="UAE">WORK</option>
                </select>
                </div>
              </div>
           </td>

           <!--Приоритет-->
           <td>
             <div class="form-group">
                <div class="input-group">
                 <input type="text" class="form-control" value="<?= $crew['priority']; ?>" pattern="[0-9]+$">
                 <input name="priority[]" required="required" type="hidden" value="<?= $crew['priority']; ?>">
               </div>
             </div> 
           </td>
           <!--Удалить-->
           <td>
             <div class="form-group">
                <div class="input-group">
                 <input type="checkbox" value="1">
                 <input name="hide[]" type="hidden" value="0">
               </div> 
             </div> 
           </td>
         </tr>
       <?php endforeach; ?>
          <!--Отправить-->
        <tr>
          <td colspan="5">
            <div class="form-group text-right">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </div>
          </td>
        </tr>
      </tbody>  
    </table>
</div>
