/* Если срок действия документа заканчиваеться через 30 / 60 дней меняет цвет потомка с классом .place-notice, предок должен иметь атрибут [data-date-end-doc] */
(function() {
  var dateEndDoc, date, daysLeft, daysRed, daysOrange;
  date = moment().format('YYYY-MM-DD');
  daysRed = $('body').data('doc-days-red');
  daysOrange = $('body').data('doc-days-orange');
  
  $('[data-date-end-doc]').each(function(i, elem) {
    dateEndDoc = $(this).data('date-end-doc');
      if(dateEndDoc) {
        daysLeft = moment(dateEndDoc).diff(date, 'days');
        if(daysLeft <= daysRed && dateEndDoc !== '0000-00-00') {
          $(this).find('.place-notice').addClass('text-red');
          $(this).find('.call-modal-doc').addClass('text-red');
          $(this).addClass('text-red');
          
        } else if(daysLeft > daysRed && daysLeft < daysOrange && dateEndDoc !== '0000-00-00'){
          $(this).find('.place-notice').addClass('text-orange');
          $(this).find('.call-modal-doc').addClass('text-orange');
          $(this).addClass('text-orange');
        } else {
          $(this).find('.place-notice').remove();
        }
      }
  });
}).call(this);

/* Отправленные документы - если документ не изучен, меняет цвет иконки. Предок должен иметь атрибут [date-studied], потомок класс .place-notice  */
(function() {
  var dateStudied;
  $('[data-date-studied]').each(function(i, elem) {
    dateStudied = $(this).data('date-studied');
    if(dateStudied == '0000-00-00 00:00:00') {
      $(this).find('.place-notice').addClass('text-red');
      $(this).addClass('text-red');
      $(this).find('.call-modal-doc').addClass('text-red');
    } else {
      $(this).find('.place-notice').remove();
    }
  });
}).call(this);

/* Добавляет иконку документу, предок элемента должен иметь атрибут [data-doc-extension], у элемента должен быть класс .download  */
(function() {
  var docExtension;
  $('[data-doc-extension]').each(function() {
    docExtension = $(this).data('doc-extension');
    if(docExtension == 'pdf') {
      $(this).find('.download').addClass('fa fa-file-pdf-o text-color-pdf');
    } else if(docExtension == 'xlsx' || docExtension == 'xls') {
      $(this).find('.download').addClass('fa fa-file-excel-o text-color-excel');
    } else if(docExtension == 'docx' || docExtension == 'doc') {
      $(this).find('.download').addClass('fa fa-file-word-o text-color-word');
    } else if(docExtension == 'jpg' || docExtension == 'jpeg' || docExtension == 'png' || docExtension == 'gif') {
      $(this).find('.download').addClass('fa fa-file-image-o text-color-image');
    } else if(docExtension == 'pptx' || docExtension == 'ppt') {
      $(this).find('.download').addClass('fa fa-file-powerpoint-o text-color-powerpoint');
    } else if(docExtension == 'mp4') {
      $(this).find('.download').addClass('fa fa-film text-color-video');
    } else {
      /* Удаляет класс скачать - если это ссылка */ 
      $(this).find('.download').addClass('glyphicon glyphicon-link');
      $(this).find('.download').removeAttr('href');
      $(this).find('.download').removeClass('download');
    }
  });
}).call(this);


  /* Документы - Блокирует чекбокс - удалить */
  $('.a-doc-edit [data-permission-doc-delete-you]').each(function() {
    var dataPermissionDocDeleteYou = $(this).data('permission-doc-delete-you');
    /* Блокирует чекбоксы в зависимости от прав доступа */
    if(!dataPermissionDocDeleteYou) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
    }
  });

  /* Документы пользователя - Блокирует чекбокс - удалить */
  $('.a-doc-user [data-permission-user-doc-delete-you]').each(function() {
    var dataPermissionDocDeleteYou = $(this).data('permission-user-doc-delete-you');
    /* Блокирует чекбоксы в зависимости от прав доступа */
    if(!dataPermissionDocDeleteYou) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
    }
  });
  
    /* Документы новости - Блокирует чекбокс - удалить */
  $('.a-news-doc-edit [data-permission-news-doc-delete-you]').each(function() {
    var dataPermissionNewsDocDleteYou = $(this).data('permission-news-doc-delete-you');
    /* Блокирует чекбоксы в зависимости от прав доступа */
    if(!dataPermissionNewsDocDleteYou) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
    }
  });
 