/* Добавляет якрь URL при переключении вкладки */
(function() {
  var anchor;
  $('.nav-tabs a').on('click', function() {
    anchor = $(this).attr('href');
    window.location.href = anchor;
  });
}).call(this);

/* Скрывает соответствующую вкладку для раздела с документами и книгами если в разделе нет Документов(не в книгах) или Книг */
(function() {
  var idSection, ariaControls, ancor;
  ancor = document.location.hash;
  $('.nav-tabs--doc-and-book [data-id-section]').each(function() {
    idSection = $(this).data('id-section');
    
    /* Скрывает вкладку если в ней нет Документов или Папок */
    if(idSection == 0) {
      $(this).hide();
    }

    if(ancor) {
      /* Делает активной вкладку в зависимости от якоря */
      $(this).find('[data-ancor=' + ancor + ']').parents('li').addClass('active');
      $('.nav-tabs--doc-and-book .tab-content [data-ancor=' + ancor + ']').addClass('active');
    } else {
      /* Делает активной первую видимую вкладку */
      $('.nav-tabs--doc-and-book .nav-tabs li:visible:first').addClass('active');
      ariaControls = $('.nav-tabs--doc-and-book li:visible:first').children().attr('aria-controls');
      $('#' + ariaControls).addClass('active');
    }
  });
}).call(this);


/* Делает вкладку активной в зависимости от URL */
(function() {
  var tabs;
  $('.nav-tabs a[href="' + document.location.hash + '"]').tab('show');
  if(document.location.hash  == '#navBottom') {
    $('.nav-tabs a:visible:first').tab('show');
  }
}).call(this);