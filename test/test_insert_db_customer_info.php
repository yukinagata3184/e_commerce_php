<?php
/**
 * @file test_insert_db_customer_info.php
 * @brief insertDbCustomerInfo() の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';
require_once __DIR__ . '/../logic/db_mod.php';

/**
 * @brief insertDbCustomerInfo()で購入者情報をDBに保存できているか単体テスト。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $customer_zip_code [string] 郵便番号。
 * @param $prefecture_id [int] 都道府県。
 * @param $customer_address [string] 住所(県名除く)。
 * @param $customer_room_number [string] 部屋番号。
 * @param $customer_birth [string] 生年月日。
 * @param $gender_id [int] 性別ID。
 * @param $payment_cd [int] 支払い方法コード。
 */
function testInsertDbCustomerInfo(PDO $dbh, string $customer_zip_code,
                                  int $prefecture_id, string $customer_address,
                                  string $customer_room_number, string $customer_birth, int $gender_id, int $payment_cd): void {
    insertDbCustomerInfo($dbh, $customer_zip_code, $prefecture_id,$customer_address, $customer_room_number, $customer_birth, $gender_id, $payment_cd);
    var_dump(getDbAll($dbh, 't_customer_info'));
}

$dbh = openDb();
testInsertDbCustomerInfo($dbh, '3333333', '1', '札幌市架空3-3', '303号室',
                     date('Y-m-d'), '1', '1');