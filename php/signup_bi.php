<?php
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

  // メールアドレス重複チェック
  if (empty($error)) {
    $member = $db->prepare('SELECT COUNT(*) AS cnt FROM account WHERE mail=?');
    $member->execute(array($_POST['mail_check']));
    $record = $member->fetch();
    if($record['cnt'] > 0) {
      $error['mail'] = 'duplicate';
    }
  }
}

if (empty($error) && !empty($_POST)) {

  if (empty($error)) {
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
}

// check.phpから戻って来た時、記入欄を維持する処理
  if($_REQUEST['action'] === 'rewrite' && isset($_SESSION['join'])) {
    $_POST = $_SESSION['join'];
  }
?>