/* Поворот текста в таблице */
(function() {
    $(".a-flight-report .table-1 .vertical-text div").rotate(270);
}).call(this);

/* Поворот текста в таблице */
(function() {
  var widthTab, widthScreen, widthContent, indentLeft;
    widthScreen = $(window).width();
    widthTab = $(".a-flight-report__container").width();
    widthContent = $(".content").width(); 
    
    if(widthScreen > widthTab) {
      indentLeft = ((widthScreen - widthContent) / 2 - (widthScreen - widthTab) / 2) * -1;
    } else {
      indentLeft = (widthScreen - widthContent) / -2;
    }
    
    $(".a-flight-report__container").css('left', indentLeft);
}).call(this);