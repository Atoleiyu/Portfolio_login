<?php
session_start();
require('dbconnect.php');

if ($_POST['mail'] && $_POST['pass']) {

  $sql = "SELECT *  FROM account  WHERE mail = :mail , pass = :pass";
  $stt = $db->prepare($sql);
  $stt->bindParam(':mail', $_POST['mail']);
  $stt->bindParam(':pass', $_POST['pass']);
  $stt->execute();
  $stt->fetch();

  $_SESSION = $stt;
  header('Location: index.php');
  exit();
}
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
    .content {
      margin: 15px 0;
      padding: 40px;
      border-color: silver;
    }

    h2  {
      color: rgb(245, 110, 130);
    }

    .head p {
      font-weight: bold;
    }

    .head {
      text-align: center;
    }

    .mail {
      margin-top: 40px;
    }

    .btn-warning {
      margin-top: 18px;
    }

    .bottom {
      border: 0.5px solid silver;
      margin: 15px 0;
    }

  </style>

</head>
<body>
  <div class="container">
    <header>
      <div class="row">
        <div class="col-sm-6">
          <h1>Wellcome! ANACOM</h1>
        </div>
        <div class="col-sm-6 align-right">
          <a href="">HOMEへ戻る</a>
        </div>
      </div>
    </header>
  </div>

  <hr>

  <!-- 必要事項記入欄 -->
  <div class="row justify-content-center">
    <form action="" method="post" class="row">
      <div class="content col-sm-12 border rounded">
        <div class="head">
          <h2>Welcome ANACOM</h2>
          <p>ログイン用のIDとパスワード入力してください</p>
        </div>

        <div class="form-group mail">
          <label>メールアドレス</label>
          <input type="mail" name="mail" class="form-control">
        </div>

        <div class="form-group pass">
          <label>パスワード</label>
          <input type="password" name="pass" class="form-control">
        </div>


        <button type="submit" class="btn btn-warning col-sm-12">ログイン</button>

        <hr class="bottom">

        <a href="join/index.php" class="btn btn-secondary col-sm-12">新規会員登録はこちら</a>

      </div>
    </form>
  </div>

  <hr>

  <div class="container">
    <footer>
      <p>&copy; ANACOM</p>
    </footer>
  </div>

  <!-- bootstrap4 jquery JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>