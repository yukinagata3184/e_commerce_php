<?php
/**
 * @file test_login_logic.php
 * @brief login_logic.phpの単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../logic/login_logic.php';

/**
 * @brief toHash()の戻り値が期待値の文字列と一致するかを確認する単体テスト。
 */
function testToHash(): void{
    $assertEqual = ((mb_strlen(toHash('aaa')) === 60) ? 'passed' : 'failed');
    echo 'testToHash : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief isMatchId()でIDが一致するとき、戻り値がtrueになるかを確認する単体テスト。
 */
function testIsMatchIdTrue(): void{
    $assertEqual = (isMatchId('aaa', 'aaa') ? 'passed' : 'failed');
    echo 'testIsMatchIdTrue : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief isMatchId()でIDが一致しないとき、戻り値がfalseになるかを確認する単体テスト。
 */
function testIsMatchIdFalse(): void{
    $assertEqual = (isMatchId('aaa', 'bbb') ? 'failed' : 'passed');
    echo 'testIsMatchIdFalse : ' . $assertEqual . '<br>' . PHP_EOL;
}

testToHash();
testIsMatchIdTrue();
testIsMatchIdFalse();