<?php
/**
 * @file test_insert_db_buy_history.php
 * @brief insertDbBuyHistory() の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';
require_once __DIR__ . '/../logic/db_mod.php';

/**
 * @brief insertDbBuyHistory()でユーザの購入履歴をDBに保存できているか単体テスト。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $member_cd [int] 会員コード。
 * @param $sales_id [int] 売上ID。
 */
function testInsertDbBuyHistory(PDO $dbh, int $member_cd, int $sales_id): void {
    insertDbBuyHistory($dbh, $member_cd, $sales_id);
    var_dump(getDbAll($dbh, 't_buy_history'));
}

$dbh = openDb();
testInsertDbBuyHistory($dbh, 2, 1);