/* CHECKBOX */

/* Кликает по всем чекбоксам на странице где значение [data-checkbox-select] равно [data-checkbox-select-all]  */
(function() {
  var checkboxSelectAll, checkboxSelect, checked;
  $('[data-checkbox-select-all]').on('click', function() {
    checkboxSelectAll = $(this).attr('data-checkbox-select-all');
    checked = $(this).attr('checked');
    $('[data-checkbox-select]').each(function() {
      checkboxSelect = $(this).attr('data-checkbox-select');
      if(checkboxSelectAll === checkboxSelect) {
        $(this).click();
      }
    });
  });
}).call(this);


/*  Меняет значение скрытого input при установке / снятии галочки checkbox - оба должны находится в классе .input-group */
(function() {
  var inputHidden, inputVal;
  $('[type="checkbox"]').on('click', function() {
    inputVal = $(this).val(); 
    inputHidden = $(this).parents('.input-group').find('[type="hidden"]');
    if( $(this).is(':checked') === true ) {
        inputHidden.val(inputVal);
    } else {
        inputHidden.val('0');
    }
  });
}).call(this);

/* INPUT */
(function() {
  var inputHidden, inputVal;
  $('input[type="text"]').on('change', function() {
    inputVal = $(this).val(); 
    inputHidden = $(this).parents('.input-group').find('[type="hidden"]');
    inputHidden.val(inputVal);
  });
}).call(this);
