<?php
session_start();
require('../dbconnect.php');

if ($_POST) {
  $delete =  $db->prepare('DELETE FROM members WHERE id=?');
  $delete->execute(array(
    $_SESSION['id'],
  ));

  $delete =  $db->prepare('DELETE FROM account WHERE id=?');
  $delete->execute(array(
    $_SESSION['id'],
  ));

  $delete =  $db->prepare('DELETE FROM address WHERE id=?');
  $delete->execute(array(
    $_SESSION['id'],
  ));

  header('Location: thanks.php');
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

  <link rel="stylesheet" href="../css/style.css">

  <style> footer {margin-bottom: 16px} </style>

</head>
<body>
  <header class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1><a href="../login.php" style="font-size: 18px;color: rgb(245, 110, 130)">Wellcome! Portfolio</a></h1>
      </div>
    </div>
  </header>

  <hr>

    <!-- 退会画面 -->
    <div class="container justify-content-center">
    <form action="" method="post" class="row">
      <div class="content col-sm-5 mx-auto border rounded">

        <!-- 説明文 -->
        <div class="head">
          <h2>退会してもよろしいですか？</h2>
          <p style="color: red; font-weight: bold; font-size: 20px">※退会すると元のデータは削除されます</p>
        </div>

        <a href="../menu.php" type="submit" name="login" class="btn btn-primary col-sm-12">メニュー画面へ戻る</a>

        <hr class="bottom">

        <button type="submit" name="delete" class="btn btn-danger col-sm-12" style="margin-bottom: 8px">退会する</button>
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