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

testOpenDb();
testGetDbAll(openDb(), 'm_product');
testGetDbAll(openDb(), 'm_member');