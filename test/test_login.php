<?php
// ログインの判定やカート情報の保持が必要なページ全てに入れる。
session_start();
?>
<?php
/**
 * @file test_login.php
 * @brief tryLogin()の単体テスト
 */

require_once __DIR__ . '/../logic/login_logic.php';

$isLogin = tryLogin('user1@example.com', 'password1');
echo 'ログイン情報が一致:';
var_dump($isLogin);
echo '<br>' . PHP_EOL . "\$_SESSION['login']:";
var_dump($_SESSION['login']);
echo '<br>' . PHP_EOL . "\$_SESSION['username']:";
var_dump($_SESSION['username']);
echo '<br>' . PHP_EOL . "\$_SESSION['member_cd']:";
var_dump($_SESSION['member_cd']);

$isLogin = tryLogin('user1@example.co', 'password1');
echo '<br>' . PHP_EOL . 'メールアドレスが誤り:';
var_dump($isLogin);
echo '<br>' . PHP_EOL . "\$_SESSION['login']:";
var_dump($_SESSION['login']);

$isLogin = tryLogin('user1@example.com', 'password');
echo '<br>' . PHP_EOL . 'パスワードが誤り:';
var_dump($isLogin);
echo '<br>' . PHP_EOL . "\$_SESSION['login']:";
var_dump($_SESSION['login']);

$isLogin = tryLogin('user1@example.co', 'password');
echo '<br>' . PHP_EOL . 'メールアドレスとパスワードが誤り:';
var_dump($isLogin);
echo '<br>' . PHP_EOL . "\$_SESSION['login']:";
var_dump($_SESSION['login']);