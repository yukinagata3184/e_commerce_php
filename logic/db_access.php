<?php
/**
 * @file db_access.php
 * @brief DBへのアクセス、SQLのSELECT関連の関数を実装する。
 */

require_once __DIR__ . '/../param/get_param.php';

/**
 * @brief データベースオブジェクトを取得する.
 * @retval [PDO] データベースオブジェクトを返す.
 */
function dbOpen() :PDO {
    $user = getDbUser();
    $password = getDbPassword();
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    $dbh = new PDO('mysql:host=localhost;dbname=e_commerce_php', $user, $password, $opt);
    return $dbh;
}