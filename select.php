<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM kadai07_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
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
    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <?=$_SESSION["name"]?>さん、こんにちは！
      <a class="navbar-brand" href="index.php">フォーム画面</a>
      <a class="navbar-brand" href="user.php">ユーザー登録</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div id="t">
    <table border="1">
    <tr><th>ID</th><th>ニックネーム</th><th>メールアドレス</th><th>オフ会参加希望</th><th>お便り内容</th><th>日時</th></tr>
    <?php foreach($values as $value){ ?>
    <tr>
        <td><?=h($value["id"])?></td>
        <td><?=h($value["name"])?></td>
        <td><?=h($value["email"])?></td>
        <td><?=h($value["offline"])?></td>
        <td><?=h($value["memo"])?></td>
        <td><?=h($value["indate"])?></td>
        <td><a href="detail.php?id=<?=h($value["id"])?>">更新</a></td>
        <?php if($_SESSION["kanri_flg"]=="1"){ ?>
          <td><a href="delete.php?id=<?=h($value["id"])?>">削除</a></td>
        <?php } ?>
    </tr>  
    <?php } ?>
    </table>
</div>
<!-- Main[End] -->

<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
