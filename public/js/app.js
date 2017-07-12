(function() {
  $(document).ready(function() {
    var include;
    include = function(name) {
      $('body').append('<script type="text/javascript" src="/public/js/' + name + '.js?17"></script>');
    };
    include('ajax-form');
    include('ajax-pagination');
    include('common');
    include('table');
    include('form');
    include('date');
    include('modal');
    include('doc');
    include('nav-section');
    include('nav-breadcrumb');
    include('nav-pagination');
    include('nav-tabs');
    include('section');
    include('user-current');
    include('doc-user-received');
    include('accordion');
    include('browser');
    include('notice');
    include('a-user');
    include('flight-report');
    include('news');
    include('home');
    include('slider');
    include('division-department');
    include('manage-site');
    include('maskedinput'); 
    include('captcha'); 
    include('pool'); 
  });
}).call(this);
