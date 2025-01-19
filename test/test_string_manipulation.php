<?php
/**
 * @file test_string_manipulation.php
 * @brief 文字列操作を行う関数の単体テスト。
 */

require_once __DIR__ . '/../logic/string_manipulation.php';

/**
 * @brief str2htmlの単体テスト。
 * @param $string [string] XSS対策する文字列。
 * @retval [string] XSS対策後の文字列。
 */
function testStr2html(string $string): void {
    echo $string . ' -> ';
    echo str2html($string);
}

testStr2html('<br><script></script>');