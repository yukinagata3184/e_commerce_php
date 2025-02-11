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
    echo 'testGetOpenDb : ' . $assertEqual . '<br>' . PHP_EOL;
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

/**
 * @brief getLoginInfo()でログイン情報を配列で取得できているかテスト。
 * @param $dbh [PDO] dbOpen()で取得したデータベースオブジェクトを指定。
 * @param $email [string] 取得する会員のメールアドレスを指定。
 */
function testGetLoginInfo(PDO $dbh, string $email): void {
    $loginInfo = getLoginInfo($dbh, $email);
    echo 'testGetLoginInfo : ' . '<br>' . PHP_EOL;
    echo ' 会員コード:' . $loginInfo[0]['member_cd'] . '<br>' . PHP_EOL;
    echo ' メール:' . $loginInfo[0]['member_email'] . '<br>' . PHP_EOL;
    echo ' パスワード:' . $loginInfo[0]['member_password'] . '<br>' . PHP_EOL;
    echo ' ユーザ名:' . $loginInfo[0]['member_name'] . '<br>' . PHP_EOL;
}

/**
 * @brief getDbSelected()で選択した商品が配列で取得できているかテスト。
 * @param $dbh [PDO] openDb()で取得したデータベースオブジェクトを指定。
 * @param $tableName [string] 't_group'または't_season'を指定。
 * @param $columnName [string] 'group_id'または'season_id'を指定。
 * @param $id [int] 取得したい商品グループIDまたは季節IDを指定。
 */
function testGetDbSelected(PDO $dbh, string $tableName, string $columnName ,int $id): void {
    $selectedItem = getDbSelected(openDb(), 't_season', 'season_id', 1);
    echo 'testGetDbSelected : ' . $columnName . '=' . $id . '<br>' . PHP_EOL;
    var_dump($selectedItem);
}

/**
 * @brief getDbSalesRank()の引数で与えた順位までの売上ランキング上位商品を配列で取得できるかテスト。
 * @param $dbh [PDO] openDb()で取得したデータベースオブジェクトを指定。
 * @param $salesRank [int] 売上何位までを取得するか指定。
 */
function testGetDbSalesRank(PDO $dbh, int $salesRank): void {
    $rank = getDbSalesRank($dbh, $salesRank);
    echo 'testGetDbSalesRank : ' . '順位=' . $salesRank . '<br>' . PHP_EOL;
    var_dump($rank);
}

/**
 * @brief searchProductFmDb()で指定した商品名が含まれる商品情報を取得できるかテスト。
 * @param $dbh [PDO] openDb()で取得したデータベースオブジェクトを指定。
 * @param $salesRank [string] 検索したい商品名を指定。
 */
function testSearchProductFmDb(PDO $dbh, string $searchWord): void {
    $search = searchProductFmDb($dbh, $searchWord);
    echo 'testSearchProductFmDb : ' . '検索キーワード=' . $searchWord . '<br>' . PHP_EOL;
    var_dump($search);
}

/**
 * @brief 登録するメールアドレスがユニークかチェックする関数の単体テスト。
 * @param $email [string] 登録するメールアドレス。
 * @retval [bool] 登録するメールアドレスが既に存在するか。
 */
function testIsExistEmail(PDO $dbh, string $email): void {
    $isExist = isExistEmail($dbh, $email);
    echo $email . ' is exist :';
    var_dump($isExist);
    echo '<br>' . PHP_EOL;
}

/**
 * @brief isExistBto()で受注生産の商品かをチェックできているかテスト。
 * @param $product_id [int] 商品ID。
 */
function testIsExistBto(PDO $dbh, int $product_id): void {
    $isExist = isExistBto($dbh, $product_id);
    echo '商品ID->' . $product_id . ' is exist :';
    var_dump($isExist);
    echo '<br>' . PHP_EOL;
}

testOpenDb();
echo '<br>' . PHP_EOL;
testGetDbAll(openDb(), 'm_product');
testGetDbAll(openDb(), 'm_member');
echo '<br>' . PHP_EOL;
testGetLoginInfo(openDb(), 'user1@example.com');
testGetLoginInfo(openDb(), 'user2@example.com');
echo '<br>' . PHP_EOL;
testGetDbSelected(openDb(), 't_group', 'group_id', 1);
echo '<br>' . PHP_EOL;
echo '<br>' . PHP_EOL;
testGetDbSelected(openDb(), 't_season', 'season_id', 1);
echo '<br>' . PHP_EOL;
echo '<br>' . PHP_EOL;
testGetDbSalesRank(openDb(), 1);
echo '<br>' . PHP_EOL;
echo '<br>' . PHP_EOL;
testGetDbSalesRank(openDb(), 3);
echo '<br>' . PHP_EOL;
echo '<br>' . PHP_EOL;
testSearchProductFmDb(openDb(), '商品');
echo '<br>' . PHP_EOL;
echo '<br>' . PHP_EOL;
testSearchProductFmDb(openDb(), '存在しない');
echo '<br>' . PHP_EOL;
echo '<br>' . PHP_EOL;
testIsExistEmail(openDb(), 'user1@example.com');
testIsExistEmail(openDb(), 'usa@example.com');
echo '<br>' . PHP_EOL;
testIsExistBto(openDb(), 1);
testIsExistBto(openDb(), 2);