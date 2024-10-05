<?php
$id = $_GET["id"];
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM kadai07_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$value =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>
<!--
２．HTML
-->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>むにむにお便り更新フォーム</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- タイトル -->
    <h1>更新フォーム</h1>

    <!-- 更新フォーム -->
    <form method="POST" action="update.php">

        <div class="name">ニックネーム</div>
        <input type="text" name="name" value="<?=$value["name"]?>"><br>

        <div class="email">メールアドレス</div>
        <input type="text" name="email" value="<?=$value["email"]?>"><br>

        <div class="offline">オフ会参加希望</div>
        <select name="offline"  value="<?=$value["offline"]?>">
            <option value="希望する">希望する</option>
            <option value="希望しない">希望しない</option>
        </select><br>

        <div class="text">感想・ご質問をご記入ください</div>
        <textarea name="memo" cols="30" rows="10"><?=$value["memo"]?></textarea><br>
        
        <input type="hidden" name="id" value="<?=$value["id"]?>">
        
        <button type="submit" id="submit">送信</button>
    </form>
</body>
</html>    