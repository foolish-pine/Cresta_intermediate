/* ================================================================
  jQuery
   ================================================================ */

$(function () {
  // ---------------------------------------------
  // スティッキーヘッダー
  // ---------------------------------------------

  var $window = $(window),
    $header = $(".p-header"),
    threshold = $(".js-sticky-header-threshold").outerHeight();

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

  var $headerNav = $(".p-header__nav"),
    $hamburgerMenu = $(".js-hamburger-menu"),
    $hamburgerMenuLine = $(".js-hamburger-menu-line");

  $(window).on("resize", function () {
    if (mq.matches) {
      // 画面幅767px以下のとき
      // navを非表示にする
      $headerNav.hide();
      // メニューアイコンを非activeにする
      $hamburgerMenuLine.removeClass("active");
    } else {
      // 画面幅768px以上のとき
      // navを表示させる
      $headerNav.show();
    }
  });

  // メニューアイコンをクリックしてnavを開閉する
  $hamburgerMenu.on("click", function () {
    $hamburgerMenuLine.stop(true).toggleClass("active");
    $headerNav.stop(true).fadeToggle();
  });

  // ナビの余白クリックでメニュー閉じる
  $headerNav.on("click", function () {
    if ($hamburgerMenuLine.hasClass("active")) {
      $hamburgerMenuLine.stop(true).toggleClass("active");
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
  // スクロールフェードイン
  // ---------------------------------------------

  var effectPos = 300, // 画面下からどの位置でフェードさせるか(px)
    effectTime = 2000; // エフェクトの時間(ms) 1秒なら1000

  // フェードする前のcssを定義
  $(".js-scroll-fadein").css({
    opacity: 0,
  });

  // スクロールまたはロードするたびに実行
  $(window).on("scroll load", function () {
    var scrollBtm = $(this).scrollTop() + $(this).height(),
      threshold = scrollBtm - effectPos;

    // 要素が可視範囲に入ったとき、エフェクトが発動
    $(".js-scroll-fadein").each(function () {
      var thisPos = $(this).offset().top;
      if (threshold > thisPos) {
        $(this).css({
          opacity: 1,
          transition: `${effectTime}ms`,
        });
      }
    });
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
