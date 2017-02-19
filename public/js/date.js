/* Задает формат даты - для класса .date-picker дата юудет отображаться в формате dd.mm.YYYY */
(function() {
  var lang;
  lang = $('body').data('lang');
  $('.date-picker').datetimepicker({
    pickTime: false,
    language: 'ru'
  });
}).call(this);

/* jquery.textchange.js !!!!!!!!!!!!!!!!!
 * Получает введеную дату из дату из input с классом .date-input
 * и добавляет её скрытый input с классом .date-input-hidden в формате MySQL,
 * оба input должны находится в радительском элементе с классом .date-input-group
 */
(function() {
  $('.datepicker').on('hover', function() {
    $('.date-input-group .date-input-hidden');
  });
}).call(this);


(function() {
  $('.picker-time').datetimepicker({
        format: 'HH:mm',
        pickDate: false,
        pickSeconds: false,
        pick12HourFormat: false  
  });
}).call(this);