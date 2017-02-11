///* Отправка формы */
//(function() {
//  $('.pagination li').on('click', function() {
//    var action, method;
//    action = 'select.php?' + $(this).data('action');
//    method = 'get';
//    $.ajax({
//      type: method,
//      url: action,
//      dataType: "json",
//      success: function(data) {
//        window.resultQuery = data[0];
//        console.log($(data[0]));
//        $('body').attr('data-result-query', 1);
//      },
//      error: function(xhr, str) {
//        window.resultQuery = 'err';
//        $('body').attr('data-result-query', 0);
//      }
//    });
//  });
//}).call(this);
