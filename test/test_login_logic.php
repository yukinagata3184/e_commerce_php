<?php
/**
 * @file test_login_logic.php
 * @brief test login_logic.php.
 * @author nagata
 */

require_once __DIR__ . '/../logic/login_logic.php';

/**
 * @brief check to match the expected string length at return toHash().
 */
function testToHash(): void{
    $assertEqual = ((mb_strlen(toHash('aaa')) === 60) ? 'passed' : 'failed');
    echo 'testToHash : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief if the ID matches at isMatchId().
 */
function testIsMatchIdTrue(): void{
    $assertEqual = (isMatchId('aaa', 'aaa') ? 'passed' : 'failed');
    echo 'testIsMatchIdTrue : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief if the ID not matches at isMatchId().
 */
function testIsMatchIdFalse(): void{
    $assertEqual = (isMatchId('aaa', 'bbb') ? 'failed' : 'passed');
    echo 'testIsMatchIdFalse : ' . $assertEqual . '<br>' . PHP_EOL;
}

testToHash();
testIsMatchIdTrue();
testIsMatchIdFalse();