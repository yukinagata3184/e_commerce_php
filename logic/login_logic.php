<?php
/**
 * @file login_logic.php
 * @brief implements login logic.
 * @author nagata
 */

/**
 * @brief hashing with SHA512.
 * @param $toBeHash [string] string to be hashed.
 * @retval [string] after hashing.
 */
function toHash(string $toBeHash): string{
    return password_hash($toBeHash, PASSWORD_DEFAULT);
}

/**
 * @brief is match id.
 * @param $inputId [string] user input id.
 * @param $masterId [string] id stored in DB.
 * @retval [string] is match id.
 */
function isMatchId(string $inputId, string $masterId){
    return $inputId === $masterId;
}

$hashedPassword = toHash('aaa');
var_dump($hashedPassword);
var_dump(password_verify('aaa', $hashedPassword));
var_dump(isMatchId('aaa', 'aaa'));
var_dump(isMatchId('aaa', 'bbb'));