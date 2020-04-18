/* ================================================================
  jQuery
   ================================================================ */

// ---------------------------------------------
// スティッキーヘッダー
// ---------------------------------------------

$(function () {
  var $window = $(window),
    $header = $(".p-header"),
    threshold = $(".js-mainVisual").outerHeight();

  $window.on("scroll", function () {
    if ($window.scrollTop() > threshold) {
      $header.addClass("visible");
    } else {
      $header.removeClass("visible");
    }
  });
});

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
  $(".p-header__menu").on("click", function () {
    $(".p-header__menuLine").stop(true).toggleClass("active");
    $(".p-header__nav").stop(true).fadeToggle();
  });
});

$(function () {
  $(".p-header__nav, .p-header__logo").on("click", function () {
    if ($(".p-header__menuLine").hasClass("active")) {
      $(".p-header__menuLine").stop(true).toggleClass("active");
      $(".p-header__nav").stop(true).fadeToggle();
    }
  });
});

// ---------------------------------------------
// スムーススクロール（ページ内リンク）
// ---------------------------------------------
$(function () {
  $(".js-smoothscroll").click(function () {
    var speed = 500;
    (href = $(this).attr("href")),
      (target = $(href == "#" || href == "" ? "html" : href)),
      (position = target.offset().top);
    $("html, body").animate({ scrollTop: position }, speed);
  });
});

// ---------------------------------------------
// スライドショー
// ---------------------------------------------
$(function () {
  var $slides = $(".p-mainVisual__slideshow").find("img"),
    slideCount = $slides.length,
    currentIndex = 0;

  $slides.eq(currentIndex).fadeIn();
  setInterval(showNextSlide, 7500);

  function showNextSlide() {
    var nextIndex = (currentIndex + 1) % slideCount;
    $slides.eq(currentIndex).fadeOut(2000);
    $slides.eq(nextIndex).fadeIn(2000);
    currentIndex = nextIndex;
  }
});
