<?php
session_start();
require('../dbconnect.php');

// エラーチェック：配列が空の場合は$errorにblankを渡す
if (!empty($_POST)) {
  // 苗字が空欄の場合
  if ($_POST['lastName'] === '') {
    $error['lastName'] = 'blank';
  }
  // 名前が空欄の場合
  if ($_POST['firstName'] === '') {
    $error['firstName'] = 'blank';
  }
  // セイが空欄の場合
  if ($_POST['lastFurigana'] === '') {
    $error['lastFurigana'] = 'blank';
  }
  // メイが空欄の場合
  if ($_POST['firstFurigana'] === '') {
    $error['firstFurigana'] = 'blank';
  }
  // 郵便番号が空欄の場合
  if ($_POST['zip1'] === '') {
    $error['zip1'] = 'blank';
  }
  if ($_POST['zip2'] === '') {
    $error['zip2'] = 'blank';
  }
  // 都道府県が空欄の場合
  if ($_POST['address1'] === '') {
    $error['address1'] = 'blank';
  }
  // 市区町村が空欄の場合
  if ($_POST['address2'] === '') {
    $error['address2'] = 'blank';
  }
  // 番地・ビル名が空欄の場合
  if ($_POST['address3'] === '') {
    $error['address3'] = 'blank';
  }
  // 電話番号が空欄の場合
  if ($_POST['tel'] === '') {
    $error['tel'] = 'blank';
  }
  // メールアドレスが空欄の場合
  if ($_POST['mail_input'] === '') {
    $error['mail_input'] = 'blank';
  }
  if ($_POST['mail_check'] === '') {
    $error['mail_check'] = 'blank';
  }
  // メールアドレスが一致しない場合
  if ($_POST['mail_input'] !== $_POST['mail_check']) {
    $error['mail'] = 'blank';
  }
  // パスワードが空欄の場合
  if ($_POST['pass_input'] === '') {
    $error['pass_input'] = 'blank';
  }
  if ($_POST['pass_check'] === '') {
    $error['pass_check'] = 'blank';
  }
  // パスワードが一致しない場合
  if ($_POST['pass_input'] !== $_POST['pass_check']) {
    $error['pass'] = 'blank';
  }
  // 生年月日が空欄の場合
  if ($_POST['year'] === '') {
    $error['year'] = 'blank';
  }
  if ($_POST['month'] === '') {
    $error['month'] = 'blank';
  }
  if ($_POST['day'] === '') {
    $error['day'] = 'blank';
  }
  // 性別が空欄の場合
  if ($_POST['gender'] == '') {
    $error['gender'] = 'blank';
  }
}

if (empty($error) && !empty($_POST)) {
  $_POST['name'] = $_POST['lastName'] .' '. $_POST['firstName'];
  $_POST['furigana'] = $_POST['lastFurigana'] .' '. $_POST['firstFurigana'];
  $_POST['bday'] = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];

  if ($_POST['mail_input'] === $_POST['mail_check']) {
    $_POST['mail'] = $_POST['mail_check'];
  }

  if ($_POST['pass_input'] === $_POST['pass_check']) {
    $_POST['pass'] = $_POST['pass_check'];
  }

  $_SESSION['join'] = $_POST;

  header('Location: check.php');
  exit();
}

// check.phpから戻って来た時、記入欄を維持する処理
  if($_REQUEST['action'] === 'rewrite' && isset($_SESSION['join'])) {
    $_POST = $_SESSION['join'];
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>会員登録</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

  <!-- ajaxzip3 郵便番号検索用 -->
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

  <link rel="stylesheet" href="../css/style.css">

</head>
<body>
  <div class="container">
    <header>
      <div class="row">
        <div class="col-sm-6">
          <h1>Wellcome! Portfolio</h1>
        </div>
        <div class="col-sm-6 align-right">
          <a href="../login.php">ログイン画面へ戻る</a>
        </div>
      </div>
    </header>
  </div>

  <hr>

  <!-- 必要事項記入欄 -->
  <div class="container">
    <!-- <form action="https://book.h2o-space.com/html/form.php" method="post" class="row"> -->
    <form action="" method="post" class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <p>こちらでは、Café Portfolioの会員登録が行えます。<br>必要事項を以下のフォームに入力してください。</p>

        <hr>

        <!-- 氏名記入欄 -->
        <div class="form-group">

          <label for="name">お名前
            <!-- エラー文 -->
            <?php if ($error['lastName'] || $error['firstName']): ?>
              <label style="color: red; margin-left: 10px">名前を入力してください</label>
            <?php endif; ?>
          </label>
          <div class="form-inline inputName">
            <input type="text" id="name" name="lastName" class="form-control" value="<?php print(htmlspecialchars($_POST['lastName'], ENT_QUOTES)); ?>" placeholder="例）山田">
            <input type="text" id="name" name="firstName" class="form-control" value="<?php print(htmlspecialchars($_POST['firstName'], ENT_QUOTES)); ?>" placeholder="例）太郎">
          </div>
        </div>

        <!-- フリガナ記入欄 -->
        <div class="form-group">
          <label for="name">フリガナ
            <!-- エラー文 -->
            <?php if ($error['lastFurigana'] || $error['firstFurigana']): ?>
              <label style="color: red; margin-left: 10px">フリガナを入力してください</label>
            <?php endif; ?>
          </label>
          <div class="form-inline inputName">
            <input type="text" id="name" name="lastFurigana" class="form-control" value="<?php print(htmlspecialchars($_POST['lastFurigana'], ENT_QUOTES)); ?>" placeholder="例）ヤマダ">
            <input type="text" id="name" name="firstFurigana" class="form-control" value="<?php print(htmlspecialchars($_POST['firstFurigana'], ENT_QUOTES)); ?>" placeholder="例）タロウ">
          </div>
        </div>

        <hr>

        <!-- 郵便番号・住所入力欄 -->
        <div class="form-group">
          <!-- 郵便番号入力欄 -->
          <label>郵便番号
            <!-- エラー文 -->
            <?php if ($error['zip1'] || $error['zip2']): ?>
              <label style="color: red; margin-left: 10px">郵便番号を入力してください</label>
            <?php endif; ?>
          </label>
          <div class="form-inline">
            <!-- ▼郵便番号入力フィールド(3桁+4桁) -->
            <input type="text" name="zip1" class="form-control" size="4" maxlength="5" value="<?php print(htmlspecialchars($_POST['zip1'], ENT_QUOTES)); ?>" placeholder="3桁">
              －
            <input type="text" name="zip2" class="form-control" size="5" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');" value="<?php print(htmlspecialchars($_POST['zip2'], ENT_QUOTES)); ?>" placeholder="4桁">
          </div>
          <!-- 住所入力欄 -->
          <div style="margin-right: 50%">
            <!-- ▼住所入力フィールド(都道府県) -->
            <label style="margin-top: 5px;">都道府県
              <!-- エラー文 -->
              <?php if ($error['address1']): ?>
                <label style="color: red; margin-left: 10px">都道府県を入力してください</label>
              <?php endif; ?>
            </label>
            <input type="text" name="address1" class="form-control" size="20" value="<?php print(htmlspecialchars($_POST['address1'], ENT_QUOTES)); ?>" placeholder="例）東京都">
            <!-- ▼住所入力フィールド(市区町村) -->
            <label style="margin-top: 5px;">市区町村
              <!-- エラー文 -->
              <?php if ($error['address2']): ?>
                <label style="color: red; margin-left: 10px">市区町村を入力してください</label>
              <?php endif; ?>
            </label>
            <input type="text" name="address2" class="form-control" size="40" value="<?php print(htmlspecialchars($_POST['address2'], ENT_QUOTES)); ?>" placeholder="例）青梅市千ヶ瀬町">
            <!-- ▼住所入力フィールド(番地・ビル名) -->
            <label style="margin-top: 5px;">番地・ビル名
              <!-- エラー文 -->
              <?php if ($error['address3']): ?>
                <label style="color: red; margin-left: 10px">番地・ビル名を入力してください</label>
              <?php endif; ?>
            </label>
            <input type="text" name="address3" class="form-control" size="40" value="<?php print(htmlspecialchars($_POST['address3'], ENT_QUOTES)); ?>" placeholder="例）3-397-2">
          </div>
        </div>

        <hr>

        <!-- 電話番号入力欄 -->
        <div class="form-group">
          <label>電話番号 *ハイフン抜き
            <!-- エラー文 -->
            <?php if ($error['tel']): ?>
                <label style="color: red; margin-left: 10px">電話番号を入力してください</label>
              <?php endif; ?>
          </label>
          <div class="form-inline inputTel">
            <input type="tel" name="tel" autocomplete="tel" class="form-control" value="<?php print(htmlspecialchars($_POST['tel'], ENT_QUOTES)); ?>" placeholder="09012345678">
          </div>
        </div>

        <hr>

        <!-- メールアドレス・パスワード入力欄 -->
        <!-- メールアドレス -->
        <div class="form-group">
          <div>
            <label>メールアドレス
              <?php if ($error['mail_input'] || $error['mail_check']): ?>
                <label style="color: red; margin-left: 10px">メールアドレスを入力してください</label>
              <?php endif; ?>
              <?php if ($error['mail']): ?>
                <label style="color: red; margin-left: 10px">確認用のメールアドレスが一致しません</label>
              <?php endif; ?>
            </label>
            <div style="margin-right: 50%">
              <input type="text" name="mail_input" style="margin-bottom: 10px" class="form-control" value="<?php print(htmlspecialchars($_POST['mail_input'], ENT_QUOTES)); ?>">
              <input type="text" name="mail_check" class="form-control" value="<?php print(htmlspecialchars($_POST['mail_input'], ENT_QUOTES)); ?>" placeholder="確認のためもう一度ご記入ください">
            </div>
          </div>
        </div>

        <!-- パスワード -->
        <div class="form-group" style="border-bottom-color: red">
          <label>パスワード
          <?php if ($error['pass_input'] || $error['pass_check']): ?>
            <label style="color: red; margin-left: 10px">パスワードを入力してください</label>
          <?php endif; ?>
          <?php if ($error['pass']): ?>
            <label style="color: red; margin-left: 10px">確認用のパスワードが一致しません</label>
          <?php endif; ?>
          </label>
          <div style="margin-right: 50%">
            <input type="password" name="pass_input" style="margin-bottom: 10px" class="form-control">
            <input type="password" name="pass_check" class="form-control" placeholder="確認のためもう一度ご記入ください">
          </div>
        </div>

        <hr>

        <!-- 生年月日記入欄 -->
        <div class="form-group">
          <label for="name">生年月日
          <!-- エラー文 -->
          <?php if ($error['year'] || $error['month'] || $error['day']): ?>
            <label style="color: red; margin-left: 10px">生年月日を選択してください</label>
          <?php endif; ?>
          </label>
          <div class="form-inline inputBday">

            <!-- 年入力欄 -->
            <select type="text" id="year" name="year" class="form-control" placeholder="年">
              <option value="">----</option>
              <?php
                $now_year = date(Y);
                for ($year = $now_year; $year >= 1930; $year--) {
                  if ($year < 10) { $year =  sprintf('%02d', $year); }
                  // if ($_POST['year'] === $year) {
                  //   $selected =  'selected';
                  // }
                  print ('<option value="'.$year.'" '.$selected.'>' . $year . '</option>');
                }
              ?>
            </select>
            &nbsp;/&nbsp;
            <!-- 月入力欄 -->
            <select type="text" id="month" name="month" class="form-control" placeholder="年">
              <option value="">--</option>
              <?php
                for ($month = 1; $month <= 12; $month++) {
                  if ($month < 10) {
                    $month =  sprintf('%02d', $month);
                  }
                  print ('<option value="'.$month.'">' . $month . '</option>');
                }
              ?>
            </select>
            &nbsp;/&nbsp;
            <!-- 日入力欄 -->
            <select id="day" name="day" class="form-control" placeholder="年">
              <option value="">--</option>
              <?php
                for ($day = 1; $day <= 31; $day++) {
                  if ($day < 10) {
                    $day =  sprintf('%02d', $day);
                  }
                  print ('<option value="'.$day.'">' . $day . '</option>');
                }
              ?>
            </select>
          </div>
        </div>

        <hr>

        <!-- 性別入力欄 -->
        <div class="form-group gender">
          <label>性別
            <!-- エラー文 -->
            <?php if ($error['gender']): ?>
              <label style="color: red; margin-left: 10px">性別を選択してください</label>
            <?php endif; ?>
          </label>
          <br>
          <div class="form-check">
            <!-- 男性 -->
            <input class="form-check-input" type="radio" name="gender" value="男性" <?php if ($_POST['gender'] === '男性') { echo htmlspecialchars('checked',ENT_QUOTES); } ?>>
            <label class="form-check-label">男</label>
            <!-- 女性 -->
            <input class="form-check-input" type="radio" name="gender" value="女性"  <?php if ($_POST['gender'] === '女性') { echo htmlspecialchars('checked', ENT_QUOTES); } ?>>
            <label class="form-check-label">女</label>
            <!-- その他 -->
            <input class="form-check-input" type="radio" name="gender" value="その他" <?php if ($_POST['gender'] === 'その他') { echo htmlspecialchars('checked', ENT_QUOTES); } ?>>
            <label class="form-check-label">その他</label>
          </div>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">送信する</button>
      </div>
    </form>
  </div>

  <hr>

  <div class="container">
    <footer>
      <p>&emsp;&copy; Café Portfolio</p>
    </footer>
  </div>
</body>
</html>