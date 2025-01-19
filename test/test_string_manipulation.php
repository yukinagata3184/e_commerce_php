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
    echo 'str2html : ';
    echo $string . ' -> ';
    echo str2html($string) . '<br>' . PHP_EOL;
}

/**
 * @brief <br>以外をhtmlspecialchars()でXSS対策する関数の単体テスト。
 * @param $string [string] XSS対策する文字列。
 * @retval [string] <br>以外、XSS対策した文字列。
 */
function testStr2htmlIgnoreBr(string $string): void {
    echo 'testStr2htmlIgnoreBr : ';
    echo $string . ' -> ';
    echo str2htmlIgnoreBr($string) . '<br>' . PHP_EOL;;
}

testStr2html('<br><script></script>');
testStr2htmlIgnoreBr('<br><script></script>');