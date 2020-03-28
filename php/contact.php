<?php
header('X-FRAME-OPTIONS: SAMEORIGIN');

function spaceTrim ($str) {
  $str = preg_replace('/^[ 　]+/u', '', $str);
  $str = preg_replace('/[ 　]+$/u', '', $str);
  return $str;
}

$request_param = $_POST;
$request_datetime = date("Y年m月d日 H時i分s秒");

$mailto = $request_param['email'];
$to = $request_param['email'];
$mailfrom = "From: test@text.com";
$subject = "お問い合わせありがとうございます。";


//自動返信メール
$content = "";
$content .= $request_param['name']. "様\r\n\r\n";
$content .= "お問い合わせありがとうございます。\r\n";
$content .= "以下の内容でお問い合わせ承りました。\r\n\r\n";
$content .= "=================================\r\n";
$content .= "お問い合わせ日時: " . $request_datetime."\r\n";
$content .= "お名前: " . htmlspecialchars($request_param['name'])."\r\n";
$content .= "メールアドレス: " . htmlspecialchars($request_param['email'])."\r\n";
$content .= "内容: " . htmlspecialchars($request_param['message'])."\r\n";
$content .= "=================================\r\n";

//管理者確認用メール
$subject2 = "お問い合わせがありました。";
$content2 = "";
$content2 .= "お問い合わせがありました。\r\n";
$content2 .= "お問い合わせ内容は以下のとおりです。\r\n\r\n";
$content2 .= "=================================\r\n";
$content2 .= "お問い合わせ日時: " . $request_datetime."\r\n";
$content2 .= "お名前: " . htmlspecialchars($request_param['name'])."\r\n";
$content2 .= "メールアドレス: " . htmlspecialchars($request_param['email'])."\r\n";
$content2 .= "内容: " . htmlspecialchars($request_param['message'])."\r\n";
$content2 .= "================================="."\r\n";

mb_language("Japanese"); 
mb_internal_encoding("UTF-8");

//mail 送信
if($request_param['token'] === '1234567'){
  if(mb_send_mail($to, $subject2, $content2, $mailfrom)){
      mb_send_mail($mailto,$subject,$content,$mailfrom);
  } else {
      header('Content-Type: text/html; charset=UTF-8');
    echo "メールの送信に失敗しました";
  };
  } else {
  echo "メールの送信に失敗しました（トークンエラー）";
  }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>クリ★スタコーディング課題【初級編】</title>
  <meta name="description" content="">
  <link rel="apple-touch-icon" sizes="180x180" href="../image/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../image/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../image/favicon/favicon-16x16.png">
  <link rel="manifest" href="../image/favicon/site.webmanifest">
  <link rel="mask-icon" href="../image/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- Google_Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700|Roboto:400,500,700&display=swap&subset=japanese" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="../css/style.css">
</head>
<body ontouchstart="">
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__inner">
        <div class="p-header__logo">
          <a href="../index.php">
            <h1>クリ★スタ</h1>
          </a>
        </div>
        <nav class="p-header__nav">
          <ul class="p-header__list">
            <li class="p-header__item"><a class="js-smoothscroll" href="#about">About</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="#service">Service</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="#news">News</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="#contact">Contact</a></li>
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
    <section id="contact" class="p-contact">
      <div class="p-contact__inner">
        <h2 class="p-contact__sectionTitle c-text__sectionTitle">お問い合わせありがとうございました。</h2>
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
</body>
</html>