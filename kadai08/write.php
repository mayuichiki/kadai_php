<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信完了</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    $name    = $_POST["name"];
    $email   = $_POST["email"];
    $memo    = $_POST["memo"];
    $indate  = $_POST["indate"];
    $c       = ",";
    $str     = $name.$c.$email.$c.$memo;

    $file = fopen("data.csv","a");
    fwrite($file, $str."\n");
    fclose($file);

    // 完了メッセージ
    echo '<div id="end">お便りの投稿ありがとうございました😊</div><br>';
    echo '<a href="index.php" id="back">戻る</a>';
    ?>
</body>
</html>