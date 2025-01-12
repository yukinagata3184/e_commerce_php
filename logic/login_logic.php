<?php
/**
 * @file login_logic.php
 * @brief implements login logic.
 * @author nagata
 */

require_once __DIR__ . '/../param/get_param.php';

/**
 * @brief hashing with SHA512.
 * @param $toBeHash [string] string to be hashed.
 * @retval [string] after hashing.
 */
function toHash(string $toBeHash): string{
    return password_hash($toBeHash, PASSWORD_DEFAULT);
}

$hashedPassword = toHash('aaa');
var_dump($hashedPassword);
echo(password_verify('aaa', $hashedPassword));