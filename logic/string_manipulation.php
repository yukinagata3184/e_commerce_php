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
function str2html(string $string): string {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * @brief <br>以外をhtmlspecialchars()でXSS対策する。
 * @param $string [string] XSS対策する文字列。
 * @retval [string] <br>以外、XSS対策した文字列。
 */
function str2htmlIgnoreBr(string $string) :string {
    return str_replace('&lt;br&gt;', '<br>', str2html($string)); 
}