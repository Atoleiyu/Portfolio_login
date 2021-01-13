<?php
session_start();
require('../dbconnect.php');

// 配列に要素があるかを確認。空の場合はindex.phpへ戻す
if (!isset($_SESSION['join'])) {
  header('Location: index.php');
  exit();
}

if ($_POST) {
  // 一年後の有効期限を$_SESSION['join']['expiration_date']に渡す
  $_SESSION['join']['updated_at'] = date('Y-m-d', strtotime('+1 year'));
  $_SESSION['join']['bday'] = $_SESSION['join']['year'] . $_SESSION['join']['month'] . $_SESSION['join']['day'];
  $_SESSION['join']['zip'] = $_SESSION['join']['zip1'] . $_SESSION['join']['zip2'];

  $members = $db->prepare('INSERT INTO members SET name=?, furigana=?, bday=?, gender=?, created_at=NOW(), updated_at=?');
    $members->execute(array(
    // $_SESSION['join']['~array~'] = 二次元配列	配列が二段階になったもの
    $_SESSION['join']['name'],
    $_SESSION['join']['furigana'],
    $_SESSION['join']['bday'],
    $_SESSION['join']['gender'],
    $_SESSION['join']['updated_at']
  ));

  $members = $db->prepare('INSERT INTO address SET zip=?, add1=?, add2=?, add3=?');
    $members->execute(array(
    // $_SESSION['join']['~array~'] = 二次元配列	配列が二段階になったもの
    $_SESSION['join']['zip'],
    $_SESSION['join']['address1'],
    $_SESSION['join']['address2'],
    $_SESSION['join']['address3']
  ));
  
  $members = $db->prepare('INSERT INTO account SET tel=?, mail=?, pass=?');
    $members->execute(array(
    // $_SESSION['join']['~array~'] = 二次元配列	配列が二段階になったもの
    $_SESSION['join']['tel'],
    $_SESSION['join']['mail'],
    $_SESSION['join']['pass']
  ));

  // $db->prepare('INSERT INTO address (id) from members  ')

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
          <a href="">HOMEへ戻る</a>
        </div>
      </div>
    </header>
  </div>

  <hr>

  <!-- 必要事項記入欄 -->
  <div class="container">
    <form action="" method="post" class="row">
      <dl class="col-sm-8 col-sm-offset-2">
        <h2>入力情報確認</h2>
        <p>入力された内容をご確認ください<br></p>

        <hr>

        <!-- 氏名 -->
        <div class="form-group">
          <label for="name">お名前</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES)); ?>
          </dd>
        </div>
        <!-- フリガナ -->
        <div class="form-group">
          <label for="name">フリガナ</label>
          <dd>
          <?php echo (htmlspecialchars($_SESSION['join']['furigana'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <!-- 郵便番号 -->
        <div class="form-group">
          <label>郵便番号</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['join']['zip1'] .'-'. $_SESSION['join']['zip2'],ENT_QUOTES)); ?>
          </dd>
        </div>
        <!-- 住所 -->
        <div class="form-group">
          <label>住所</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['join']['address1'] . $_SESSION['join']['address2'] . $_SESSION['join']['address3'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <!-- 電話番号 -->
        <div class="form-group">
          <label>電話番号</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['join']['tel'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <!-- メールアドレス -->
        <div class="form-group">
          <label>メールアドレス</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['join']['mail'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <!-- パスワード -->
        <div class="form-group">
          <label>パスワード</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['join']['pass'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <!-- 生年月日 -->
        <div class="form-group">
          <label>生年月日</label>
          <dd>
            <?php
              echo (htmlspecialchars($_SESSION['join']['year']. "年" . $_SESSION['join']['month']. "月" . $_SESSION['join']['day'] . "日", ENT_QUOTES));
            ?>
          </dd>
        </div>

        <hr>

        <!-- 性別 -->
        <div class="form-group">
          <label>性別</label>
          <dd>
            <?php echo (htmlspecialchars($_SESSION['join']['gender'],ENT_QUOTES)); ?>
          </dd>
        </div>

        <hr>

        <div>
          <a type="submit" class="btn btn-warning" href="index.php?action=rewrite">書き直す</a>
          /
          <button type="submit" name="action" class="btn btn-primary">登録する</button>
        </div>

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