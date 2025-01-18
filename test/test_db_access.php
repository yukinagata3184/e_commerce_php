<?php
/**
 * @file test_db_access.php
 * @brief db_access.php の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';

/**
 * @brief openDb()でPDOオブジェクトが取得できているかテスト。
 */
function testOpenDb(): void {
    $dbh = openDb();
    $assertEqual = ((get_class($dbh) === 'PDO') ? 'passed' : 'failed');
    echo 'testGetSaltTrue : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief getDbAll()で選択したテーブルからレコードとカラム全件を取得できているかテスト。
 * @param $dbh [PDO] dbOpen()で取得したデータベースオブジェクトを指定。
 * @param $tableName [string] 取得するテーブル名を指定。
 */
function testGetDbAll(PDO $dbh, string $tableName): void {
    $allTable = getDbAll($dbh, $tableName);
    echo 'testGetDbAll : ' . '<br>' . PHP_EOL;
    echo ' テーブル名:' . $tableName . '<br>' . PHP_EOL;
    echo ' レコード数:' . count($allTable) . '<br>' . PHP_EOL;
    echo ' カラム数:' . count($allTable[0]) / count($allTable) . '<br>' . PHP_EOL;
}

/**
 * @brief getLoginInfo()でログイン情報を配列で取得できているかテスト。
 * @param $dbh [PDO] dbOpen()で取得したデータベースオブジェクトを指定。
 * @param $email [string] 取得する会員のメールアドレスを指定。
 */
function testGetLoginInfo(PDO $dbh, string $email): void {
    $loginInfo = getLoginInfo($dbh, $email);
    echo 'testGetLoginInfo : ' . '<br>' . PHP_EOL;
    echo ' メール:' . $loginInfo[0]['member_email'] . '<br>' . PHP_EOL;
    echo ' パスワード:' . $loginInfo[0]['member_password'] . '<br>' . PHP_EOL;
    echo ' ユーザ名:' . $loginInfo[0]['member_name'] . '<br>' . PHP_EOL;
}

testOpenDb();
testGetDbAll(openDb(), 'm_product');
testGetDbAll(openDb(), 'm_member');
testGetLoginInfo(openDb(), 'user1@example.com');
testGetLoginInfo(openDb(), 'user2@example.com');