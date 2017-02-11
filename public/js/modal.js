/* Размеры модального окна */
(function() {
  var width, height;
  width = $('.content').width();
  height = $(window).height();
  $('.modal-doc__dialog').css({width: width});
  $('.modal-doc__body').css({height: height});
}).call(this);

/* Удаляет элементы для вызова модального окна если документ не PDF или Изображение */

(function() {
  var docExtension;
  $('[data-doc-extension]').each(function() {
    docExtension = $(this).data('doc-extension');
    if(docExtension == 'xlsx' || docExtension == 'xls' || docExtension == 'docx' || docExtension == 'doc' || docExtension == 'pptx' || docExtension == 'ppt') {
      $(this).find('.call-modal-doc').removeAttr('data-target');
      $(this).find('.call-modal-doc').removeAttr('data-toggle');
      $(this).find('.call-modal-doc').removeClass('call-modal-doc');
    }
  });
}).call(this);

/* Вызов модального окна с документом / Видео */
(function() {
  var idDoc, idSection, idSubsection, idSentDoc, name, docExtension, docLink, src, height, width, urlVideo, xmlhttp;
  $('.call-modal-doc').on('click', function(){
    idDoc = $(this).parents('.doc-data').data('id-doc');
    idSection = $(this).parents('.doc-data').data('id-section');
    idSubsection = $(this).parents('.doc-data').data('id-subsection');
    idSentDoc = $(this).parents('.doc-data').data('id-sent-doc');
    docExtension = $(this).parents('.doc-data').data('doc-extension');
    docLink = $(this).parents('.doc-data').data('link-doc');
    name = $(this).parents('.doc-data').data('name');
    height = $(window).height();
    
    // Если документ не отправлялся
    if(idSentDoc.length === 0) {
      idSentDoc = 0;
    }

    if(docLink === 0 || docLink.length === 0) {

      // Если документ загружен на сервер
      if(docExtension == 'pdf') {
        // PDF
        $('.modal-doc__body').css({height: height});
        src = '<iframe class="modal-doc__iframe" src="doc.php?id_section=' + idSection + '&id_subsection=' + idSubsection + '&id_doc=' + idDoc + '&id_sent_doc=' + idSentDoc + '&action=view"></iframe>';
      } else if(docExtension == 'mp4') {
        //MP4
        urlVideo = location.protocol + '//'+location.hostname+'/doc.php?id_section=' + idSection + '&id_subsection=' + idSubsection + '&id_doc=' + idDoc + '&id_sent_doc=' + idSentDoc + '&action=view';
        
        src = '<script class="splayer"> var params = {"playlist":[{"video":[{"url":"'+ urlVideo +'"}],"duration":0}],"uiLanguage":"ru","width":"640","height":"360"}; player.embed(params); </script>';

      } else {
        // IMG
        src = '<img class="modal-doc__img" src="doc.php?id_section=' + idSection + '&id_subsection=' + idSubsection + '&id_doc=' + idDoc + '&id_sent_doc=' + idSentDoc + '&action=view">';
      }
      
    } else {
      // Если документ - ссылка на ресурс - ОТКРЫВАЕТ картинку чтобы послать GET запрос
        src = '<img class="modal-doc__img" src="doc.php?id_section=' + idSection + '&id_subsection=' + idSubsection + '&id_doc=' + idDoc + '&id_sent_doc=' + idSentDoc + '&action=view">';
        window.open(docLink, '_blank');
        // Выполняется с задержкой - нужно чтобы отрисовалось модальное окно
        setTimeout(function() {
           $('.modal-doc .close').click();
        }, 1000);   
    }
    $('.modal-doc__title').text(name);
    $('.modal-doc__body').html(src);
  });
}).call(this);


/* Удалить элемент при закрытии модального окна - Видео */
(function() {
  $('.modal-doc .close').on('click', function(){
    $('.modal-doc').find('video').remove();
  });
}).call(this);

/* Вызов модального для загрузки документа на сервер Edit */
(function() {
  var idDoc, idSection, idSubsection, name, action, url, lang;
  $('.call-modal-edit-doc').on('click', function() {
    lang = $('body').data('lang');
    idDoc = $(this).parents('.doc-data').data('id-doc');
    idSection = $(this).parents('.doc-data').data('id-section');
    idSubsection = $(this).parents('.doc-data').data('id-subsection');
    name = $(this).parents('.doc-data').data('name');
    action = $(this).parents('.doc-data').data('action');
    url = 'update.php?lang='+ lang + '&id_section=' + idSection + '&id_subsection=' + idSubsection + '&id_doc=' + idDoc + '&action=' + action;
    $('.a-modal-edit-doc__title').text(name);
    $('.a-modal-edit-doc__body form').attr('action', url);
  });
}).call(this);


/* Вызов модального для изменения ссылки  на документ Edit */
(function() {
  var idDoc, idSection, idSubsection, name, action, url, lang, linkDoc;
  $('.call-modal-edit-doc-link').on('click', function() {
    lang = $('body').data('lang');
    idDoc = $(this).parents('.doc-data').data('id-doc');
    idSection = $(this).parents('.doc-data').data('id-section');
    idSubsection = $(this).parents('.doc-data').data('id-subsection');
    name = $(this).parents('.doc-data').data('name');
    linkDoc = $(this).parents('.doc-data').data('link');
    action = 'doc_link_update';
    url = 'update.php?lang='+ lang + '&id_section=' + idSection + '&id_subsection=' + idSubsection + '&id_doc=' + idDoc + '&action=' + action;
    $('.a-modal-edit-doc-link__title').text(name);
    $('.a-modal-edit-doc-link__body form').attr('action', url);
    $('.a-modal-edit-doc-link__field-link').attr('value', linkDoc);
    console.log(linkDoc);
  });
}).call(this);