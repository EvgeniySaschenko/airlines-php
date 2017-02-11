/* Добавляет иконку к элементу с класом .icon-section и атрибутом [data-id-section]  */
(function() {
  var idSection;
  $('[data-id-section]').each(function(i, elem) {
    idSection = $(this).data('id-section');
    if(idSection == 3) {
      $(this).find('.icon-section').addClass('fa fa-plane');
    } else if(idSection == 4) {
      $(this).find('.icon-section').addClass('fa fa-wrench');
    } else if(idSection == 5) {
      $(this).find('.icon-section').addClass('fa fa-desktop');
    } else if(idSection == 6) {
      $(this).find('.icon-section').addClass('fa fa-file');
    } else if(idSection == 9) {
      $(this).find('.icon-section').addClass('fa fa-shield');
    } else if(idSection == 12) {
      $(this).find('.icon-section').addClass('fa fa-medkit');
    } else if(idSection == 13) {
      $(this).find('.icon-section').addClass('fa fa-users');
    } else if(idSection == 14) {
      $(this).find('.icon-section').addClass('fa fa-handshake-o');
    } else {
      $(this).find('.icon-section').addClass('fa fa-file');
    }
  });
}).call(this);
