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