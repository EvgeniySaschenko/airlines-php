/* Выводит уведомление в зависимости от Якоря */
(function() {
  var ankor, dataAncor;
  ankor = document.location.hash;
  if(ankor) {
    $('.notice [data-notice="' + ankor + '"]').removeClass('hidden');
    dataAncor = $('.notice [data-notice="' + ankor + '"]').data('ancor');
    if(dataAncor) {
       window.location.hash = dataAncor;
       $('.nav-tabs a[href="' + document.location.hash + '"]').tab('show');
    }
    
  }
}).call(this);