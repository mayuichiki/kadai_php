<?php
session_start();
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$email  = $_POST["email"];
$offline = $_POST["offline"];
$memo    = $_POST["memo"];

//2. DB接続します
//*** function化する！  *****************
include("funcs.php");
//LOGINチェック
sschk();
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "UPDATE kadai07_table SET name=:name,email=:email,offline=:offline,memo=:memo WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',    $id,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':offline',    $offline,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    sql_error($stmt);
}else{
    //*** function化する！*****************
    redirect("select.php");    
}
?>
