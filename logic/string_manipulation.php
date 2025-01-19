<?php
/**
 * @file string_manipulation.php
 * @brief 文字列操作を行う関数を実装する。
 */

/**
 * @brief htmlspecialchars()をwrapする。
 * @param $string [string] XSS対策する文字列。
 * @retval [string] XSS対策後の文字列。
 */
function str2html(string $string) :string {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
