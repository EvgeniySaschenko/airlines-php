/* Убрать padding у .content на главных страницах департаментов */
(function() {
  $('.division-department').parent('.content').css({'paddingLeft' : '0', 'paddingRight' : '0'});
}).call(this);