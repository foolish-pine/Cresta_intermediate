/* ================================================================
  jQuery
   ================================================================ */

$(function () {
  // ---------------------------------------------
  // スティッキーヘッダー
  // ---------------------------------------------

  var $window = $(window),
    $header = $(".js-header"),
    threshold = $(".js-main-visual").outerHeight();

  $window.on("scroll", function () {
    if ($window.scrollTop() > threshold) {
      $header.addClass("visible");
    } else {
      $header.removeClass("visible");
    }
  });

  // ---------------------------------------------
  // ハンバーガーメニュー
  // ---------------------------------------------

  var mq = window.matchMedia("screen and (max-width:767px)");

  var $headerNav = $(".js-headerNav"),
    $headerMenuIcon = $(".js-headerMenuIcon"),
    $headerMenuIconLine = $(".js-headerMenuIconLine");

  $(window).on("resize", function () {
    if (mq.matches) {
      // 画面幅767px以下のとき
      // navを非表示にする
      $headerNav.hide();
      // メニューアイコンを非activeにする
      $headerMenuIconLine.removeClass("active");
    } else {
      // 画面幅768px以上のとき
      // navを表示させる
      $headerNav.show();
    }
  });

  // メニューアイコンをクリックしてnavを開閉する
  $headerMenuIcon.on("click", function () {
    $headerMenuIconLine.stop(true).toggleClass("active");
    $headerNav.stop(true).fadeToggle();
  });

  // ナビの余白クリックでメニュー閉じる
  $headerNav.on("click", function () {
    if ($headerMenuIconLine.hasClass("active")) {
      $headerMenuIconLine.stop(true).toggleClass("active");
      $headerNav.stop(true).fadeToggle();
    }
  });

  // ---------------------------------------------
  // スムーススクロール（ページ内リンク）
  // ---------------------------------------------

  $(".js-smoothscroll").click(function () {
    var speed = 500,
      href = $(this).attr("href"),
      target = $(href == "#" || href == "" ? "html" : href),
      headerHeight = $header.outerHeight(),
      position = target.offset().top - headerHeight; // ヘッダーの高さ分スクロール量を減らす
    $("html, body").animate({ scrollTop: position }, speed);
  });

  // ---------------------------------------------
  // スライドショー
  // ---------------------------------------------
  var $slides = $(".js-slideshow").find("img"),
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
