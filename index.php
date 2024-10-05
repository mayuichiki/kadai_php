<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>むにむにお便りフォーム</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- タイトル -->
    <h1>お便りフォーム</h1>

    <!-- トップメッセージ -->
    <p id="a">
        「むにむに　〜世界を変える社会起業家〜」をお聴きいただきありがとうございます<br>
        本フォームより番組の感想をお寄せください
    </p>

    <!-- 番組情報 -->
    <div id="iframe">
        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/show/64ec576NYEJcrYGXqquGtS?utm_source=generator" width="50%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>        
    </div>
    
    <!-- お便りフォーム -->
    <form method="POST" action="insert.php">

        <div class="name">ニックネーム</div>
        <input type="text" name="name"><br>

        <div class="email">メールアドレス</div>
        <input type="text" name="email"><br>

        <div class="offline">オフ会参加希望</div>
        <select name="offline">
            <option value="希望する">希望する</option>
            <option value="希望しない">希望しない</option>
        </select><br>

        <div class="text">感想・ご質問をご記入ください</div>
        <textarea name="memo" cols="30" rows="10"></textarea><br>

        <button type="submit" id="submit">送信</button>
    </form>
</body>
</html>