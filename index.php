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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- ajaxzip3 郵便番号検索用 -->
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

  <link rel="stylesheet" href="css/style.css">

  <style> footer {margin-bottom: 16px} </style>

</head>
<body>
  <header class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1><a href="login.php" style="font-size: 18px;color: rgb(245, 110, 130)">Wellcome! Portfolio</a></h1>
      </div>
    </div>
  </header>

  <hr>

  <!-- 必要事項記入欄 -->
  <div class="container">
    <form action="" method="post" class="row">
      <div class="col-sm-5 mx-auto">
        <div>
          <h2>会員情報確認</h2>
          <p>入力された内容をご確認ください<br></p>

        </div>

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
          <a type="submit" class="btn btn-warning" href="menu.php">メニュー画面へ戻る</a>
          /
          <a type="submit" name="action" class="btn btn-danger" href="">退会する</a>
        </div>

      </div>
    </form>
  </div>

  <hr>

  <footer class="container">
    <div class="row">
      <div>&emsp;&copy; Café Portfolio</div>
    </div>
  </footer>

  <!-- bootstrap4 jquery JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>