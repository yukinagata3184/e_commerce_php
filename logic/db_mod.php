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