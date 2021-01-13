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
          <h1>Wellcome ANACOM</h1>
        </div>
        <div class="col-sm-6 align-right">
          <a href="../login.php">ログイン画面へ</a>
        </div>
      </div>
    </header>
  </div>

  <hr>

  <!-- 必要事項記入欄 -->
  <div class="container">
    <form action="../login.php" method="post" class="row">
      <dl class="col-sm-8 col-sm-offset-2">
        <h2>会員登録完了</h2>
        <p>登録が完了しました<br></p>
        <button>ログイン画面へ</button>
      </dl>
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