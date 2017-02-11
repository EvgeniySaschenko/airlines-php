<div class="notice">
  <!--User Added-->
  <div data-notice="#noticeAddSectionSite" data-ancor="listSectionSite" class="hidden alert alert-success" role="alert">
    <?= $word[217]['name_'.$lang]; ?>
  </div>
  <!--Section Update-->
  <div data-notice="#noticeUpdateSectionSite" data-ancor="listSectionSite" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
  <!--User Error-->
  <div data-notice="#noticeErrorAddSectionSite" data-ancor="listSectionSite" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-section-site-list-add">
  <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;action=add_subsection">
    <table class="table">
      <caption class="text-bold text-center"><?= $word[308]['name_'.$lang]; ?></caption>
      <thead class="crew__table-head--<?= $crew['location_en']; ?>">
        <tr>
          <th class="text-center"><?= $word[150]['name_'.$lang]; ?> ru</th>
          <th class="text-center"><?= $word[150]['name_'.$lang]; ?> en</th>
          <th class="text-center"><?= $word[91]['name_'.$lang]; ?></th>
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
          <!--Разделы-->
          <td>
            <?= dropDownList('id_section_department', $allSectionsDepartmentHide); ?>
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
          <!--Отправить-->
          <td class="a-doc__submit text-right" colspan="4">
             <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>


<div class="a-section-site-list-edit">
    <form method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;action=edit_section">
      <table class="table table-striped">
        <caption class="text-bold text-center"><?= $word[309]['name_'.$lang]; ?></caption>
        <thead>
          <tr>
            <th class="title text-center"><?= $word[51]['name_'.$lang]; ?></th>
            <th class="title text-center"><?= $word[53]['name_'.$lang]; ?></th>
            <th class="title text-center"><?= $word[10]['name_'.$lang]; ?></th>
            <th class="title text-center">
              <span class="glyphicon glyphicon-trash visible-xs" data-toggle="tooltip" title="<?= $word[26]['name_'.$lang]; ?>"></span>
              <span class="hidden-xs"><?= $word[73]['name_'.$lang]; ?></span>
            </th>
          </tr>
        </thead>
        <tbody>

      <?php foreach($allSectionsHide as $sectionHide): ?>
         <tr class="a-section-site-list__section text-bold">
           <!--Название-->
           <td>
             <input name="id_section[]" type="hidden" value="<?= $sectionHide['id']; ?>">
             <div class="row">

               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                 <div class="form-group">
                   <div class="input-group">
                     <div class="input-group-addon">ru</div>
                     <input name="section_name_ru[]" type="text" required="required" class="form-control" placeholder="<?= $word[51]['name_'.$lang]; ?>" value="<?= $sectionHide['name_ru']; ?>">
                   </div>
                 </div>
               </div>

               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                 <div class="form-group">
                   <div class="input-group">
                     <div class="input-group-addon">en</div>
                     <input name="section_name_en[]" type="text" required="required" class="form-control" placeholder="<?= $word[51]['name_'.$lang]; ?>" value="<?= $sectionHide['name_en']; ?>">
                   </div>
                 </div>
               </div>

             </div>
           </td>

           <!--Приоритет-->
           <td>
             <div class="form-group">
                <div class="input-group">
                 <input name="section_priority[]" type="text" class="form-control" value="<?= $sectionHide['priority']; ?>">
               </div>
             </div> 
           </td>
           
           <!--Тип-->
           <td>
             <?= $sectionHide['type']; ?>
           </td>
           
           <!--Удалить-->
           <td>
             <div class="form-group" data-section-site-list-hide="<?= $sectionHide['hide']; ?>">
                <div class="input-group">
                 <input class="section__hide" type="checkbox" value="1">
                 <input name="section_hide[]" type="hidden" value="0">
               </div> 
             </div> 
           </td>
         </tr>
         
          <?php foreach($allSubsectionsHide as $subsectionHide): ?>
            <?php if($sectionHide['id'] == $subsectionHide['id_section']): ?>
             <tr class="a-section-site-list__subsection">
               <!--Название-->
               <td>
                 <input name="id_subsection[]" type="hidden" value="<?= $subsectionHide['id']; ?>">
                 <div class="row">

                   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                     <div class="form-group">
                       <div class="input-group">
                         <div class="input-group-addon">ru</div>
                         <input name="subsection_name_ru[]" type="text" required="required" class="form-control" placeholder="<?= $word[51]['name_'.$lang]; ?>" value="<?= $subsectionHide['name_ru']; ?>">
                       </div>
                     </div>
                   </div>

                   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                     <div class="form-group">
                       <div class="input-group">
                         <div class="input-group-addon">en</div>
                         <input name="subsection_name_en[]" type="text" required="required" class="form-control" placeholder="<?= $word[51]['name_'.$lang]; ?>" value="<?= $subsectionHide['name_en']; ?>">
                       </div>
                     </div>
                   </div>

                 </div>
               </td>
          
               <!--Приоритет-->
               <td>
                 <div class="form-group">
                    <div class="input-group">
                     <input name="subsection_priority[]" type="text" class="form-control" value="<?= $subsectionHide['priority']; ?>">
                   </div>
                 </div> 
               </td>
               
              <!--Тип-->
              <td>
                <?= $subsectionHide['type']; ?>
              </td>
               
               <!--Удалить-->
               <td>
                 <div class="form-group" data-section-site-list-hide="<?= $subsectionHide['hide']; ?>">
                    <div class="input-group">
                     <input class="subsection__hide" type="checkbox" value="1">
                     <input name="subsection_hide[]" type="hidden" value="0">
                   </div> 
                 </div> 
               </td>
             </tr>
            <?php endif; ?>
           <?php endforeach; ?>
         
         
         
       <?php endforeach; ?>
          <!--Отправить-->
        <tr>
          <td colspan="4">
            <div class="form-group text-right">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </div>
          </td>
        </tr>
      </tbody>  
    </table>
  </form>   
</div>
