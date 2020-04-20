<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>クリ★スタコーディング課題【中級編】</title>
  <meta name="description" content="">
  <!-- 検索結果から除外する -->
  <meta name="robots" content="none">
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png" />
  <link rel="icon" href="./img/favicon/favicon.ico" />
  <!-- CSS -->
  <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
  <!-- ヘッダーここから -->
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__inner">
        <div class="p-header__logo">
          <a href="./index.php">
            <h1>Cresta Design</h1>
          </a>
        </div>
        <nav class="p-header__nav">
          <ul class="p-header__list">
            <li class="p-header__item"><a class="js-smoothscroll" href="#concept">Concept</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="#service">Service</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="#works">Works</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="./contact/index.php">Contact</a>
            </li>
          </ul>
        </nav>
        <button class="p-header__menu js-hamburger-menu">
          <span class="p-header__menu-line js-hamburger-menu-line"></span>
          <span class="p-header__menu-line js-hamburger-menu-line"></span>
          <span class="p-header__menu-line js-hamburger-menu-line"></span>
          </but>
      </div>
    </div>
  </header>
  <!-- ヘッダーここまで -->
  <main class="l-main">
    <div class="p-main-visual js-sticky-header-threshold">
      <div class="p-main-visual__slideshow js-slideshow">
        <img src="img/fv-bgi_01@2x.jpg" alt="">
        <img src="img/fv-bgi_02@2x.jpg" alt="">
        <img src="img/fv-bgi_03@2x.jpg" alt="">
      </div>
      <div class="p-main-visual__catch">
        <p>Design for Smile.</p>
        <p>快適なオフィスを<span></span>デザインする</p>
      </div>
    </div>
    <div id="concept" class="p-concept">
      <div class="p-concept__inner--lg">
        <div class="p-concept__inner">
          <h2 class="p-concept__section-title  c-text__section-title">CONCEPT</h2>
          <h3 class="p-concept__section-subtitle c-text__section-subtitle">
            “働きたくなる空間”をデザインすることで<span></span>
            人々を幸せにする。
          </h3>
          <div class="p-concept__container">
            <p class="p-concept__text c-text">
              私たちは、オフィスに特化した空間デザイン専門としております。その理由は、「働きたくなる空間で仕事ができれば多くの人を幸せにできるのではないか」と考えるためです。そんな想いの株式会社Cresta
              Designだからこそできる空間デザインを提供させていただきます。
            </p>
            <div class="p-concept__image">
              <img src="img/concept-image@2x.jpg" alt="">
            </div>
          </div>
        </div>
        <p class="p-concept__watermark c-text__watermark">Our Concept</p>
      </div>
    </div>
    <div id="works" class="p-works">
      <div class="p-works__bg">
        <div class="p-concept__inner--lg">
          <h2 class="p-works__section-title c-text__section-title">Works</h2>
          <div class="p-works__inner">
            <div class="p-works__container">
              <div class="p-works__card c-card">
                <div class="c-card__image">
                  <img src="img/card-img01@2x.jpg" alt="">
                </div>
                <p class="c-card__text">
                  新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
                </p>
              </div>
              <div class="p-works__card c-card">
                <div class="c-card__image">
                  <img src="img/card-img02@2x.jpg" alt="">
                </div>
                <p class="c-card__text">
                  新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
                </p>
              </div>
              <div class="p-works__card c-card">
                <div class="c-card__image">
                  <img src="img/card-img03@2x.jpg" alt="">
                </div>
                <p class="c-card__text">
                  新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
                </p>
              </div>
            </div>
            <div class="p-works__button c-button">
              <a href="#">View more</a>
            </div>
          </div>
          <p class="p-works__watermark c-text__watermark">Our Works</p>
        </div>
      </div>
    </div>
    <div id="service" class="p-service">
      <div class="p-service__inner">
        <h2 class="p-service__section-title c-text__section-title">Service</h2>
      </div>
      <div class="p-service__container">
        <div class="p-service__content">
          <a href="#">
            <div class="p-service__image">
              <span class="p-service__image--hover"></span>
              <img src="img/service-img01@2x.jpg" alt="">
            </div>
            <p class="p-service__content-name">Hearing</p>
          </a>
        </div>
        <div class="p-service__content">
          <a href="#">
            <div class="p-service__image">
              <span class="p-service__image--hover"></span>
              <img src="img/service-img02@2x.jpg" alt="">
            </div>
            <p class="p-service__content-name">Planning</p>
          </a>
        </div>
        <div class="p-service__content">
          <a href="#">
            <div class="p-service__image">
              <span class="p-service__image--hover"></span>
              <img src="img/service-img03@2x.jpg" alt="">
            </div>
            <p class="p-service__content-name">Direction</p>
          </a>
        </div>
      </div>
      <div class="p-service__inner--lg">
        <p class="p-service__watermark c-text__watermark">Our Service</p>
      </div>
    </div>
    <div id="contact" class="p-contact">
      <div class="p-contact__inner">
        <h2 class="p-contact__section-title c-text__section-title">Contact</h2>
        <p class="p-contact__text">お気軽にご相談ください。</p>
        <div class="p-contact__button c-button">
          <a href="contact/index.php">Contact</a>
        </div>
        <p class="p-contact__watermark c-text__watermark">Contact us</p>
      </div>
    </div>
  </main>

  <!-- フッターここから -->
  <footer class="l-footer">
    <div class="p-footer">
      <div class="p-footer__inner">
        <p>©︎cresta.design all rights reserved</p>
      </div>
    </div>
  </footer>
  <!-- フッターここまで -->
  <!-- jQuery -->
  <script src="./js/jQuery/jquery-3.5.0.min.js"></script>
  <script src="./js/main.js"></script>
</body>

</html>