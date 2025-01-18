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
function openDb() :PDO {
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

/**
 * @brief DBから選択したテーブルのカラムを全件取得。
 * @param $dbh [PDO] dbOpen()で取得したデータベースオブジェクトを指定。
 * @retval [array] 選択したテーブルのカラム全件を格納した配列。
 */
function getDbAll(PDO $dbh, string $columnName): array{
    $sql = "SELECT * FROM `$columnName`";
    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}