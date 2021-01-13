<?php
try {
  $db = new  PDO('mysql:dbname=anacom_members;host=localhost;port=8889;charset=utf8mb4','root','root');
} catch(PDOException $e) {
  echo 'DB接続エラー' . $e->getMessage();
}

ini_set("display_errors", On);
error_reporting(E_ALL);

if($_POST){
  $sql = "INSERT INTO test (name) VALUES ('カレー')";
  $data = $db->query($sql);
  $data->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>DB接続テスト</title>


</head>
<body>
  <!-- 必要事項記入欄 -->
  <div class="container">
    <form action="" method="post">
      <button type="submit" name="action" class="btn btn-primary">登録する</button>
    </form>
  </div>

</body>
</html>