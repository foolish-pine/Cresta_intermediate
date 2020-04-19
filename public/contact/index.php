<?php
session_start();

// クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

$page_flag = 0;
$clean = array();

// サニタイズ
function sanitize($input) {
  foreach ($input as $key => $value) {
    if (is_array($value)) {
      $_input[$key] = sanitize($value);
    } else {
      $_input[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
  }
  return $_input;
}

$POST = $_POST;
if (!empty($POST)) {
  $clean = sanitize($POST);
}

$purpose = array();
if (isset($clean['request'])) {
array_push($purpose, $clean['request']);}

if (isset($clean['consult'])) {
array_push($purpose, $clean['consult']);}

if (isset($clean['apply'])) {
array_push($purpose, $clean['apply']);}

if (isset($purpose) && is_array($purpose)) {
  $purpose_str = implode("、", $purpose);
}

// 前後にある半角全角スペースを削除する関数
function spaceTrim($str)
{
  // 行頭
  $str = preg_replace('/^[ 　]+/u', '', $str);
  // 末尾
  $str = preg_replace('/[ 　]+$/u', '', $str);
  return $str;
}

// トークン生成
if (!isset($_SESSION['token'])) {
  $_SESSION['token'] = sha1(random_bytes(30));
}

if (!empty($clean['back'])) {
  $page_flag = 0;
  
  // トークンを確認し、確認画面を表示
  if (!(hash_equals($_POST['token'], $_SESSION['token']))) {
    echo "不正アクセスの可能性があります";
    exit();
  }

} elseif (!empty($clean['confirmation'])) {

  if (!(hash_equals($_POST['token'], $_SESSION['token']))) {
    echo "不正アクセスの可能性があります";
    exit();
  }

  $error = validation($clean);

  if (empty($error)) {
    $page_flag = 1;

    // セッションの書き込み
    $_SESSION['page'] = true;
  } else {
    $page_flag = 0;
  }

} elseif (!empty($clean['submit'])) {

  if (!(hash_equals($_POST['token'], $_SESSION['token']))) {
    echo "不正アクセスの可能性があります";
    exit();
  }

  if (!empty($_SESSION['page']) && $_SESSION['page'] === true) {

    // セッションの削除
    unset($_SESSION['page']);

    $page_flag = 2;

    $auto_reply_subject = null;
    $auto_reply_text = null;
    $admin_reply_subject = null;
    $admin_reply_text = null;
    date_default_timezone_set('Asia/Tokyo');

    $header = "MIME-Version: 1.0\n";
    $header .= "From: Cresta Design <noreply@test.com>\n";
    $header .= "Reply-To: Cresta Design <noreply@test.com>\n";

    $auto_reply_subject = 'お問い合わせありがとうございます。';

    $auto_reply_text = "※※※このメールはテストメールです※※※\n\n";
    $auto_reply_text .= "この度は、お問い合わせいただきありがとうございます。\n下記の内容でお問い合わせを受け付けました。\n\n";
    $auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
    $auto_reply_text .= "お問い合わせ内容：" . $purpose_str . "\n";
    $auto_reply_text .= "お名前：" . $clean['name'] . "\n";
    $auto_reply_text .= "電話番号：" . $clean['tel'] . "\n";
    $auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
    $auto_reply_text .= "その他：\n" . $clean['message'] . "\n\n";
    $auto_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-intermediate.foolish-pine.com";

    // 利用者へメール送信
    mb_send_mail($clean['email'], $auto_reply_subject, $auto_reply_text, $header);

    $admin_reply_subject = "お問い合わせ受け付けました";

    $admin_reply_text = "※※※このメールはテストメールです※※※\n\n";
    $admin_reply_text .= "下記の内容でお問い合わせがありました。\n\n";
    $admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
    $admin_reply_text .= "お問い合わせ内容：" . $purpose_str . "\n";
    $admin_reply_text .= "お名前：" . $clean['name'] . "\n";
    $admin_reply_text .= "電話番号：" . $clean['tel'] . "\n";
    $admin_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
    $admin_reply_text .= "その他：\n" . $clean['message'] . "\n\n";
    $admin_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-intermediate.foolish-pine.com";

    // 管理者へメール送信
    mb_send_mail($clean['email'], $admin_reply_subject, $admin_reply_text, $header);
  } else {
    $page_flag = 0;
  }
}

function validation($data)
{
  $error = array();

  // 氏名のバリデーション
  if (20 < mb_strlen($data['name'])) {
    $error[] = "「お名前」は20文字以内で入力してください。";
  }

  // 電話番号のバリデーション
  if (!preg_match('/^[0-9-]{6,9}$|^[0-9-]{13}$/', $data['tel'])) {
    $error[] = "「電話番号」は正しい形式で入力してください。";
  }

  // メールアドレスのバリデーション
  if (!preg_match('/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email'])) {
    $error[] = "「メールアドレス」は正しい形式で入力してください。";
  }

  return $error;
}
?>






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
  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png" />
  <link rel="icon" href="../img/favicon/favicon.ico" />
  <!-- CSS -->
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
  <!-- ヘッダーここから -->
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__inner">
        <div class="p-header__logo">
          <a href="../index.php">
            <h1>Cresta Design</h1>
          </a>
        </div>
        <nav class="p-header__nav">
          <ul class="p-header__list">
            <li class="p-header__item"><a class="js-smoothscroll" href="../index.php#concept">Concept</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="../index.php#service">Service</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="../index.php#works">Works</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="../index.php#contact">Contact</a></li>
          </ul>
        </nav>
        <button class="p-header__menu">
          <span class="p-header__menu-line"></span>
          <span class="p-header__menu-line"></span>
          <span class="p-header__menu-line"></span>
          </but>
      </div>
    </div>
  </header>
  <!-- ヘッダーここまで -->
  <main class="l-main">
    <div id="contact-page" class="p-contact-page">
      <div class="p-contact-page__inner">
        <div class="p-contact-page__main-visual js-main-visual">
          <div class="p-contact-page__inner">
            <h2 class="p-contact-page__section-title c-text__section-title">Contact</h2>
            <p class="p-contact-page__watermark c-text__watermark">Contact us</p>
          </div>
        </div>
        <!-- お問い合わせフォーム入力ページ -->
        <?php if ($page_flag === 0) : ?>
        <form class="p-contact-page__form" action="" method="post">
          <input type="hidden" name="token" value="<?php $token = $_SESSION['token']; echo $token?>">
          <?php if (!empty($error)) : ?>
          <ul class="p-contact-page__errorList">
            <?php foreach ($error as $value) :?>
            <li><?php echo $value; ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <div class="p-contact-page__purpose">
            <p>お問い合わせ内容</p><br>
            <label for="request"><input type="checkbox" id="request" name="request" value="資料請求" <?php if (!empty($clean['request'])) {echo 'checked';} ?>> 資料請求</label>
            <span></span>
            <label for="consult"><input type="checkbox" id="consult" name="consult" value="お電話でのご相談を希望" <?php if (!empty($clean['consult']))  {echo 'checked';} ?>> お電話でのご相談を希望</label>
            <span></span>
            <label for="apply"><input type="checkbox" id="apply" name="apply" value="申し込み" <?php if (!empty($clean['apply'])) {echo 'checked';} ?>> 申し込み</label>
          </div>
          <div>
            <label for="name">お名前</label><br>
            <input class="p-contact-page__textbox" type="text" id="name" name="name" value="<?php if (!empty($clean['name'])) {echo $clean['name'];} ?>" required />
          </div>
          <div>
            <label for="tel">電話番号</label><br>
            <input class="p-contact-page__textbox" type="text" id="tel" name="tel" value="<?php if (!empty($clean['tel'])) {echo $clean['tel'];} ?>" required />
          </div>
          <div>
            <label for="email">メールアドレス</label><br>
            <input class="p-contact-page__textbox" type="text" id="email" name="email" value="<?php if (!empty($clean['email'])) {echo $clean['email'];} ?>" required />
          </div>
          <div class="p-contact-page__textarea">
            <label for="message">その他</label><br>
            <textarea id="message" name="message" required><?php if (!empty($clean['message'])) {echo $clean['message'];} ?></textarea>
          </div>
          <div class="p-contact-page__button c-button">
            <input type="submit" name="confirmation" value="確認画面へ">
          </div>
        </form>
        <!-- お問い合わせフォーム確認ページ -->
        <?php elseif ($page_flag === 1) : ?>
        <form class="p-contact-page__form" action="" method="post">
          <p class="p-contact-page__text--confirmation c-text">
            以下の内容で送信します。よろしいですか？<br>※利用者宛と管理者宛のメールが入力されたメールアドレスに送信されます。</p>
          <div class="p-contact-page__purpose">
            <p>お問い合わせ内容</p><br>
            <?php
                echo '<div class="p-contact-page__purpose--confirmation">' . $purpose_str . '</div>'; 
              ?>
          </div>
          <div>
            <label for="name">お名前</label><br>
            <?php if (isset($clean['name'])) {
                echo '<div class="p-contact-page__textbox--confirmation">' . $clean['name'] . '</div>';
              } ?>
          </div>
          <div>
            <label for="tel">電話番号</label><br>
            <?php if (isset($clean['tel'])) {
                echo '<div class="p-contact-page__textbox--confirmation">' . $clean['tel'] . '</div>';
              } ?>
          </div>
          <div>
            <label for="email">メールアドレス</label><br>
            <?php if (isset($clean['email'])) {
                echo '<div class="p-contact-page__textbox--confirmation">' . $clean['email'] . '</div>';
              } ?>
          </div>
          <div class="p-contact-page__textarea">
            <label for="message">その他</label><br>
            <?php if (isset($clean['message'])) {
                echo '<div class="p-contact-page__textarea--confirmation">' . nl2br($clean['message']) . '</div>';
              } ?>
          </div>
          <div class="p-contact-page__button-container">
            <div class="p-contact-page__button p-contact-page__button--back c-button">
              <input type="submit" name="back" value="戻る">
            </div>
            <div class="p-contact-page__button c-button">
              <input type="submit" name="submit" value="送信">
            </div>
          </div>
          <input type="hidden" name="token" value="<?php $token = $_SESSION['token']; echo $token?>">
          <input type="hidden" name="request" value="<?php if (isset($clean['request'])) {echo $clean['request'];} ?>">
          <input type="hidden" name="consult" value="<?php if (isset($clean['consult'])) {echo $clean['consult'];} ?>">
          <input type="hidden" name="apply" value="<?php if (isset($clean['apply'])) {echo $clean['apply'];} ?>">
          <input type="hidden" name="apply" value="<?php if (isset($purpose_str)) {echo $purpose_str;} ?>">
          <input type="hidden" name="name" value="<?php echo $clean['name']; ?>">
          <input type="hidden" name="tel" value="<?php echo $clean['tel']; ?>">
          <input type="hidden" name="email" value="<?php echo $clean['email']; ?>">
          <input type="hidden" name="message" value="<?php echo $clean['message']; ?>">
        </form>
        <!-- お問い合わせフォーム完了ページ -->
        <?php elseif ($page_flag === 2) : ?>
        <h2 class="p-contact-page__text--confirmation c-text">送信が完了しました。</h2>
        <div class="p-contact-page__button c-button">
          <a href="../index.php">トップへ戻る</a>
        </div>
        <?php endif; ?>
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
  <script src="../js/jQuery/jquery-3.5.0.min.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>