/* ================================================================
  jQuery
   ================================================================ */

// ---------------------------------------------
// ハンバーガーメニュー
// ---------------------------------------------

//ウィンドウのリサイズ後にリロードする
$(function () {
  var timer = false;
  var prewidth = $(window).width();
  $(window).resize(function () {
    if (timer !== false) {
      clearTimeout(timer);
    }
    timer = setTimeout(function () {
      var nowWidth = $(window).width();
      if (prewidth !== nowWidth) {
        location.reload();
      }
      prewidth = nowWidth;
    }, 200);
  });
});

// ヘッダー
$(function () {
  $('.p-header__menu').on('click', function () {
    $('.p-header__menuLine').stop(true).toggleClass('active');
    $('.p-header__nav').stop(true).fadeToggle();
  });
});

$(function () {
  $('.p-header__nav, .p-header__logo').on('click', function () {
    if ($('.p-header__menuLine').hasClass('active')) {
      $('.p-header__menuLine').stop(true).toggleClass('active');
      $('.p-header__nav').stop(true).fadeToggle();
    }
  });
});

// ---------------------------------------------
// スムーススクロール（ページ内リンク）
// ---------------------------------------------
$(function () {
  $('.js-smoothscroll').click(function () {
    var speed = 500;
    href = $(this).attr("href"),
    target = $(href == "#" || href == "" ? 'html' : href),
    position = target.offset().top;
    $('html, body').animate({ scrollTop: position }, speed);
  });
});