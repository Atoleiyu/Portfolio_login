<?php
session_start();
require('dbconnect.php');

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

  <link rel="stylesheet" href="css/style.css">

  <style> footer {margin-bottom: 16px} </style>
  
</head>
<body>
  <header class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Wellcome! ANACOM</h1>
      </div>
    </div>
  </header>

  <hr>

  <!-- 必要事項記入欄 -->
  <div class="container">
    <form action="" method="post" class="row">
      <dl class="col-sm-8 col-sm-offset-2">
        <h2>会員情報確認</h2>
        <p>入力された内容をご確認ください<br></p>

        <hr>

        <!-- 氏名 -->
        <div class="form-group">
          <label for="name">お名前</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['name'],ENT_QUOTES)); ?>
          </dd>
        </div>
        <!-- フリガナ -->
        <div class="form-group">
          <label for="name">フリガナ</label>
          <dd>
          <?php echo (htmlspecialchars($_SESSION['furigana'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <!-- 郵便番号 -->
        <div class="form-group">
          <label>郵便番号</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['zip'],ENT_QUOTES)); ?>
          </dd>
        </div>
        <!-- 住所 -->
        <div class="form-group">
          <label>住所</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['add1'].$_SESSION['add2'].$_SESSION['add3'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <!-- 電話番号 -->
        <div class="form-group">
          <label>電話番号</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['tel'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <!-- メールアドレス -->
        <div class="form-group">
          <label>メールアドレス</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['mail'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <!-- パスワード -->
        <div class="form-group">
          <label>パスワード</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['pass'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <!-- 生年月日 -->
        <div class="form-group">
          <label>生年月日</label>
          <dd>
            <?php
              echo (htmlspecialchars($_SESSION['bday'], ENT_QUOTES));
            ?>
          </dd>
        </div>

        <hr>

        <!-- 性別 -->
        <div class="form-group">
          <label>性別</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['gender'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <div>
          <a type="submit" class="btn btn-warning" href="login.php">ログイン画面へ戻る</a>
          /
          <button type="submit" name="action" class="btn btn-primary">登録する</button>
        </div>

      </dl>
    </form>
  </div>

  <hr>

  <footer class="container">
    <div class="row">
      <div>&emsp;&copy; ALL NATIONS ART COMMUNITY</div>
    </div>
  </footer>

</body>
</html>