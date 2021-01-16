<?php
// mamp用↓
$dsn = 'mysql:dbname=anacom_members;host=localhost;port=8889;charset=utf8';
$user = 'root';
$password = 'root';
// vps用↓
// $dsn = 'mysql:dbname=anacom_members;host=localhost;port=118.27.116.243;charset=utf8';
// $user = 'root';
// $password = '@Kiara0517';

try {
  $db = new  PDO($dsn,$user,$password);
} catch(PDOException $e) {
  echo 'DB接続エラー' . $e->getMessage();
}
?>