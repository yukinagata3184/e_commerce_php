<?php
/**
 * @file db_access.php
 * @brief DBへのアクセス、SQLのSELECT関連の関数を実装する。
 * @author nagata
 */

require_once __DIR__ . '/../param/get_param.php';

/**
 * @brief データベースオブジェクトを取得する.
 * @retval [PDO] データベースオブジェクトを返す.
 */
function openDb() :PDO {
    $user = getDbUser();
    $password = getDbPassword();
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    $dbh = new PDO('mysql:host=localhost;dbname=e_commerce_php', $user, $password, $opt);
    return $dbh;
}

/**
 * @brief DBから選択したテーブルのカラムとレコードを全件取得。
 * @param $dbh [PDO] dbOpen()で取得したデータベースオブジェクトを指定。
 * @param $tableName [string] 取得するテーブル名を指定。
 * @retval [array] 選択したテーブルのカラムとレコード全件を格納した配列。
 */
function getDbAll(PDO $dbh, string $tableName): array {
    $sql = "SELECT * FROM `$tableName`";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

/**
 * @brief DBからログイン情報を配列で取得する。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $email [string] ログインするメールアドレスを指定。
 * @retval [array] DBから取得したメールアドレスとパスワード、氏名を格納した配列。
 */
function getLoginInfo(PDO $dbh, string $email): array {
    $sql = "SELECT `member_email`, `member_password`, `member_name`
            FROM `m_member`
            WHERE `member_email` = :member_email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":member_email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

/**
 * @brief DBから引数で与えたグループの商品を配列で取得する。
 * @param $dbh [PDO] openDb()で取得したデータベースオブジェクトを指定。
 * @param $tableName [string] 't_group'または't_season'を指定。
 * @param $columnName [string] 'group_id'または'season_id'を指定。
 * @param $id [int] 取得したい商品グループIDまたは季節IDを指定。
 * @retval [array] DBから取得した商品の配列。
 */
function getDbSelected(PDO $dbh, string $tableName, string $columnName ,int $id): array{
    $sql = "SELECT id.`product_id`, id.`$columnName`, 
                   product.`product_name_jpn`, product.`product_value`, 
                   product.`product_abstract`, product.`product_explain`, product.`product_image`
            FROM `m_product` `product`
            INNER JOIN `$tableName` `id`
            ON product.`product_id` = id.`product_id`
            WHERE id.`product_id` = :product_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':product_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * @brief DBから引数で与えた順位までの売上ランキング上位商品を配列で取得できる。
 * @param $dbh [PDO] openDb()で取得したデータベースオブジェクトを指定。
 * @param $salesRank [int] 売上何位までを取得するか指定。
 * @retval [array] DBから取得した指定した売上順位までの商品の配列。
 */
function getDbSalesRank(PDO $dbh, int $salesRank): array {
    $sql = "SELECT product.`product_id`, product.`product_name_jpn`, product.`product_value`, 
                   product.`product_abstract`, product.`product_explain`, product.`product_image`,
                   SUM(sales.`sales_num`) AS `sales_total`
            FROM `m_product` `product`
            INNER JOIN `t_sales` `sales`
            ON product.`product_id` = sales.`product_id`
            GROUP BY product.`product_id`
            ORDER BY `sales_total` DESC LIMIT :rank";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':rank', $salesRank, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * @brief DBから検索したい商品名が含まれる商品情報を配列で取得できる。
 * @param $dbh [PDO] openDb()で取得したデータベースオブジェクトを指定。
 * @param $salesRank [string] 検索したい商品名を指定。
 * @retval [array] DBから取得した検索したい商品名が含まれる商品情報の配列。
 */
function searchProductFmDb(PDO $dbh, string $searchWord): array {
    $sql = "SELECT `product_id`, `product_name_jpn`, `product_value`, 
                   `product_abstract`, `product_explain`, `product_image`
            FROM `m_product`
            WHERE `product_name_jpn` LIKE :search";
    $stmt = $dbh->prepare($sql);
    $searchConditions = '%' . $searchWord . '%';
    $stmt->bindParam(':search', $searchConditions, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}