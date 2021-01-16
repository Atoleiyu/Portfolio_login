<?php
try {
  // $db = new  PDO('mysql:dbname=anacom_members;host=localhost;port=8889;charset=utf8', 'root', 'root');
  $db = new  PDO('mysql:dbname=anacom_members;host=localhost;port=118.27.116.243;charset=utf8', 'root', '@Kiara0517');
} catch(PDOException $e) {
  echo 'DB接続エラー' . $e->getMessage();
}
?>