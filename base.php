<?php
/**
 * @file base.php
 * @brief ヘッダーとフッターのベースとなるページ。
 * @author nagata
 */
?>
<?php
// ログインの判定やカート情報の保持が必要なページ全てに入れる。
if (!isset($_SESSION)) {
    session_start();
}
include __DIR__ . "/logic/login_check.php";
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="魔法使い,道具屋,ファンタジー,未来の道具,グッズ">
    <meta name="Description" content="魔法や未来の道具の便利なグッズ、変わった食品まで盛りだくさん！！">
    <meta name="author" content="nagata">
    <title>ヘッダーとフッターのベースとなるページ</title>
    <!-- reset css destyle -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css"
    >
    <!-- BootStrap4 -->
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous"
    >
    <!-- ユーザ定義のCSS -->
    <link rel="stylesheet" href="css/base_style.css">
</head>

<body>

</body>

</html>