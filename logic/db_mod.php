<?php
/**
 * @file db_mod.php
 * @brief SQLのUPDATE、INSERT、DELETEなどDBの更新系の関数を実装する。
 * @author nagata
 */

/**
 * @brief お問い合わせフォームに入力された情報をDBに保存。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $name [string] 氏名。
 * @param $ruby [string] フリガナ。
 * @param $email [string] メールアドレス。
 * @param $tel [string] 電話番号。
 * @param $title [string] お問い合わせ件名。
 * @param $details [string] お問い合わせ内容。
 */
function insertDbContact(PDO $dbh, string $name, string $ruby, string $email, string $tel,
                         string $title, string $details): void {
    $sql = "INSERT INTO `t_contact` (`contact_name`, `contact_ruby`, `contact_email`,
                                     `contact_tel`, `contact_title`, `contact_details`)
            VALUES (:name, :ruby, :email, :tel, :title, :details)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':ruby', $ruby);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':details', $details);
    $stmt->execute();
}

/**
 * @brief 会員情報の入力フォームに入力された情報をDBに保存。
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
function insertDbMember(PDO $dbh, string $password, string $name, string $ruby, 
                        string $email, string $tel, string $zip_code, string $prefecture_id,
                        string $address, string $room_number,
                        string $birth, string $gender_id): void {
    $sql = "INSERT INTO `m_member` (`member_password`, `member_name`, `member_ruby`,
                        `member_email`, `member_tel`, `member_zip_code`, `prefecture_id`,
                        `member_address`, `member_room_number`, `member_birth`, `gender_id`)
            VALUES (:password, :name, :ruby, :email, :tel, :zip_code, :prefecture_id,
                    :address, :room_number, :birth, :gender_id)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':ruby', $ruby);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':zip_code', $zip_code);
    $stmt->bindParam(':prefecture_id', $prefecture_id);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':room_number', $room_number);
    $stmt->bindParam(':birth', $birth);
    $stmt->bindParam(':gender_id', $gender_id);
    $stmt->execute();
}

/**
 * @brief クレジットカードの決済情報をDBに保存(通常は同じDBに保存しないが今回は練習用)。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $member_cd [string] 会員コード。
 * @param $number [string] カード番号。
 * @param $expiration [string] 有効期限。
 * @param $name [string] 名義人氏名。
 * @param $cvc [string] セキュリティコード。
 */
function insertDbCreditCard(PDO $dbh, string $member_cd, string $number, string $expiration,
                            string $name, string $cvc): void {
    $sql = "INSERT INTO `t_credit_card` (`member_cd`, `credit_card_number`,
                        `credit_card_expiration`, `credit_card_name`, `credit_card_cvc`) 
            VALUES (:member_cd, :number, :expiration, :name, :cvc)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':member_cd', $member_cd);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':expiration', $expiration);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':cvc', $cvc);
    $stmt->execute();
}

/**
 * @brief 在庫を更新する。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $product_id [int] 更新する商品のID。
 * @param $stock_num [int] 更新する在庫数。
 */
function updateDbStock(PDO $dbh, int $product_id, int $stock_num): void {
    $sql = "UPDATE `t_stock`
            SET `stock_num` = :stock_num
            WHERE `product_id` = :product_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':stock_num', $stock_num, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
}

/**
 * @brief 購入者情報をDBに保存。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $customer_zip_code [string] 郵便番号。
 * @param $prefecture_id [int] 都道府県。
 * @param $customer_address [string] 住所(県名除く)。
 * @param $customer_room_number [string] 部屋番号。
 * @param $customer_birth [string] 生年月日。
 * @param $gender_id [int] 性別ID。
 * @param $payment_cd [int] 支払い方法コード。
 */
function insertDbCustomerInfo(PDO $dbh, string $customer_zip_code, int $prefecture_id,
                              string $customer_address, string $customer_room_number,
                              string $customer_birth, int $gender_id, int $payment_cd): void {
    $sql = "INSERT INTO `t_customer_info` (`customer_zip_code`, `prefecture_id`,
                        `customer_address`, `customer_room_number`, `customer_birth`,
                        `gender_id`, `payment_cd`)
            VALUES (:customer_zip_code, :prefecture_id, :customer_address,
                    :customer_room_number, :customer_birth, :gender_id, :payment_cd)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':customer_zip_code', $customer_zip_code, PDO::PARAM_STR);
    $stmt->bindParam(':prefecture_id', $prefecture_id, PDO::PARAM_INT);
    $stmt->bindParam(':customer_address', $customer_address, PDO::PARAM_STR);
    $stmt->bindParam(':customer_room_number', $customer_room_number, PDO::PARAM_STR);
    $stmt->bindParam(':customer_birth', $customer_birth, PDO::PARAM_STR);
    $stmt->bindParam(':gender_id', $gender_id, PDO::PARAM_INT);
    $stmt->bindParam(':payment_cd', $payment_cd, PDO::PARAM_INT);
    $stmt->execute();
}

/**
 * @brief 売上情報をDBに保存。
 * @param $dbh [PDO] db_open()で取得したデータベースオブジェクトを指定。
 * @param $customer_id [int] 購入者ID。
 * @param $product_id [int] 商品ID。
 * @param $sales_num [int] 個数。
 * @param $sales_date [string] 購入日。
 */
function insertDbSales(PDO $dbh, int $customer_id, int $product_id, int $sales_num,
                       string $sales_date): void {
    $sql = "INSERT INTO `t_sales` (`customer_id`, `product_id`, `sales_num`, `sales_date`) 
            VALUES (:customer_id, :product_id, :sales_num, :sales_date)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->bindParam(':sales_num', $sales_num, PDO::PARAM_INT);
    $stmt->bindParam(':sales_date', $sales_date, PDO::PARAM_STR);
    $stmt->execute();
}
