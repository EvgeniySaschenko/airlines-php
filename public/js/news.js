/* Заменяет текстовые ссылки на гипер ссылки */
(function() {
  function findUrls(text) {
      var source = (text || '').toString();
      var urlArray = [];
      var url;
      var matchArray;

      // Regular expression to find FTP, HTTP(S) and email URLs.
      var regexToken = /(((ftp|https?):\/\/)[\-\w@:%_\+.~#?,&\/\/=]+)/g;

      // Iterate through any URLs in the text.
      while ((matchArray = regexToken.exec(source)) !== null) {
          var token = matchArray[0];
          urlArray.push(token);
      }

      return urlArray;
  }
  
  $(".news__content").each(function (index, elem) {
      var mess = $(this).html();
      var urlArray = findUrls(mess);
      urlArray.forEach(function (url) {
          var temp = mess.split(url);
          /* Если строка содержыт https://www.youtube.com преобразовать в плеер, иначе в ссылку */
          
          if(0 === url.indexOf('https://www.youtube.com/', 0)){
            mess = temp.join("<iframe src='" + url + "' frameborder='0' allowfullscreen></iframe>");
          } else {
            mess = temp.join("<div class='cut-text'><a target='_blank' href=\"" + url + "\">Ссылка</a></div>");
          }

      });
          $(elem).html(mess);
  });
}).call(this);

