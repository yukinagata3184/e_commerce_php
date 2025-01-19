<?php
/**
 * @file test_insert_db_credit_card.php
 * @brief insertDbCreditCard() の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';
require_once __DIR__ . '/../logic/db_mod.php';

/**
 * @brief クレジットカードの決済情報をDBに保存できるかの単体テスト(通常は保存しないが今回は練習用)。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $member_cd [string] 会員コード。
 * @param $number [string] カード番号。
 * @param $expiration [string] 有効期限。
 * @param $name [string] 名義人氏名。
 * @param $cvc [string] セキュリティコード。
 */
function testInsertDbCreditCard(PDO $dbh, string $member_cd, string $number, string $expiration,
                            string $name, string $cvc): void {
    insertDbCreditCard($dbh, $member_cd, $number, $expiration, $name, $cvc);
    var_dump(getDbAll($dbh, 't_credit_card'));
}

$dbh = openDb();
testInsertDbCreditCard($dbh, '3', '123', '2024-01-31', 'USER3', '333');