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
  var premissionRead, premissionEdit, premissionManageUsers;
  /* Чтение */
  $('.a-user-add__permission [data-premission-read-you]').each(function() {
    premissionRead = $(this).data('premission-read-you');
    if(premissionRead) {
      $(this).find('input[type="checkbox"]').attr('checked', 'checked');
      $(this).find('input[type="hidden"]').val('1');
    } else {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
      $(this).find('input[type="hidden"]').val('0');
    }
  });
  
  /* Редактирование */
  $('.a-user-add__permission [data-premission-edit-you]').each(function() {
    premissionEdit = $(this).data('premission-edit-you');
    if(!premissionEdit) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
      $(this).find('input[type="hidden"]').val('0');
    }
  });
  
  /* Удалить */
  $('.a-user-add__permission [data-premission-delete-you]').each(function() {
    premissionDelete = $(this).data('premission-delete-you');
    if(!premissionDelete) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
      $(this).find('input[type="hidden"]').val('0');
    }
  });
  
  /* Управление пользователями */
  $('.a-user-add__permission [data-premission-manage-users-you]').each(function() {
    premissionManageUsers = $(this).data('premission-manage-users-you');
    if(!premissionManageUsers) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
      $(this).find('input[type="hidden"]').val('0');
    }
  });
}).call(this);

/* Редактировать пользователя "Права доступа" */

(function() {
  var premissionRead, premissionEdit, premissionManageUsers, premissionReadYou, premissionEditYou, premissionManageUsersYou;
  /* Чтение */
  $('.a-user-edit__permission [data-premission-read]').each(function() {
    premissionRead = $(this).data('premission-read');
    premissionReadYou = $(this).data('premission-read-you');
    if(premissionRead) {
      $(this).find('input[type="checkbox"]').attr('checked', 'checked');
      $(this).find('input[type="hidden"]').val('1');
    } else {
      $(this).find('input[type="hidden"]').val('0');
    }
    /* Блокирует чекбоксы в зависимости от прав доступа */
    if(!premissionReadYou) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
    }
  });
  
  /* Редактирование */
  $('.a-user-edit__permission [data-premission-edit]').each(function() {
    premissionEdit = $(this).data('premission-edit');
    premissionEditYou = $(this).data('premission-edit-you');
    if(premissionEdit) {
      $(this).find('input[type="checkbox"]').attr('checked', 'checked');
      $(this).find('input[type="hidden"]').val('1');
    } else {
      $(this).find('input[type="hidden"]').val('0');
    }
    /* Блокирует чекбоксы в зависимости от прав доступа */
    if(!premissionEditYou) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
    }
  });
  
  /* Удаление */
  $('.a-user-edit__permission [data-premission-delete]').each(function() {
    premissionEdit = $(this).data('premission-delete');
    premissionEditYou = $(this).data('premission-delete-you');
    if(premissionEdit) {
      $(this).find('input[type="checkbox"]').attr('checked', 'checked');
      $(this).find('input[type="hidden"]').val('1');
    } else {
      $(this).find('input[type="hidden"]').val('0');
    }
    /* Блокирует чекбоксы в зависимости от прав доступа */
    if(!premissionEditYou) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
    }
  });
  
  /* Управление пользователями */
  $('.a-user-edit__permission [data-premission-manage-users]').each(function() {
    premissionManageUsers = $(this).data('premission-manage-users');
    premissionManageUsersYou = $(this).data('premission-manage-users-you');
    if(premissionManageUsers) {
      $(this).find('input[type="checkbox"]').attr('checked', 'checked');
      $(this).find('input[type="hidden"]').val('1');
    } else {
      $(this).find('input[type="hidden"]').val('0');
    }
    /* Блокирует чекбоксы в зависимости от прав доступа */
    if(!premissionManageUsersYou) {
      $(this).find('input[type="checkbox"]').attr('disabled', 'disabled');
    }
  });
}).call(this);