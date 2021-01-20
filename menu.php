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

  <style>
    footer {margin-bottom: 16px}
  </style>

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

  <div class="container justify-content-center">
    <div class="row">
      <div class="col-4 mx-auto">
        <p class="lead">こんにちは！<br><?php echo(htmlspecialchars($_SESSION['name'],ENT_QUOTES)); ?>さん</p>
        <p>メニューを選択してください</p>
        <a class="col-12 btn btn-primary btn-block" href="index.php" role="button">会員情報を確認する</a>
        <a class="col-12 btn btn-secondary btn-block" href="" role="button">会員情報を編集する</a>
        <!-- スタッフクラスが1以上の場合のみ、店舗管理画面にアクセスできるようにする -->
        <?php if($_SESSION['staff_class'] > 1):?>
        <a class="col-12 btn btn-success btn-block" href="" role="button">店舗管理画面へ</a>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <hr>

  <footer class="container">
    <div class="row">
      <div>&emsp;&copy; ALL NATIONS ART COMMUNITY</div>
    </div>
  </footer>

  <!-- bootstrap4 jquery JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>