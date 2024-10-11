<?php
//1. POSTデータ取得
//[name,email,memo]
$name       = $_POST["name"];
$email      = $_POST["email"];
$offline    = $_POST["offline"];
$memo       = $_POST["memo"];

//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=データベース名（ユーザー名）;charset=utf8;host=mysql80.healthroomapp.sakura.ne.jp','データベース名（ユーザー名）','パスワード');
//   $pdo = new PDO('mysql:dbname=kadai07_basic_php;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DB_CONECT:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql = "INSERT INTO kadai07_table(name,email,offline,memo,indate)VALUES(:name,:email,:offline,:memo,sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':offline',  $offline,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':memo',   $memo,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //true or fales

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit();
}
?>
