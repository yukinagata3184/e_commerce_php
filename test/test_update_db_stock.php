<?php
/**
 * @file test_update_db_stock.php
 * @brief updateDbStock() の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';
require_once __DIR__ . '/../logic/db_mod.php';

/**
 * @brief 在庫を更新する関数の単体テスト。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $product_id [int] 更新する商品のID。
 * @param $stock_num [int] 更新する在庫数。
 */
function testUpdateDbStock(PDO $dbh, int $product_id, int $stock_num): void {
    updateDbStock($dbh, $product_id, $stock_num);
    var_dump(getDbAll($dbh, 't_stock'));
}

$dbh = openDb();
testUpdateDbStock($dbh, 1, 100);