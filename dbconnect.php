<?php
$dsn = 'mysql:dbname=anacom_members;host=localhost;port=8889;charset=utf8';
$user = 'root';
$password = 'root';

try {
  // mamp用↓
  $db = new  PDO($dsn,$user,$password);
  // vps用↓
  // $db = new  PDO('mysql:dbname=anacom_members;host=localhost;port=118.27.116.243;charset=utf8', 'root', '@Kiara0517');
} catch(PDOException $e) {
  echo 'DB接続エラー' . $e->getMessage();
}
?>