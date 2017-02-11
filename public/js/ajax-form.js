/* Отправка формы dataType: "h", */
(function() {
  $('.send-doc .send-form').on('click', function() {
    var action, method, dataForm, dataType, resetForm;
    action = $(this).parents('form').attr('action');
    method = $(this).parents('form').attr('method');
    dataForm = $(this).parents('form').serializeArray();
    resetForm = $(this).parents('form').find('[type="reset"]');
    dataType = 'html';
    if(method === 'get') {
      dataForm = JSON.stringify($(this).parents('form').serializeArray());
      dataType = 'json';
    }
    $.ajax({
      type: method,
      url: action,
      data: dataForm,
      dataType: dataType,
      success: function(data) {
        window.resultQuery = data[0];
        $('body').attr('data-result-query', '1');
        /* Очистка формы */
        resetForm.click();
        /* Уведомление об отправке  (с post не работает "doc-user-received")*/
        if(method == 'post') {
          $('.modal-notice__title').text(data);
          // Подсветка красным цветом уведомления если документ не отправлен
          if(data == 'Документ не отправлен' || data == 'The document is not sent') {
              $('.modal-notice .modal-content').addClass('notice-red');
          } else {
              $('.modal-notice .modal-content').removeClass('notice-red');
          }
          
          $('.modal-notice').modal();
        }
      },
      error: function(xhr, str) {
        window.resultQuery = '0';
        $('body').attr('data-result-query', '0');
        console.log('Error AJAX');
        /* Уведомление об ошибке */
        $('.modal-notice__title').text('Error');
        $('.modal-notice').modal();
      }
    });
  });
}).call(this);

// Опраленные документы на изучение
(function() {
  $('#docUserReceived .send-form').on('change', function() {
    var action, method, dataForm, dataType, resetForm;
    action = $(this).parents('form').attr('action');
    method = $(this).parents('form').attr('method');
    dataForm = $(this).parents('form').serializeArray();
    resetForm = $(this).parents('form').find('[type="reset"]');
    dataType = 'html';
    if(method === 'get') {
      dataForm = JSON.stringify($(this).parents('form').serializeArray());
      dataType = 'json';
    }
    $.ajax({
      type: method,
      url: action,
      data: dataForm,
      dataType: dataType,
      success: function(data) {
        window.resultQuery = data[0];
        $('body').attr('data-result-query', '1');
        /* Очистка формы */
        resetForm.click();
        /* Уведомление об отправке  (с post не работает "doc-user-received")*/
        if(method == 'post') {
          $('.modal-notice__title').text(data);
          // Подсветка красным цветом уведомления если документ не отправлен
          if(data == 'Документ не отправлен' || data == 'The document is not sent') {
              $('.modal-notice .modal-content').addClass('notice-red');
          } else {
              $('.modal-notice .modal-content').removeClass('notice-red');
          }
          
          $('.modal-notice').modal();
        }
      },
      error: function(xhr, str) {
        window.resultQuery = '0';
        $('body').attr('data-result-query', '0');
        console.log('Error AJAX');
        /* Уведомление об ошибке */
        $('.modal-notice__title').text('Error');
        $('.modal-notice').modal();
      }
    });
  });
}).call(this);