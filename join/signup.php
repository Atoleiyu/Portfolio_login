<?php
session_start();
require('../dbconnect.php');
require('../php/signup_bi.php');
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

  <style>
    label .error {
      color: red;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="row">
        <div class="col-sm-6">
          <h1>Wellcome ANACOM</h1>
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
        <p>こちらでは、ANCOMの会員登録が行えます。<br>必要事項を以下のフォームに入力してください。</p>

        <hr>

        <!-- 氏名記入欄 -->
        <div class="form-group">

          <label for="name">お名前
            <!-- エラー文 -->
            <?php if ($error['lastName'] || $error['firstName']): ?>
              <label class="error">名前を入力してください</label>
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
              <label class="error">フリガナを入力してください</label>
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
              <label class="error">郵便番号を入力してください</label>
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
                <label class="error">都道府県を入力してください</label>
              <?php endif; ?>
            </label>
            <input type="text" name="address1" class="form-control" size="20" value="<?php print(htmlspecialchars($_POST['address1'], ENT_QUOTES)); ?>" placeholder="例）東京都">
            <!-- ▼住所入力フィールド(市区町村) -->
            <label style="margin-top: 5px;">市区町村
              <!-- エラー文 -->
              <?php if ($error['address2']): ?>
                <label class="error">市区町村を入力してください</label>
              <?php endif; ?>
            </label>
            <input type="text" name="address2" class="form-control" size="40" value="<?php print(htmlspecialchars($_POST['address2'], ENT_QUOTES)); ?>" placeholder="例）青梅市千ヶ瀬町">
            <!-- ▼住所入力フィールド(番地・ビル名) -->
            <label style="margin-top: 5px;">番地・ビル名
              <!-- エラー文 -->
              <?php if ($error['address3']): ?>
                <label class="error">番地・ビル名を入力してください</label>
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
                <label class="error">電話番号を入力してください</label>
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
              <!-- エラー文 -->
              <!-- 空欄 -->
              <?php if ($error['mail_input'] || $error['mail_check']): ?>
                <label class="error">メールアドレスを入力してください</label>
              <?php endif; ?>
              <!-- 不一致 -->
              <?php if ($error['mail'] === 'blank'): ?>
                <label class="error">確認用のメールアドレスが一致しません</label>
              <?php endif; ?>
              <!-- 使用済み -->
              <?php if ($error['mail'] === 'duplicate'): ?>
                <label class="error">指定されたアドレスは既に使用されています</label>
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
          <!-- エラー文 -->
          <!-- 空欄 -->
          <?php if ($error['pass_input'] || $error['pass_check']): ?>
            <label class="error">パスワードを入力してください</label>
          <?php endif; ?>
          <!-- 不一致 -->
          <?php if ($error['pass']): ?>
            <label class="error">確認用のパスワードが一致しません</label>
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
          <?php if ($error['year'] || $error['month'] || $error['day'] === 'blank'): ?>
            <label class="error">生年月日を選択してください</label>
          <?php endif; ?>
          </label>
          <div class="form-inline inputBday">

            <!-- 年入力欄 -->
            <select type="text" id="year" name="year" class="form-control" placeholder="年">
              <option value="disabled" style='display:none;'>----</option>
              <?php
                $now_year = date(Y);
                if (isset($_POST['year'])) {
                  echo ('<option value="'.$_POST['year'].'" style="display:none" selected>'.$_POST['year'].'</option>');
                }
                for ($year = $now_year; $year >= 1930; $year--) {
                  if ($year < 10) { $year =  sprintf('%02d', $year); }

                  print ('<option value="'.$year.'">' . $year . '</option>');
                }
              ?>
            </select>
            &nbsp;/&nbsp;
            <!-- 月入力欄 -->
            <select type="text" id="month" name="month" class="form-control" placeholder="年">
              <option value="disabled" style='display:none;'>--</option>
              <?php
              if (isset($_POST['month'])) {
                echo ('<option value="'.$_POST['month'].'" style="display:none" selected>'.$_POST['month'].'</option>');
              }
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
              <option value="disabled" style='display:none'>--</option>
              <?php
                if (isset($_POST['day'])) {
                  echo ('<option value="'.$_POST['day'].'" style="display:none" selected>'.$_POST['day'].'</option>');
                }
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
              <label class="error">性別を選択してください</label>
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
      <p>&copy; ANACOM</p>
    </footer>
  </div>
</body>
</html>