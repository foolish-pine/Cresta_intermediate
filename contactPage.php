<?php
header('X-FRAME-OPTIONS: SAMEORIGIN');

function escape($str) {
  return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>クリ★スタコーディング課題【中級編】</title>
  <meta name="description" content="">
  <link rel="apple-touch-icon" sizes="180x180" href="image/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="image/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="image/favicon/favicon-16x16.png">
  <link rel="manifest" href="image/favicon/site.webmanifest">
  <link rel="mask-icon" href="image/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- Google_Fonts -->
  <link href=“https://fonts.googleapis.com/css?family=Noto+Serif|Noto+Serif+JP&display=swap” rel=“stylesheet”>
  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body ontouchstart="">
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__inner">
        <div class="p-header__logo">
          <a href="index.html">
            <h1>Cresta Design</h1>
          </a>
        </div>
        <nav class="p-header__nav">
          <ul class="p-header__list">
            <li class="p-header__item"><a class="js-smoothscroll" href="index.html#concept">Concept</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="index.html#service">Service</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="index.html#works">Works</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="#">Contact</a></li>
          </ul>
        </nav>
        <a class="p-header__menu">
          <span class="p-header__menuLine"></span>
          <span class="p-header__menuLine"></span>
          <span class="p-header__menuLine"></span>
        </a>
      </div>
    </div>
  </header>
  <main class="l-main">
    <section id="contactPage" class="p-contactPage">
      <div class="p-contactPage__inner">
        <div class="p-contactPage__mainVisual">
          <div class="p-contactPage__inner">
            <h2 class="p-contactPage__sectionTitle c-text__sectionTitle">Contact</h2>
            <p class="p-contactPage__sectionWatermark c-text__sectionWatermark">Contact us</p>
          </div>
        </div>
        <form class="p-contactPage__form" action="php/contactForm.php" method="post">
          <div class="p-contactPage__purpose">
            <p>お問い合わせ内容</p><br>
            <label for="request"><input type="checkbox" id="request" name="purpose[]" value="資料請求"> 資料請求</label>
            <span></span>
            <label for="consult"><input type="checkbox" id="consult" name="purpose[]" value="お電話でのご相談を希望"> お電話でのご相談を希望</label>
            <span></span>
            <label for="apply"><input type="checkbox" id="apply" name="purpose[]" value="申し込み"> 申し込み</label>
          </div>
          <div>
            <label for="name">お名前</label><br>
            <input class="p-contactPage__textbox" type="text" id="name" name="name" required />
          </div>
          <div>
            <label for="tel">電話番号</label><br>
            <input class="p-contactPage__textbox" type="text" id="tel" name="tel" required />
          </div>
          <div>
            <label for="email">メールアドレス</label><br>
            <input class="p-contactPage__textbox" type="text" id="email" name="email" required />
          </div>
          <div class="p-contactPage__textarea">
            <label for="message">その他</label><br>
            <textarea id="message" name="message" required></textarea>
          </div>
          <input type="hidden" id="token" name="token" value="1234567" />
          <div class="p-contactPage__button c-button">
            <input type="submit" value="Submit">
          </div>
        </form>
      </div>
    </section>
  </main>
  <footer class="l-footer">
    <div class="p-footer">
      <div class="p-footer__inner">
        <p>©︎cresta.design all rights reserved</p>
      </div>
    </div>
  </footer>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>