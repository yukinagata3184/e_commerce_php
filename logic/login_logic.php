<?php
/**
 * @file login_logic.php
 * @brief ログイン処理を実装。
 * @author nagata
 */

require_once __DIR__ . '/../logic/db_access.php';

/**
 * @brief 文字列をハッシュ化する。
 * @param $toBeHash [string] ハッシュ化する文字列。
 * @retval [string] ハッシュ化後の文字列。
 */
function toHash(string $toBeHash): string{
    return password_hash($toBeHash, PASSWORD_DEFAULT);
}

/**
 * @brief IDが整合するかチェックする。
 * @param $inputId [string] ユーザの入力したID。
 * @param $masterId [string] DBに保存されているID。
 * @retval [bool] IDが整合したかどうか。 
 */
function isMatchId(string $inputId, string $masterId): bool{
    return $inputId === $masterId;
}

/**
 * @brief ログイン認証。
 * @param $email [string] メールアドレス。
 * @param $password [string] ハッシュ化前のパスワード。
 * @retval [bool] ログインできたか。
 */
function tryLogin(string $email, string $password): bool{
    try {
        $dbh = openDb();
        $masterInfo = getLoginInfo($dbh, $email);
        // メールアドレスまたはパスワードがないとき
        if(empty($masterInfo[0]['member_email']) || empty($masterInfo[0]['member_password'])){
            // $_SESSION['login'] = false;
            return false;
        }
        // メールアドレスとパスワードが一致したとき
        if(isMatchId($email, $masterInfo[0]['member_email']) &&
           password_verify($password, $masterInfo[0]['member_password'])){
            session_regenerate_id(true);
		    $_SESSION['login'] = true;
		    $_SESSION['username'] = $masterInfo[0]['member_name'];
            $_SESSION['member_cd'] = $masterInfo[0]['member_cd'];
            return true;
        // メールアドレスかパスワードが間違っているとき
        } else {
            // $_SESSION['login'] = false;
            return false;
        }
    } catch(PDOException $e) {
        // echo 'エラー！：' . str2html($e->getMessage());
        // $_SESSION['login'] = false;
        return false;
    }
}

/**
 * @brief ログアウト処理。
 */
function logout(): void{
    $_SESSION = [];
    session_destroy();
}