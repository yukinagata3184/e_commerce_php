<?php
/**
 * @file test_insert_db_sales.php
 * @brief insertDbSales() の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';
require_once __DIR__ . '/../logic/db_mod.php';

/**
 * @brief insertDbSales()で、売上情報をDBに保存できているか単体テスト。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $customer_id [int] 購入者ID。
 * @param $product_id [int] 商品ID。
 * @param $sales_num [int] 個数。
 * @param $sales_date [string] 購入日。
 */
function testInsertDbSales(PDO $dbh, int $customer_id, int $product_id,
                           int $sales_num, string $sales_date): void {
    insertDbSales($dbh, $customer_id, $product_id, $sales_num, $sales_date);
    var_dump(getDbAll($dbh, 't_sales'));
}

$dbh = openDb();
testInsertDbSales($dbh, 2, 1, 20, date('Y-m-d'));