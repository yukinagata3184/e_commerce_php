<?php
/**
 * @file login_check.php
 * @brief ログインのセッション情報を持っているか否かをHTMLのコメント文に出力するPHPスクリプト。
 * @author nagata
 */

// 呼び出し元のプログラムでsession_start()を宣言しているとき重複を避ける目的
if(!isset($_SESSION)) {
    session_start();
}

if(empty($_SESSION['login'])) {
    echo '<!--ログインしていません-->' . PHP_EOL;
} else {
    echo '<!--ログイン中です-->' . PHP_EOL;
}