<?php
session_start();
if (isset($_POST['exit'])) {
  // unset() = 指定した変数を空にする
  unset($_SESSION['join']);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>会員登録</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/style.css">

  <!-- ajaxzip3 郵便番号検索用 -->
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>


</head>
<body>
  <div id="wrap" class="header container">
    <header class="row">
      <h1 class="col-sm-6">Wellcome! ANACOM</h1>
      <div class="col-sm-6 align-right">
        <a class="btn btn-success " href="../login.php">ログイン画面へ</a>
      </div>
    </header>
  </div>

  <hr>

  <div clsss="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-sm-auto">
        <div>
          <h2>登録完了</h2>
        </div>
        <a class="btn btn-success " href="../login.php">ログイン画面へ</a>
      </div>
    </div>
  </div>

  <hr>

  <div class="container">
    <footer clss0="row">
      <p>&copy; ANACOM</p>
    </footer>
  </div>

  <!-- bootstrap4 jquery JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>