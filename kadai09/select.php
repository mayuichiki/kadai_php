<?php
//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=データベース名（ユーザー名）;charset=utf8;host=mysql80.healthroomapp.sakura.ne.jp','データベース名（ユーザー名）','パスワード');
} catch (PDOException $e) {
  exit('DB_CONECT:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM kadai07_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
// $values = "";
if($status==false) {
  $error = $stmt->errorInfo();
  exit("SQL_Error:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お便り一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="main">
<!-- Head[Start] -->
<header>
    <!-- タイトル -->
    <h1>お便り一覧</h1>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div id="t">
    <table border="1">
    <tr><th>ニックネーム</th><th>メールアドレス</th><th>オフ会参加希望</th><th>お便り内容</th><th>日時</th></tr>
    <?php foreach($values as $value){ ?>
    <tr>
        <td><?=$value["name"]?></td>
        <td><?=$value["email"]?></td>
        <td><?=$value["offline"]?></td>
        <td><?=$value["memo"]?></td>
        <td><?=$value["indate"]?></td>
    </tr>  
    <?php } ?>
    </table>
</div>
<!-- Main[End] -->


<script>
  //JSON受け取り
  $a = '<?=$json?>';
  const obj = JSON.parse($a);
  console.log(obj);
</script>
</body>
</html>
