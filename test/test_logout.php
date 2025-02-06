<?php
// ログインの判定やカート情報の保持が必要なページ全てに入れる。
session_start();
?>
<?php
/**
 * @file test_logout.php
 * @brief logout()の単体テスト
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

logout();
echo '<br>' . PHP_EOL . 'ログアウト';
echo '<br>' . PHP_EOL . "\$_SESSION:";
var_dump($_SESSION);