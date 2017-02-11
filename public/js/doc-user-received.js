/* Меняет состояние чекбокса (checked, disabled) в зависимости от атрибутов [data-date-view] и [data-date-studied] */
(function() {
  var dateView, dateStudied;
  $('.doc-user-received .checkbox-study').attr('disabled', 'disabled');
  $('.doc-user-received tr').each(function() {
    dateStudied = $(this).data('date-studied');
    dateView = $(this).data('date-view');
    /* Если документ был скачан делает чекбокс активным */
    if(dateStudied === '0000-00-00 00:00:00' && dateView !== '0000-00-00 00:00:00') {
      $(this).find('.checkbox-study').removeAttr('checked');
      $(this).find('.checkbox-study').removeAttr('disabled');
    }
    
    /* Делает неактивным чекбокс документа который был изучен */
    if(dateStudied !== '0000-00-00 00:00:00') {
      $(this).find('.checkbox-study').attr('checked', 'checked');
      $(this).find('.checkbox-study').attr('disabled', 'disabled');
    }
  });
}).call(this);

/* Уберает атибут [disabled] если файл был скачан */
(function() {
  var currentIdUser, idUser, dateStudied;
  $('.doc-user-received .download').on('click', function() {
    currentIdUser = $('body').data('current-id-user');
    idUser = $(this).parents('tr').data('id-user');
    dateStudied = $(this).parents('tr').data('date-studied'); 
    if(currentIdUser === idUser && dateStudied === '0000-00-00 00:00:00') {
      $(this).parents('tr').find('.checkbox-study').removeAttr('disabled');
    }
  });
}).call(this);


/* Уберает атибут [disabled] если файл был просмотрен */
(function() {
  var currentIdUser, idUser, dateStudied;
  $('.doc-user-received .call-modal-doc').on('click', function() {
    currentIdUser = $('body').data('current-id-user');
    idUser = $(this).parents('tr').data('id-user');
    dateStudied = $(this).parents('tr').data('date-studied'); 
    if(currentIdUser === idUser && dateStudied === '0000-00-00 00:00:00') {
      $(this).parents('tr').find('.checkbox-study').removeAttr('disabled');
    }
  });
}).call(this);




/* Блокирует чекбокс после нажания */
(function() {
  $('.doc-user-received .checkbox-study').on('change', function() {
    $(this).attr('disabled', 'disabled');
  });
}).call(this);


/* Уберает атибут [disabled] если файл был скачан */
(function() {
  var resultQuery, dateStudied, id;
  $('body[data-result-query]').change(function() {
    setTimeout(function() {
      resultQuery = $('body').attr('data-result-query');
        if(resultQuery === '1' || resultQuery === '0') {
          id = window.resultQuery['id'];
          dateStudied = window.resultQuery['date_studied'];
          if(dateStudied !== '0000-00-00 00:00:00') {
            $('[data-id="' + id + '"] .doc-user-received__info .place-notice').addClass('hidden');
            $('[data-id="' + id + '"] .doc-user-received__date-studied').text(dateStudied);
            $('.doc-user-received [data-id="' + id + '"] ').data('date-studied', dateStudied);
            $('.doc-user-received [data-id="' + id + '"]').removeClass('text-red');
            $('.doc-user-received [data-id="' + id + '"] .call-modal-doc').removeClass('text-red');
            $('[data-id="' + id + '"] .doc-user-received__checkbox .checkbox-study').attr('checked', 'checked');
            $('[data-id="' + id + '"] .doc-user-received__checkbox .checkbox-study').attr('disabled', 'disabled');
          } else {
            alert('Error');
            $('[data-id="' + id + '"] .doc-user-received__checkbox .checkbox-study').removeAttr('disabled');
          }
        }
    }, 1500);
  });
}).call(this);
