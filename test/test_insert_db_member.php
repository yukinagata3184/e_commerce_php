<?php
/**
 * @file test_insert_db_member.php
 * @brief insertDbContact() の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';
require_once __DIR__ . '/../logic/db_mod.php';

/**
 * @brief insertDbMember()で会員情報の入力フォームに入力された情報をDBに保存できるかの単体テスト。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $password [string] パスワード。
 * @param $name [string] 氏名。
 * @param $ruby [string] フリガナ。
 * @param $email [string] メールアドレス。
 * @param $tel [string] 電話番号。
 * @param $zip_code [string] 郵便番号。
 * @param $prefecture_id [string] 都道府県コード。
 * @param $address [string] 住所。
 * @param $room_number [string] 部屋番号。
 * @param $birth [string] 生年月日。
 * @param $gender_id [string] 性別コード。
 */
function testInsertDbMember(PDO $dbh, string $password, string $name, string $ruby, 
                        string $email, string $tel, string $zip_code, string $prefecture_id,
                        string $address, string $room_number,
                        string $birth, string $gender_id): void {
    insertDbMember($dbh, $password, $name, $ruby, $email, $tel, $zip_code, $prefecture_id,
                   $address, $room_number, $birth, $gender_id);
    var_dump(getDbAll($dbh, 'm_member'));
}

$dbh = openDb();
testInsertDbMember($dbh, 'aaa', 'aaa', 'aaa', 'a@example.com', '123456789', '3333333', '3',
                   '秋田市架空3-3', '303', '2003-03-03', '1');