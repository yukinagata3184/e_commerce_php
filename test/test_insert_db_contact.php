<?php
/**
 * @file test_insert_db_contact.php
 * @brief insertDbContact() の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';
require_once __DIR__ . '/../logic/db_mod.php';

/**
 * @brief insertDbContact()でDBに保存できているかを確認する単体テスト。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $name [string] 氏名。
 * @param $ruby [string] フリガナ。
 * @param $email [string] メールアドレス。
 * @param $tel [string] 電話番号。
 * @param $title [string] お問い合わせ件名。
 * @param $details [string] お問い合わせ内容。
 */
function testInsertDbContact(PDO $dbh, string $name, string $ruby, string $email, string $tel,
                             string $title, string $details): void {
    insertDbContact($dbh, $name, $ruby, $email, $tel, $title, $details);
    var_dump(getDbAll($dbh, 't_contact'));
}

$dbh = openDb();
testInsertDbContact($dbh, '名前', 'ナマエ', 'namae@example.com', '111', '件名', '内容');