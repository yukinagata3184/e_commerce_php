<?php
/**
 * @file test_is_exist_email.php
 * @brief isExistEmail() の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';

/**
 * @brief 登録するメールアドレスがユニークかチェック関数の単体テスト。
 * @param $email [string] 登録するメールアドレス。
 * @retval [bool] 登録するメールアドレスが既に存在するか。
 */
function testIsExistEmail(PDO $dbh, string $email): void {
    $isExist = isExistEmail($dbh, $email);
    echo $email . ' is exist :';
    var_dump($isExist);
}

$dbh = openDb();
testIsExistEmail($dbh, 'user1@example.com');
testIsExistEmail($dbh, 'usa@example.com');