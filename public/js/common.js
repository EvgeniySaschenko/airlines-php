/* Всплывающие подсказки инициализация  */
(function() {
  $('[data-toggle="tooltip"]').tooltip();
}).call(this);

/* Орезка длинных предложений */
(function() {

  function cutText() {
    $(".cut-text").dotdotdot({
    	ellipsis: "... ",
    	wrap: "word",
    	fallbackToLetter: true,
    	after: null,
    	watch: 'window',
    	height: null,
    	tolerance: 0,
    	callback: function(isTruncated, orgContent){},
    	lastCharacter: {
    		remove: [" ", ",", ";", ".", "!", "?"],
    		noEllipsis: []
    	}
    });
  }
  cutText();

  $(window).resize(function() {
    cutText();
  });

}).call(this);


/* Выбрать OPTION в SELECT  */
(function() {
  var valSelectedOption, valOption;
  $('select[data-selected-option]').each(function() {
    valSelectedOption = $(this).data('selected-option');
      $(this).children().each(function() {
        valOption = $(this).val();
        
        if(valSelectedOption == valOption) {
          $(this).attr('selected', 'selected');
        }
      });
  });
}).call(this);


/* Удаляет ссылки на профиль пользователя - если нет права на просмотр личных документов, оставляет ссылку для своих документов */
(function() {
  var permissionReadPersonalDoc, currentIdUser, linkProfileIdUser;
  permissionReadPersonalDoc = $('body').data('permission-read-personal-doc');
  currentIdUser = $('body').data('current-id-user');
  if(!permissionReadPersonalDoc) {
    $('.link-profile-user').each(function(){
      linkProfileIdUser = $(this).data('link-profile-user-id');
      if(linkProfileIdUser != currentIdUser) {
       $(this).removeAttr('href');
      }
    });
  }
}).call(this);