<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お便り一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- タイトル -->
<h1>お便り一覧</h1>

<?php
// データ読み込み
$file = fopen("data.csv", "r");
if ($file) {
    echo '<div id="t"><table border="1">';
    echo '<tr><th>ニックネーム</th><th>メールアドレス</th><th>お便り</th><th>日時</th></tr>';
    
    // データを1行ずつ読み込んで表示
    while (($line = fgetcsv($file)) !== false) {
        echo '<tr>';
        foreach ($line as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>';
        }
        echo '</tr>';
    }
    
    echo '</table></div>';
    fclose($file);
} else {
    echo "Error: ファイルを読み取ることができません";
}
?>
  
</body>
</html>