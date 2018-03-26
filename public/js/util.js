$(function () {
    $(".navbar-nav li").each(function (index) {
        var requestUrl = window.location.pathname;
        var href = $(this).children('a').attr('href');

        requestUrl = requestUrl.split('/');
        href = href.split('/');
        requestUrl = requestUrl[0] == '' ? requestUrl[1] : requestUrl[0];
        href = href[0] == '' ? (href.length > 1 ? href[1] : href[0]) : href[0]; //Pego a controller

        if (href.trim() == requestUrl.trim()) {
            $(this).addClass("active");
            //$(this).parents('li').addClass("active");
            $(this).parents("li").find(".accordion-toggle").addClass("menu-open");
        }
    });
});


function fbShare(url) {
    return window.open("http://www.facebook.com/sharer.php?u=" + url, "sharer", "toolbar=0,status=0,width=548,height=450");
}

function twitterShare(text, url) {
    window.open("https://twitter.com/intent/tweet?text=" + text + (url.length > 0 ? " " + encodeURIComponent(url) : ""), "sharer", "toolbar=0,status=0,width=548,height=450")
}

function pagination(offset) {
  var param = getParameterByName("offset");
  var query = window.location.search;

  if (param != null && param != "")
    query = query.replace("offset=" + param, "offset=" + offset);
    
  if (query != "")
    window.location.href = window.location.pathname + query;
  else
    window.location.href = window.location.pathname + "?offset=" + offset;
}

function tag(tag) {
  var param = getParameterByName("tag");
  var query = window.location.search;

  if (param != null && param != "")
    query = query.replace("tag=" + encodeURI(param), "tag=" + tag);
    
  if (query != "")
    window.location.href = window.location.pathname + query;
  else
    window.location.href = window.location.pathname + "?tag=" + tag;
}

function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

/********************  TEXTAREA - CONTA CARACTER  ***********************/
function contaCaracterInit(id, maxLength) {
    var textArea = $(id);
    $(id).change(function () { contaCaracter($(id), maxLength); });
    $(id).keydown(function () { contaCaracter($(id), maxLength); });
    $(id).keyup(function () { contaCaracter($(id), maxLength); });
    contaCaracter($(id), maxLength);
}

function contaCaracter(textArea, maxLength) {
    var length = $(textArea).val().length;

    var span = $(textArea).next("span");
    if (span == undefined || span == null || span.length == 0) {
        $(textArea).closest("div").append("<span/>");
        span = $(textArea).next("span");
    }

    if (length > maxLength)
        $(textArea).val($(textArea).val().substring(0, maxLength));
    else {
        var diff = maxLength - length;
        $(span).text(diff == 1 ? (diff + " caracter restante.") : (diff + " caracteres restantes."));
    }
}
/************************************************************************/