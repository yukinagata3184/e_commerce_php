<?php
/**
 * @file test_db_access.php
 * @brief db_access.php の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';

function testDbOpen(): void {
    $dbh = dbOpen();
    $assertEqual = ((get_class($dbh) === 'PDO') ? 'passed' : 'failed');
    echo 'testGetSaltTrue : ' . $assertEqual . '<br>' . PHP_EOL;
}

testDbOpen();