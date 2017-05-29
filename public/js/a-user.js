/* Список пользователей */

/* Если пользоветель отключен выделяет поле */
(function() {
  var hideUser;
  $('.a-user-list [data-user-hide]').each(function() {
    hideUser = $(this).data('user-hide');
    if(hideUser == 1) {
      $(this).find('td').css('backgroundColor', '#ebccd1');
    }
  });
}).call(this);



/* Подсветка дат рождения за 10 дней */
(function() {
  var userDateBirth;

    $('[data-user-date-birth]').each(function() {
      userDateBirth = $(this).data('user-date-birth');
      if(userDateBirth == 1) {
       $(this).find('td').css('backgroundColor', '#F5DA81');
      }
    });
}).call(this);


/* Добавить пользователя "Права доступа" */

(function() {

  function addPermissionUser(selectorGeneral, selectorPermissionYou) {
    $(selectorGeneral).each(function() {
      var premission = $(this).data(selectorPermissionYou);
      if(!premission) {
        $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
        $(this).find('input[type="hidden"]').val('0');
      }
    });
  }


/* Старая версия (права проставлялись в профилях пользователей)*/
// Чтение
addPermissionUser('.a-user-add__permission [data-premission-read-you]', 'premission-read-you');
// Редактрорование
addPermissionUser('.a-user-add__permission [data-premission-edit-you]', 'premission-edit-you');
// Удалить
addPermissionUser('.a-user-add__permission [data-premission-delete-you]', 'premission-delete-you');
// Управление пользователями
addPermissionUser('.a-user-add__permission [data-premission-manage-users-you]', 'premission-manage-users-you');

/* Новая версия (права отдельно от профилей пользователя)*/
// Чтение
addPermissionUser('.a-user-permission-add__permission [data-premission-read-you]', 'premission-read-you');
// Редактрорование
addPermissionUser('.a-user-permission-add__permission [data-premission-edit-you]', 'premission-edit-you');
// Удалить
addPermissionUser('.a-user-permission-add__permission [data-premission-delete-you]', 'premission-delete-you');
// Управление пользователями
addPermissionUser('.a-user-permission-add__permission [data-premission-manage-users-you]', 'premission-manage-users-you');


}).call(this);

/* Редактировать пользователя "Права доступа" */

(function() {


    function editPermissionUser(selectorGeneral, selectorGeneralThis, selectorPermissionYou) {
        $(selectorGeneral).each(function() {
          if($(this).data(selectorGeneralThis)) {
            $(this).find('input[type="checkbox"]').attr('checked', 'checked');
            $(this).find('input[type="hidden"]').val('1');
          } else {
            $(this).find('input[type="hidden"]').val('0');
          }
          /* Блокирует чекбоксы в зависимости от прав доступа */
          if(!$(this).data(selectorPermissionYou)) {
            $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
          }
        });
    }
    /* Старая версия (права проставлялись в профилях пользователей)*/
    /* Чтение */
    editPermissionUser('.a-user-edit__permission [data-premission-read]', 'premission-read', 'premission-read-you');

    /* Редактирование */
    editPermissionUser('.a-user-edit__permission [data-premission-edit]', 'premission-edit', 'premission-edit-you');

    /*  Удаление */
    editPermissionUser('.a-user-edit__permission [data-premission-delete]', 'premission-delete', 'premission-delete-you');

    /*  Управление пользователями */
    editPermissionUser('.a-user-edit__permission [data-premission-manage-users]', 'premission-manage-users', 'premission-manage-users-you');
    
    
    /* Новая версия (права отдельно от профилей пользователя)*/
    /* Чтение */
    editPermissionUser('.a-user-permission-edit [data-premission-read]', 'premission-read', 'premission-read-you');

    /* Редактирование */
    editPermissionUser('.a-user-permission-edit [data-premission-edit]', 'premission-edit', 'premission-edit-you');

    /*  Удаление */
    editPermissionUser('.a-user-permission-edit [data-premission-delete]', 'premission-delete', 'premission-delete-you');

    /*  Управление пользователями */
    editPermissionUser('.a-user-permission-edit [data-premission-manage-users]', 'premission-manage-users', 'premission-manage-users-you');
}).call(this);